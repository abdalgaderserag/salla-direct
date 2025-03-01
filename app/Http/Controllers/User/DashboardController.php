<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function clients()
    {
        return view('user.clients.index');
    }

    public function banned()
    {
        return view('user.clients.banned');
    }

    public function campaigns()
    {
        return view('user.campaigns.index');
    }

    public function campaign()
    {
        return view('user.campaigns.create');
    }

    public function widget()
    {
        return view('user.clients.banned');
    }

    public function autoMessages() {
        return view('user.auto');
    }
}
