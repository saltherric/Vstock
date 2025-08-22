<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;

class RoleController extends Controller
{
    
    public function __construct()
    {
        View::share('active', 'role');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['roles'] = DB::table('roles')
            ->where ('active' , 1)
            ->get();
        return view('roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
