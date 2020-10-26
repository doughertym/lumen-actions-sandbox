<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class StatusController extends Controller
{
    private $logger;
    /**
     * StatusController constructor.
     */
    public function __construct()
    {
    }

    public function index() {
        $lumen_version = "v6.0";
        try {
            $versions_json = json_decode(
                file_get_contents(storage_path('versions.json'))
            );
            if (filled($versions_json->{'groupvitals-ccb'})) {
                $ccb_version = $versions_json->{'groupvitals-ccb'};
                $version = filled($ccb_version) ?
                    "{$ccb_version->major}.{$ccb_version->minor}.{$ccb_version->patch}" : "";
                if (filled($ccb_version->branch) && !Str::endsWith($ccb_version->branch, 'production')) {
                    $version = "${version}-" . Str::slug($ccb_version->branch, '_');
                }
                if (filled($ccb_version->hash)) {
                    $version = "${version}-{$ccb_version->hash}";
                }
                if(filled($ccb_version->date)) {
                    $version .= " on {$ccb_version->date}";
                }
            }
            if(filled($versions_json->lumen)) {
                $lumen_version = $versions_json->lumen;
            }
        } catch (\Exception $exception) {
            $this->logger->error("Could not load version.json: {$exception->getMessage()}");
            $version = "unknown";
        }
        $status = [
            env('APP_NAME') => $version,
            'lumen' => $lumen_version,
            'mysql' => '5.7.25-google-log', // TODO read from DB::connection()...
        ];
        if (env('APP_DEBUG', false)) {
            $status['Environment'] = $_ENV;
        }
        return response()->json($status);
    }
}