<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class LobbyController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Lobby/Index');
    }

    public function create(): Response
    {
        return Inertia::render('Lobby/Create');
    }

    public function show(): Response
    {
        return Inertia::render('Lobby/Join');
    }
}
