<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\LocSerial;
use App\Zastype;
use App\Rep;
use App\Baig;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;

class ZastypeController extends Controller
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
        $seri = Request::input('achaa_seri');
        $baig = Baig::all();
        $rep=Rep::all();
        $locserial=LocSerial::orderBy('sericode', 'ASC')->get();
        $zastype=DB::table('V_ZASPLANBASE')->get();

        return view('devter.zastype')->with(['zastype' => $zastype,  'locserial' => $locserial, 'rep' => $rep, 'baig' => $baig, 'seri' => $seri]);
    }
    public function search()
    {
        $baig = Baig::all();
        $seri = Request::input('achaa_seri');
        $rep=Rep::all();
        $locserial=LocSerial::orderBy('sericode', 'ASC')->get();
        $zastype=DB::table('V_ZASPLANBASE')->where('sericode' ,$seri)->get();

        return view('devter.zastype')->with(['zastype' => $zastype,  'locserial' => $locserial, 'rep' => $rep, 'seri' => $seri, 'baig' => $baig]);
    }
    public function store(Request $request)
    {
        if (Zastype::where('sericode',Request::input('seri_code'))->where('repid',Request::input('repid') )->exists()) {
            Session::flash('message', 'Засвар давхцаж байна!');
            return Redirect('zastype');
        }
        else{
            $zastype = new Zastype;
            $zastype->sericode = Request::input('seri_code');
            $zastype->repid = Request::input('repid');
            $zastype->repname = Request::input('repname');
            $zastype->repshname = Request::input('repshname');
            $zastype->respondent = Request::input('baig');
            $zastype->reprate = Request::input('reprate');
            $zastype->stopday = Request::input('stopday');
            $zastype->stoptsag = Request::input('stoptsag');
            $zastype->stopmin = Request::input('stopmin');
            $zastype->priority = Request::input('priority');
            $zastype->save();

        }

        return Redirect('zastype')->with('successMsg','Property is updated .');
    }
    public function update(Request $request)
    {
        Zastype::where('sericode', Request::input('id'))->where('repid', Request::input('repid'))
            ->update(['repname' => Request::input('repname'),'repshname' => Request::input('repshname'),'respondent' => Request::input('respondent'),
                'reprate' => Request::input('reprate'),'stopday' => Request::input('stopday'),'stoptsag' => Request::input('stoptsag'),
                'stopmin' => Request::input('stopmin'),'priority' => Request::input('priority')]);

        return Redirect('zastype');
    }

    public function destroy($id)
    {
        Zastype::where('sericode', '=', $id)->delete();
        return Redirect('zastype');
    }

}
