<?php


namespace App\Http\Controllers;


class GroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index($church_id) {
        return response()->json([
            ['church_id' => $church_id]
        ]);
    }

    public function show($church_id, $group_id) {
        return response()->json([
            'church_id' => $church_id,
            'group_id' => $group_id
        ]);
    }

}
