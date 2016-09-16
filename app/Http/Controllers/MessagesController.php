<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MessagesController extends Controller
{
    public function index()
    {
        $controller = get_class($this);
        return view('admin.messages.index', compact('controller'));
    }
}
