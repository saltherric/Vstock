<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
class companyController extends Controller
{
    public function __construct()
    {
        View::share('active', 'company');
    }

    public function index(){
        $data['com'] = DB::table('companies')->find(1);
        return view('companies.index', $data);
    }
}
