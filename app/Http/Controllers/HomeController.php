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

        $status = 'Acknowledged receipt. Please expect an email from us. Thank you.';

        return redirect('/')->with('status', $status);
    }
}
