<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $agendamentos = Schedule::where('servico_realizado', false)->get();
        return view('home', compact('agendamentos'));
    }
}
