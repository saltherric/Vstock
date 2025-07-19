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
}
