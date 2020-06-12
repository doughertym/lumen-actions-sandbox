<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Env;

class StatusController extends Controller
{

    /**
     * StatusController constructor.
     */
    public function __construct()
    {
    }

    public function index() {
        $dotenv = \Dotenv\Dotenv::create('/usr/local/gv-ccb', '.version');
        $version = $dotenv->load();

        return response()->json(
            [
                'app' => "{$version['MAJOR']}.{$version['MINOR']}.{$version['PATCH']}-{$version['SHORT_HASH']}",
                'mysql' => '5.7',
                'lumen' => '6.0',
                'version' => $version,
                'env' => getenv(),
                'Env' => Env::getVariables()
            ]
        );
    }
}