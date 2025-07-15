<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
class HomeController extends Controller
{
    public function __construct()
    {
        View::share('active','home');
    }
    public function index()  {
        return view('index');
    }
}
