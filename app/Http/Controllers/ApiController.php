<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ControllerTraits\SubmissionsTrait;
use App\Http\Controllers\ControllerTraits\UsersTrait;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\ControllerTraits\MessagesTrait;

class ApiController extends Controller
{
    use MessagesTrait;
    use SubmissionsTrait;
    use UsersTrait;
}
