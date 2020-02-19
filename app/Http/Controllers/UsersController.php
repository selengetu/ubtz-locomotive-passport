<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
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
        $user=User::all();

        return view('users')->with(['user'=>$user]);
    }
    public function update()
    {
        return view('tailan.masha8');
    }
    public function add()
    {
        return view('tailan.masholon');
    }
     public function destroy()
    {
        return view('tailan.mashzurchil');
    }
}
