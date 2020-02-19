<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\Station;
use App\Part;
use App\Rep;
use App\LocSerial;
use App\Zasplan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ZasplanController extends Controller
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
        $part=Part::orderby('part_name')->get();
        $rep=Rep::all();
        $zasplan=DB::table('V_ZASPLAN')->where('depocode', '=', 3)->where('zasyear', '=',2018 )->get();
        $locserial=LocSerial::orderBy('sericode', 'ASC')->get();
        $startdate= Carbon::today()->subDays(2)->toDateString();
        $enddate=  Carbon::today()->toDateString();
        $machinist= Input::get('machinist'); 
        $z= Input::get('zurch_type'); 
        $query = "";
        if ($machinist!=NULL && $machinist !=0) {
             $query.=" and mashcode = '".$machinist."'";
         }
         else 
         {
             $query.=" ";
         }
         if ($z!=NULL && $z!=0) {
             $query.=" and fault_no = '".$z."'";
         }
         else 
         {
             $query.=" ";
         }
           if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
             $query.=" and arrtime between TO_DATE( '".$startdate."' , 'yyyy/mm/dd') and TO_DATE( '".$enddate."', 'yyyy/mm/dd')";
         }
         else 
         {
                $query.=" ";
  
         }

        return view('devter.zasplan')->with(['part'=>$part, 'locserial' => $locserial, 'startdate' =>$startdate, 'enddate' => $enddate, 'zasplan' => $zasplan,'rep' => $rep]);
    }


}
