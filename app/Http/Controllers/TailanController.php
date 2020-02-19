<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\LocSerial;
use App\Part;
use App\Seri;
use App\Zaspart;
use App\ZasZut;
use Carbon\Carbon;

use App\Rep;

use App\Gemtel;


use App\Solilt;
use App\Zasunplan;
use Illuminate\Support\Facades\Auth;

class TailanController extends Controller
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

        $loc_seri= Input::get('loc_seri');
        $loc_part= 3;
        $loc_zut= '';
        $startdate= Carbon::today()->subDays(2)->toDateString();
        $enddate=  Carbon::today()->toDateString();
        $locserial=LocSerial::all();

        $zaspart=DB::table('V_ZASZUT')->get();
        $part=Part::orderby('part_name')->get();
        $seri=Seri::orderby('seri_name')->get();
        return view('tailan.edangi')->with(['seri'=>$seri,'locserial'=>$locserial,'loc_zut'=>$loc_zut,'part'=>$part,'zaspart' => $zaspart, 'startdate' =>$startdate, 'enddate' => $enddate, 'loc_seri' =>$loc_seri, 'loc_part' => $loc_part]);
    }
    public function ilchitedangi()
    {
        $part=Part::orderby('part_name')->get();
        $rep=Rep::all();
        $break=Gemtel::all();
        $zasunplan = DB::table('V_ZAS_SOLILT')->get();
        $zasdetail = DB::table('V_ZAS_SOLILT_DETAIL')->get();
        $locserial=LocSerial::orderBy('sericode', 'ASC')->get();
        $startdate= Carbon::today()->subDays(10)->toDateString();
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


        return view('tailan.ilchitedangi')->with(['part' => $part,'break' => $break,'zasdetail' => $zasdetail,'locserial' => $locserial, 'startdate' =>$startdate, 'enddate' => $enddate, 'zasunplan' => $zasunplan,'rep' => $rep]);
    }
    public function nasjilt()
    {
        $part=Part::orderby('part_name')->get();
        $loc_part= 3;
        $locserial=LocSerial::all();
        $zaspart=DB::table('V_ZASZUT')->get();
        $loc_nas= Input::get('loc_seri');
        return view('tailan.nasjilt')->with(['locserial'=>$locserial,'part'=>$part, 'zaspart' => $zaspart, 'loc_part' => $loc_part, 'loc_nas' => $loc_nas]);

    }

    public function searchnasjilt()
    {
        $loc_part= Input::get('loc_part');
        $locserial=LocSerial::all();

        $part=Part::orderby('part_name')->get();
        $loc_nas= Input::get('loc_nas');
        $query = "";

        if ($loc_nas == 1) {
            $query.=" and days < 1825";
        }
        if ($loc_nas == 2) {
            $query.=" and days > 1825 and days < 3650 ";
        }
        if ($loc_nas == 3) {
            $query.=" and days > 3650 ";
        }
        else
        {
            $query.=" ";
        }

        if ( $loc_part!=0 &&  $loc_part!=NULL) {
            $query.=" and part_det_id = '". $loc_part."'";
        }
        else
        {
            $query.=" ";
        }


        $zaspart=DB::select('select * from V_ZASZUT t where 1=1 '.$query. '');
        return view('tailan.nasjilt')->with(['locserial'=>$locserial,'part'=>$part, 'zaspart' => $zaspart, 'loc_part' => $loc_part, 'loc_nas' => $loc_nas]);

    }
    public function guilt()
    {
        $startdate= Input::get('month');

        if ($startdate !=0 && $startdate!=NULL) {
            $startdate= Input::get('month');
        }
        else{
            $startdate= Carbon::now()->format('Y/m');
        }
        $year = (substr($startdate, 0, 4));
        $month = (substr($startdate, 5, 2));
        $zaspart=DB::select("select 
        z.zas_id,
       z.zas_seri,
       d.seriname,
       z.zas_depo,
       z.zas_zutnumber,
       z.zas_partid,
       z.zas_sekts,
       t.part_det_id,
       t.part_seri_id,
       t.part_num,
       t.tr3_guilt,
       t.zp_guilt,
       t.tr2_guilt,
       sum(m.runkm) as guilt,
       t.zaspart_id, p.part_name, s.seri_name from
 ZAS_PART t, SET_PART p, SET_SERI s, DUAL, ZAS_ZUT z, ZUTGUUR.ZUTGUURSERI d, ZUTGUUR.CALCMAIN m
where p.part_id=t.part_det_id and t.part_seri_id=s.seri_id and z.zas_partid=t.part_id 
and d.sericode=z.zas_seri and m.depocode=z.zas_depo and m.sericode=z.zas_seri and m.zutnumber=z.zas_zutnumber 
and m.runkm != 0 and m.arrdatetime>t.tr3_date
group by z.zas_id,
       z.zas_seri,
       d.seriname,     
       z.zas_depo,
       z.zas_zutnumber,
       z.zas_partid,
       z.zas_sekts,
       t.part_det_id,
       t.part_seri_id,
       t.part_num,
       t.zaspart_id,
        p.part_name,
         t.tr3_guilt,
       t.zp_guilt,
       t.tr2_guilt,
         s.seri_name
");

        $locserial=LocSerial::all();
        return view('tailan.guilt')->with(['year'=>$year,'zaspart'=>$zaspart,'startdate'=>$startdate,'month'=>$month,'locserial'=>$locserial]);
    }
}
