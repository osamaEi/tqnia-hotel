<?php

namespace App\Http\Controllers\Clinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function ClientDashboard() {


        return view('frontend.dashboard.user_dashboard');

    }
}
