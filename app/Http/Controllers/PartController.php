<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\Part;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PartController extends Controller
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

        $part=Part::all();

        return view('set.part')->with(['part' => $part]);
    }
   public function store()
    {
        $part = new Part;
        $part->part_name = Request::input('part_name');
        $part->save();

         return Redirect('part');
    }
        
}
