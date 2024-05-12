<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use \Inertia\Response;

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
