<?php

namespace App\Http\Controllers\Profile;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class ProfileUserController extends Controller
{
    public function index(): Response
    {
        if (!$user = auth()->user()) {
            return redirect()->route('login');
        }

        return Inertia::render('Profile/User', [
            'data' => $user,
        ]);
    }
}
