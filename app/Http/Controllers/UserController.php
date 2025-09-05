<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
class UserController extends Controller
{
    public function __construct()
    {
        View::share('active', 'user');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // select users.*, roles.name as role from users join roles on users.role_id = roles.id;
        $data['users'] = DB::table('users')
            ->join('roles', 'users.role_id', 'roles.id')
            ->select('users.*', 'roles.name as role')
            ->get();
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['roles'] = DB::table('roles')
            ->where('active', 1)
            ->get();
        return view('users.create', $data); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $r->validate([
            'name' => 'required|min:3',
            'username' => 'required|min:3|unique:users',
            'password' => 'required|min:3'
        ]);
        $data = array(
            'name' => $r->name,
            'email' => $r->email,
            'language' => $r->language,
            'role_id' => $r->role_id,
            'username' => $r->username,
            'password' => bcrypt($r->password)
        );
        if($r->photo) {
            $data['photo'] = $r->file('photo')->store('upload/users', 'custom');
        }
        $x = DB::table('users') -> insert($data);
        if($x){
            return redirect()->route('user.create')
                ->with('success', config('app.success'));
        } else {
            return redirect()->route('user.create')
                ->with('error', config('app.error'))
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = DB::table('users') -> find($id);
        $data['roles'] = DB::table('roles')
            ->where('active', 1)
            ->get();
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $r->validate([
            'name' => 'required|min:3',
            'role_id' => 'required|numeric',
            'language' => 'required|max:2',
            'photo' => 'nullable|image'
        ]);
        $data = array(
            'name' => $r->name,
            'email' => $r->email,
            'language' => $r->language,
            'role_id' => $r->role_id
        );
        if($r->password!='') {
            $data['password'] = bcrypt($r->password);
        }
        if($r->photo) {
            $data['photo'] = $r->file('photo')->store('upload/users', 'custom');
        }
        $x = DB::table('users')
            ->where('id', $id)
            ->update($data);
        if($x) {
            return redirect()->route('user.index')
                ->with('success', config('app.success'));
        }
        else {
            return redirect()->route('user.edit', $id)
                ->with('error', config('app.error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $user = DB::table('users')->find($id);
        $x = DB::table('users') 
            ->where('id',$id)
            ->delete();
        if($x) {
            @unlink($user->photo);
            return redirect()->route('user.index')
                ->with('success', config('app.success'));
        }
        else {
            return redirect()->route('user.index')
                ->with('error', config('app.error'));
        }
    }

    public function change_password(Request $r) {
        $r->validate([
            'password' => 'required|min:3'
        ]);

        $data = array(
            'password' => bcrypt($r->password)
        );
        $x = DB::table('users') 
            ->where('id', $r->user_id)
            ->update($data);
        if($x) {
            return redirect()->route('user.index')
                ->with('success', config('app.success'));
        }
        else {
            return redirect()->route('user.index')
                ->with('error', config('app.error'));
        }
    }
}
