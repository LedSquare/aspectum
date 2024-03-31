<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        return Inertia::render('Home', [
            'title' => 'Стартовая страница',
        ]);
    }
}
