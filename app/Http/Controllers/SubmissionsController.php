<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SubmissionsController extends Controller
{
    public function index()
    {
        $controller = get_class($this);
        return view('admin.submissions.index', compact('controller'));
    }
}
