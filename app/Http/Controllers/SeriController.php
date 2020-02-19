<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\Seri;
use App\Part;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SeriController extends Controller
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

        $seri=DB::table('V_SERI')->get();

        return view('set.seri')->with(['seri' => $seri,'part' => $part]);
    }
 public function store()
    {
        $seri = new Seri;
        $seri->seri_type = Request::input('part_id');
        $seri->seri_name = Request::input('seri_name');
        $seri->save();

         return Redirect('seri');
    }

}
