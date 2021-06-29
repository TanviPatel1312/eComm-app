<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showdash()
    {
//        $totals = [
//            'articles' => Article::count(),
//            'comments' => Comment::count(),
//            'events' => Event::count(),
//            // And so on
//        ];
//
//        return view('admin.dashboard', compact('totals'));
        return view('dashboard');
    }
}
