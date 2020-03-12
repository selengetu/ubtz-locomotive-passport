<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\LocSerial;
use App\Rep;
use App\Part;
use App\Gemtel;
use App\Zaspart;
use App\ZasZut;
use App\Solilt;
use App\Zasunplan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ZasunplanController extends Controller
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
        $break=Gemtel::all();

        $zasdetail = DB::table('V_ZAS_SOLILT_DETAIL')->get();
        $locserial=LocSerial::orderBy('sericode', 'ASC')->get();
        $startdate= Input::get('mach_start');
        $enddate= Input::get('mach_end');
    
        $query = "";
       
           if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
             $query.=" and repindate between TO_DATE( '".$startdate."' , 'yyyy/mm/dd') and TO_DATE( '".$enddate."', 'yyyy/mm/dd')";
         }
        else
        {
            $query.=" and repindate between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }


        $zasunplan=DB::select('select  * from V_ZASPLAN t where 1=1 '.$query.'');
        return view('devter.zasunplan')->with(['part' => $part,'break' => $break,'zasdetail' => $zasdetail,'locserial' => $locserial, 'startdate' =>$startdate, 'enddate' => $enddate, 'zasunplan' => $zasunplan,'rep' => $rep]);
    }
    public function store()
    {

        $zasunplan = new Zasunplan;
        $zasunplan->solilt_seri = Request::input('zas_seri');
        $zasunplan->solilt_zutnumber = Request::input('zas_zutnumber');
        $zasunplan->solilt_sekts = Request::input('zas_sekts');
        $zasunplan->solilt__sekts_num = Request::input('zas_sekts_num');
        $zasunplan->solilt_begintime = Request::input('zas_begindate');
        $zasunplan->solilt_endtime = Request::input('zas_enddate');
        $zasunplan->solilt_zastype = Request::input('zas_type');
        $zasunplan->solilt_rep = Request::input('zas_rep');
        $zasunplan->solilt_depo = Request::input('zas_depo');
        $zasunplan->solilt_gemtel = Request::input('zas_gemtel');
        $zasunplan->save();


        return Zasunplan::max('solilt_id');

    }
    public function storedetail()
    {
        $d = Zaspart::where('part_det_id', Request::input('mat_part'))->where('part_seri_id', Request::input('mat_avsanseri'))->where('part_num', Request::input('mat_avsandugaar'))->value('part_id');
        $zaspart = new Zaspart;
        $zaspart->part_det_id = Request::input('mat_part');
        $zaspart->part_seri_id = Request::input('mat_tavisanseri');
        $zaspart->part_num = Request::input('mat_tavisandugaar');
        $zaspart->part_date = Carbon::now()->toDateString();
        $zaspart->save();
        $max1 = Zaspart::max('part_id');

        $k= DB::table('ZAS_ZUT')->where('zas_partid', $d)->get();

        $zaszut = new ZasZut;
        $zaszut->zas_depo= $k[0]->zas_depo;
        $zaszut->zas_seri= $k[0]->zas_seri;
        $zaszut->zas_zutnumber = $k[0]->zas_zutnumber;
        $zaszut->zas_sekts = $k[0]->zas_sekts;
        $zaszut->zas_sekts_num = $k[0]->zas_sekts_num;
        $zaszut->zas_partid = $max1;
        $zaszut->zas_begindate = Carbon::now()->toDateString();
        $zaszut->save();


        $max = Zasunplan::max('solilt_id');
        $solilt = new Solilt;
        $solilt->solilt_id = $max;
        $solilt->solilt_part_id = Request::input('mat_part');
        $solilt->solilt_seri_id = Request::input('mat_avsanseri');
        $solilt->solilt_num = Request::input('mat_avsandugaar');
        $solilt->solilt_eseri_id = Request::input('mat_tavisanseri');
        $solilt->solilt_enum = Request::input('mat_tavisandugaar');
        $solilt->save();

        ZasZut::where('zas_partid', $d)->update(['zas_isavailable'=> '0']);




    }
    public function updatestoredetail()
    {
        $d = Zaspart::where('part_det_id', Request::input('upmat_part'))->where('part_seri_id', Request::input('upmat_avsanseri'))->where('part_num', Request::input('upmat_avsandugaar'))->value('part_id');
        $zaspart = new Zaspart;
        $zaspart->part_det_id = Request::input('upmat_part');
        $zaspart->part_seri_id = Request::input('upmat_tavisanseri');
        $zaspart->part_num = Request::input('upmat_tavisandugaar');
        $zaspart->part_date = Carbon::now()->toDateString();
        $zaspart->save();
        $max1 = Zaspart::max('part_id');

        $k= DB::table('ZAS_ZUT')->where('zas_partid', $d)->get();

        $zaszut = new ZasZut;
        $zaszut->zas_depo= $k[0]->zas_depo;
        $zaszut->zas_seri= $k[0]->zas_seri;
        $zaszut->zas_zutnumber = $k[0]->zas_zutnumber;
        $zaszut->zas_sekts = $k[0]->zas_sekts;
        $zaszut->zas_sekts_num = $k[0]->zas_sekts_num;
        $zaszut->zas_partid = $max1;
        $zaszut->zas_begindate = Carbon::now()->toDateString();
        $zaszut->save();

        $solilt = new Solilt;
        $solilt->solilt_id = Request::input('upzasid1');
        $solilt->solilt_part_id = Request::input('upmat_part');
        $solilt->solilt_seri_id = Request::input('upmat_avsanseri');
        $solilt->solilt_num = Request::input('upmat_avsandugaar');
        $solilt->solilt_eseri_id = Request::input('upmat_tavisanseri');
        $solilt->solilt_enum = Request::input('upmat_tavisandugaar');
        $solilt->save();
        ZasZut::where('zas_partid', $d)->update(['zas_isavailable'=> '0']);

    }
    public function destroydetail($id)
    {

        Solilt::where('solilt_detail_id', '=', $id)->delete();
        return Redirect('zasunplan');

    }
    public function update(Request $request)
    {

        Zasunplan::where('solilt_id', Request::input('upzasid'))
            ->update(['solilt_seri' => Request::input('upzas_seri'),'solilt_zutnumber' => Request::input('upzas_zutnumber'),'solilt_sekts' => Request::input('upzas_sekts'),'solilt__sekts_num' => Request::input('upzas_sekts_num'),
                'solilt_begintime' => Request::input('upzas_begindate'),'solilt_endtime' => Request::input('upzas_enddate'), 'solilt_zastype' => Request::input('upzas_type'),'solilt_rep' => Request::input('upzas_rep')
                ,'solilt_depo' => Request::input('upzas_depo'),'solilt_gemtel' => Request::input('upzas_gemtel')]);

        return Redirect('zasunplan');
    }
    public function destroy($id)
    {
        Zasunplan::where('solilt_id', '=', $id)->delete();
        return Redirect('zasunplan');
    }
}
