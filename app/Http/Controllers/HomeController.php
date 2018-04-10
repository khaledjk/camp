<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $is_admin = auth()->user()->is_admin;
        $status = auth()->user()->status;
        if($is_admin ==1){
            return Redirect::route('all_camps');
        }

        else
        {
            if($status == 1)
            {
                return Redirect::route('groups_supervisor');
            }

            else
            {
                        return view('home');

            }
        }
    }

      public function denied()
    {
        return view('denied');
    }
}
