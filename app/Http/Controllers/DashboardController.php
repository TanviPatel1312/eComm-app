<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showdash()
    {
        return view('dashboard');
    }
}
