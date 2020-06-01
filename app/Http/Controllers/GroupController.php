<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

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
        $groups = DB::table('groups')
            ->where('church_id', '=', $church_id)
            ->select([
                'id', 'church_id', 'campus_id', 'name', 'status',
                'active', 'address', 'city', 'state', 'zipcode'])
            ->get();
        return response()->json($groups);
    }

    public function show($church_id, $group_id) {
        $group = DB::table('groups')
            ->where('church_id', '=', $church_id)
            ->where('id', '=', $group_id)
            ->select([
                'id', 'church_id', 'campus_id', 'name', 'status',
                'active', 'address', 'city', 'state', 'zipcode'])
            ->get();
        return response()->json($group);
    }

}
