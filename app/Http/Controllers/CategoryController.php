<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        View::share('active', 'category');
    }

    public function index() {
        $data['cats'] = DB::table('categories')
            ->where('active', 1)
            ->get();
        return view('categories.index', $data);
    }

    public function delete($id) {
        $x = DB::table('categories')
            ->where('id', $id)
            ->update([
                'active' => 0
            ]);
        if ($x) {
            session()->flash('success', config('app.del_success'));
        } else {
            session()->flash('error', config('app.del_error'));
        }
        return redirect()->route('category.index');
    }

    public function create() {
        return view('categories.create');
    }

    public function save(Request $r) {
        $r->validate([
            'name'=>'required|min:3|unique:categories'
        ]);
        $data = array(
            'name' => $r->name
        );
        $i = DB::table('categories')->insert($data);
        if($i) {
            session()->flash('success', config('app.success'));
            return redirect()->route('category.create');
        } else {
            session()->flash('error', config('app.error'));
            return redirect()->route('category.create')
            ->withInput();
        }
    }

    public function edit($id) {
        $data['cat'] = DB::table('categories')->find($id);
        return view('categories.edit', $data);
    }

    public function update() {
        
    }
}