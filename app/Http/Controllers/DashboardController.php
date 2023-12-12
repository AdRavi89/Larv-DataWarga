<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'CAMABA') {
            $pendaftaran = Pendaftaran::whereRaw(
                'user_id=?',
                [Auth::user()->id]
            )->first();
            return view('dashboard.camabaindex', ['pendaftaran' => $pendaftaran]);
        } else {
            return view('dashboard');
        }
    }
}