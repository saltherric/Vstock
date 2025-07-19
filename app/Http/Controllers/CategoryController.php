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
        return redirect()->route('category.index');
    }
}
