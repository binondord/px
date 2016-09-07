<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        $style = 'home';
        return view('main.home',compact('style'));
    }

    public function step()
    {
        $style = 'step';
        return view('main.step',compact('style'));
    }

    public function submitStep(Request $request)
    {
        $all = $request->all();

        return redirect()->back()->with('data', $all);
    }
}
