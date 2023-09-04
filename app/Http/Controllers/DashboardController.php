<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        if (Gate::check('admin')) {
            return view('admin.dashboard');
        } else {
            return redirect()->route('student.dashboard');
        }
    }
}
