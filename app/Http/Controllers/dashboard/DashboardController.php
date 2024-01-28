<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->check == 0) {
            return redirect()->intended('/users_details/' . auth()->user()->token);
        }

        return view('dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }
}
