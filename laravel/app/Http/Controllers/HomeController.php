<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HomeController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        return Inertia::render('Home', [
            'title' => 'Стартовая страница',
        ]);
    }
}
