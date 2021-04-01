<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\Station;
use App\Zastype;
use App\Zasplan;
use App\Part;
use App\Rep;
use App\Zasaddbase;
use App\LocSerial;
use App\Zasadd;
use App\Zasbaig;
use App\Zasmat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
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
        if(Route::getFacadeRoot()->current()->uri()== 'zasplan'){
            $zastype=1;
        }

        if(Route::getFacadeRoot()->current()->uri()== 'zasunplan'){
            $zastype=2;
        }
        $part=Part::orderby('part_name')->get();
        $rep=Rep::all();
        $depo=DB::select("select * from set_depo order by depocode");
        $receiver=DB::select("select * from set_receiver t where t.depocode=".Auth::user()->depo_id." order by receiver_name");
        $addbase=DB::select("select * from zutguur.zasaddbase");
        $zasbaig=DB::select("select * from zutguur.zasbaig");
        $damage=DB::select("select * from V_SET_GEMTEL");
        $locserial=LocSerial::orderBy('sericode', 'ASC')->get();
        $startdate=Input::get('zas_start'); 
        $enddate= Input::get('zas_end'); 
        $unit=DB::select("select * from set_unit");
        $machinist= Input::get('machinist'); 
        $z= Input::get('zurch_type'); 
        $sericode= Input::get('zas_sericode'); 
        $query = "";
    
           if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
             $query.=" and repindate between TO_DATE( '".$startdate."' , 'yyyy/mm/dd') and TO_DATE( '".$enddate."', 'yyyy/mm/dd')";
         }
         else 
         {
            
                $startdate= Carbon::today()->subDays(2)->toDateString();
                $enddate=  Carbon::today()->toDateString();
                $query.=" and repindate between TO_DATE( '".$startdate."' , 'yyyy/mm/dd') and TO_DATE( '".$enddate."', 'yyyy/mm/dd')";
  
         }
         if ($sericode !=0 && $sericode!=NULL) {
            $query.=" and sericode= '".$sericode."'";
        }
        else 
        {
            $query.=" ";
        }
        if ($zastype!=NULL && $zastype !=0) {
            $query.=" and zastype = '".$zastype."'";
        }
        else
        {
            $query.=" ";
        }
         $zasplan=DB::select('select * from V_ZASPLAN where 1=1 '.$query.'');
        return view('devter.zasplan')->with(['unit'=>$unit,'part'=>$part, 'locserial' => $locserial, 'startdate' =>$startdate,
                                             'enddate' => $enddate, 'zasplan' => $zasplan,'rep' => $rep,'addbase' => $addbase,
                                             'zasbaig' => $zasbaig,'zastype' => $zastype,'damage' => $damage,'depo' => $depo,'receiver' => $receiver]);
    }
    public function store()
    {
      
        $zasplan = new Zasplan;
        $zasplan->depocode = Auth::user()->depocode;
        $zasplan->zasyear = Carbon::now()->year;
        $zasplan->zasmonth = Carbon::now()->month;
        $zasplan->sericode = Request::input('zas_seri');
        $zasplan->zutnumber = Request::input('zas_zutnumber');
        $zasplan->sec = Request::input('sec');
        $zasplan->repid = Request::input('repid');
        $zasplan->repindate = Request::input('repindate');
        $zasplan->repoutdate = Request::input('repoutdate');
        $zasplan->stopsum = Request::input('stopsum');
        $zasplan->stopto4 = Request::input('stopto4');  
        $zasplan->stopadd = Request::input('stopadd');
        $zasplan->stopclean = Request::input('stoprep');
        $zasplan->runkm = Request::input('zasrun');
        $zasplan->receiver =Request::input('receiver');
        if(Request::input('zastype')== 1){
        $zasplan->zastype = 1;
        }

        if(Request::input('zastype')==2){
        $zasplan->zastype = 2;
        $zasplan->to2depo = Request::input('to2depo');
        $zasplan->replastdate = Request::input('replastdate');
        $zasplan->damage = Request::input('damage');
        $zasplan->locgroup = Request::input('locgroup');
        $zasplan->decision = Request::input('decision');
        }
        $zasplan->save();
        $max =DB::select("select max(repairid) as repairid from ZASPLAN");
        DB::table('activity_log')->insert(
            array(
                   'log_name'     =>   'Add zaszut', 
                   'description'     =>  $max, 
                   'causer_id'   =>   Auth::user()->id,
                   'created_at'     =>   Carbon::now(), 
            )
       );
         return $max[0]->repairid;
    }
    public function storeadd()
    {
        $zasadd = new Zasadd;
        $zasadd->repairid = Request::input('repaid');
        $zasadd->addtype = Request::input('addtype');
        $zasadd->addid = Request::input('addid');
        $zasadd->addhour = Request::input('addhour');
        $zasadd->addval = Request::input('addval');    
        $zasadd->save();
       
    }
   
    public function storebaig()
    {
        $zasbaig = new Zasbaig;
        $zasbaig->repairid = Request::input('repaidbaig');
        $zasbaig->baigcode = Request::input('baigcode');
        $zasbaig->baigtime = Request::input('baigtime');
        $zasbaig->save();
       
    }
    public function storemat()
    {
        $zasmat = new Zasmat;
        $zasmat->repairid = Request::input('repaidmat');
        $zasmat->matcode = Request::input('matcode');
        $zasmat->matunit = Request::input('matunit');
        $zasmat->mattoo = Request::input('mattoo');
        $zasmat->matprice = Request::input('matprice');
        $zasmat->save();
       
    }
}
