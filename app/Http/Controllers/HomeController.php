<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
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
        return view('home');
    }

    public function Home()
    {
        //dd(Auth::user()->id_role );
        if (Auth::user()->id_role == 1) {
            return redirect('/home');

        } elseif (Auth::user()->id_role == 2) {
            return redirect('/ModHome');

        }elseif (Auth::user()->id_role == 3) {
            return redirect('/ClubHome');
        }
        

    }
}
