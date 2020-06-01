<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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
        $people = DB::table('people')
            ->where('church_id', '=', $church_id)
            ->select([
                'id', 'church_id', 'campus_id',
                'first_name', 'middle_name', 'last_name',
                'email', 'status', 'address', 'city',
                'state', 'zip'])
            ->get();
        return response()->json($people);
    }

    public function show($church_id, $person_id) {
        $person = DB::table('people')
            ->where('church_id', '=', $church_id)
            ->where('id', '=', $person_id)
            ->select([
                'id', 'church_id', 'campus_id',
                'first_name', 'middle_name', 'last_name',
                'email', 'status', 'address', 'city',
                'state', 'zip'])
            ->get();
        return response()->json($person);
    }
}
