<?php

namespace App\Http\Controllers;

class PeopleController extends Controller
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

    public function show($church_id, $person_id) {
        return response()->json([
            'church_id' => $church_id,
            'person_id' => $person_id
        ]);
    }
}
