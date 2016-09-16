<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index()
    {
        $controller = 'DashboardController';
        return view('admin.index',compact('controller'));
    }
}
