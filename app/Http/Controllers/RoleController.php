<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Auth\Events\Validated;
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
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $r -> validate([
            'name' => 'required|min:2'
        ]);
        $data = array(
            'name' => $r->name
        );
        $x = DB::table('roles')->insert($data);
        if($x) {
            return redirect()->route('role.create')
                ->with('success', config('app.success'));
        } else {
            return redirect()->route('role.create')
                ->with('error', config('app.error'))
                ->withInput();
        }
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
    public function delete($id)
    {
        $x = DB::table('roles')
            ->where ('id', $id)
            ->update([
                'active' => 0
            ]);
        if($x) {
            session()->flash('success', config('app.del_success'));
        } else {
            session()->flash('error', config('app.del_error'));
        }
        return redirect()->route('role.index');
    }
}
