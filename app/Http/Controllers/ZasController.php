<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\LocSerial;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ZasController extends Controller
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

        $locserial=LocSerial::all();
        $startdate= Carbon::today()->subDays(30)->toDateString();
        $enddate=  Carbon::today()->toDateString();
        $zasunplan = DB::table('V_ZAS_SOLILT')->get();

        return view('tailan.zas')->with(['zasunplan' => $zasunplan,'locserial' => $locserial, 'startdate' =>$startdate, 'enddate' => $enddate]);
    }
    public function search()
    {
        $startdate= Input::get('zut_start');
        $enddate=  Input::get('zut_end');
        $query = "";
        $locserial=LocSerial::all();
        $zut_seri= Input::get('zut_seri');
        $zut_num= Input::get('zut_num');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=" and solilt_begintime between '".$startdate."' and '".$enddate."'";
        }
        else
        {
            $query.=" ";

        }
        if ($zut_seri!=0 && $zut_seri!=NULL) {
            $query.=" and solilt_seri = '".$zut_seri."'";
        }
        else
        {
            $query.=" ";
        }

        if ($zut_num!=0 && $zut_num!=NULL) {
            $query.=" and solilt_zutnumber = '".$zut_num."'";
        }
        else
        {
            $query.=" ";
        }


        $zasunplan=DB::select('select * from V_ZAS_SOLILT t where 1=1 '.$query. '');
        return view('tailan.zas')->with(['zasunplan' => $zasunplan,'locserial' => $locserial, 'startdate' =>$startdate, 'enddate' => $enddate]);
    }

}
