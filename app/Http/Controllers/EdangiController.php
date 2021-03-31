<?php

namespace App\Http\Controllers;
use App\LocSerial;
use App\Station;
use App\Part;
use App\Seri;
use App\Zaspart;
use App\ZasZut;
use App\Zutguur;
use App\Machinist;
use DB;
use Session;
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EdangiController extends Controller
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

        $query="";
        $loc_seri= '0';
        $loc_part= '0';
        $loc_depo= Auth::user()->depo_id;
        $loc_zutnumber= '0';
        $startdate= Carbon::today()->subDays(2)->toDateString();
        $enddate=  Carbon::today()->toDateString();
        $depo=DB::table('SET_DEPO')->get();
        $stat=Station::all();
        $seri=Seri::orderby('seri_name')->get();
        $part=Part::orderby('part_name')->get();
        if(Session::has('loc_depo')) {
            $loc_depo = Session::get('loc_depo');
        }

        else {
            Session::put('loc_depo', $loc_depo);
        }
        $locserial=DB::select("select * from V_ZUTGUUR t where t.depocode=".$loc_depo."");
        if(Session::has('loc_seri')) {
            $loc_seri = Session::get('loc_seri');
        }
        else {
            Session::put('loc_seri', $loc_seri);
        }
        $loc=DB::select("select * from ZUTGUUR.ZUTGUUR t where t.sericode=".$loc_seri." order by zutnumber");
        if(Session::has('loc_zutnumber')) {
            $loc_zutnumber = Session::get('loc_zutnumber');
        }
        else {
            Session::put('loc_zutnumber', $loc_zutnumber);
        }
        $zpart=DB::select("select * from V_ZASZUT_PART t where t.zas_seri=".$loc_seri." and  t.zas_zutnumber=".$loc_zutnumber."");
        if(Session::has('loc_part')) {
            $loc_part = Session::get('loc_part');
        }
        else {
            Session::put('loc_part', $loc_part);
        }

        if ($loc_part!=0 && $loc_part!=NULL) {
            $query.=" and part_det_id = '".$loc_part."'";
        }
        else
        {
            $query.=" ";
        }
        if ($loc_depo!=0 && $loc_depo!=NULL) {
            $query.=" and zas_depo = '".$loc_depo."'";
        }
        else
        {
            $query.=" ";
        }
        if ($loc_seri!=0 && $loc_seri!=NULL) {
            $query.=" and zas_seri = '".$loc_seri."'";
        }
        else
        {
            $query.=" ";
        }

        if ($loc_zutnumber!=0 && $loc_zutnumber!=NULL) {
            $query.=" and zas_zutnumber = '".$loc_zutnumber."'";
        }
        else
        {
            $query.=" ";
        }
        DB::table('activity_log')->insert(
            array(
                   'log_name'     =>   'Login', 
                   'description'     =>   'Login', 
                   'causer_id'   =>   Auth::user()->id,
                   'created_at'     =>   Carbon::now(), 
            )
       );
        $zaspart=DB::select('select * from V_ZASZUT t where 1=1 '.$query. '');
        return view('devter.home')->with(['seri'=>$seri,'locserial'=>$locserial,'loc'=>$loc,'loc_zutnumber'=>$loc_zutnumber,'zpart'=>$zpart,'part'=>$part,'stat'=>$stat, 'zaspart' => $zaspart, 'startdate' =>$startdate, 'enddate' => $enddate, 'loc_seri' =>$loc_seri, 'loc_part' => $loc_part, 'depo' => $depo]);
    }

    public function filter_zaspart(Request $request) {
        Session::put('loc_seri',$request->Input('loc_seri'));
        Session::put('loc_zutnumber',$request->Input('loc_zutnumber'));
        Session::put('loc_part',$request->Input('loc_part'));

        return redirect('home');
    }

    public function store()
    {
        $zaspart = new Zaspart;
        $zaspart->part_det_id = Request::input('ed_part');
        $zaspart->part_seri_id = Request::input('ed_seri');
        $zaspart->part_num = Request::input('ed_dugaar');
        $zaspart->part_date = Request::input('ed_ognoo');
        $zaspart->tr3_guilt = Request::input('ed_tr3_guilt');
        $zaspart->tr3_date = Request::input('ed_tr3_date');
        $zaspart->tr2_guilt = Request::input('ed_tr2_guilt');
        $zaspart->tr2_date = Request::input('ed_tr2_date');
        $zaspart->zp_guilt = Request::input('ed_zp_guilt');
        $zaspart->save();
        $max = Zaspart::max('part_id');

        $zaszut = new ZasZut;
        $zaszut->zas_depo= Request::input('ed_depo');
        $zaszut->zas_seri= Request::input('ed_loc');
        $zaszut->zas_zutnumber = Request::input('ed_zut');
        $zaszut->zas_sekts = Request::input('ed_sekts');
        $zaszut->zas_sekts_num = Request::input('ed_sekts_num');
        $zaszut->zas_partid = $max;
        $zaszut->zas_begindate=Request::input('ed_tavisanognoo');
        $zaszut->save();

        return Redirect('home');
    }
    public function update(Request $request)
    {
        Zaspart::where('part_id', Request::input('angi_id'))
            ->update(['part_det_id' => Request::input('angi_part'),'part_seri_id' => Request::input('angi_seri'),'part_num' => Request::input('angi_dugaar'),
                'part_date' => Request::input('angi_ognoo'),'tr3_guilt' => Request::input('angi_tr3_guilt'),'tr2_guilt' => Request::input('angi_tr2_guilt'),'zp_guilt' => Request::input('angi_zp_guilt'),'tr3_date' => Request::input('angi_tr3_date'),'tr2_date' => Request::input('angi_tr2_date')]);
        ZasZut::where('zas_partid', Request::input('angi_id'))
            ->update(['zas_seri' => Request::input('angi_loc'),'zas_zutnumber' => Request::input('angi_zutnum'),'zas_depo' => Request::input('angi_depo'),
                'zas_sekts' => Request::input('angi_sekts'), 'zas_sekts_num' => Request::input('angi_sekts_num'), 'zas_begindate' => Request::input('angi_tavisanognoo')]);

        return Redirect('home');
    }

    public function destroy($id)
    {
        Zaspart::where('part_id', '=', $id)->delete();
        return Redirect('home');
    }
    public function filter_loc_part($loc_part) {

        Session::put('loc_part',$loc_part);

        return back();
    }
    public function filter_loc_number($loc_zutnumber) {
        Session::put('loc_zutnumber',$loc_zutnumber);
        return back();
    }
    public function filter_loc_seri($loc_seri) {
        Session::put('loc_seri',$loc_seri);

        return back();
    }
    public function filter_loc_depo($loc_depo) {

        Session::put('loc_depo',$loc_depo);
        return back();
    }
}
