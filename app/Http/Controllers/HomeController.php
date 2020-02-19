<?php

namespace App\Http\Controllers;

use App\AttentionSpeed;
use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;

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
       $speed=AttentionSpeed::all();
    
        return view('devter.achaa')->with(['speed'=>$speed]);
    }
}
