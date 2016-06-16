<?php

namespace App\Http\Controllers\Sys;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class DashboardController extends Controller
{
    public function main()
    {
        return view('sys.dashboard.main');
    }
}
