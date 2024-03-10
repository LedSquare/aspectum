<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function index(RegisterRequest $request)
    {
        dd($request);
    }
}
