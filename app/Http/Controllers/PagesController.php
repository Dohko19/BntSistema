<?php

namespace App\Http\Controllers;

use App\Marca;
use App\RecibosNomina;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $users = User::allowed()->get();
            return view('dashboard.index', compact('users'));
        }
        return view('dashboard.index');
    }
}
