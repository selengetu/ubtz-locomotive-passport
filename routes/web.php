<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'EdangiController@index')->name('home');
Route::get('/home', 'EdangiController@index')->name('home');
Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/zastuuh', 'ZasController@index')->name('zastuuh');
Route::post('/searchilchittuuh','ZasController@search');
Route::get('/devedangi', 'EdangiController@index')->name('devedangi');


Route::match(['get', 'post'],'/edangi', 'TailanController@index')->name('edangi');
Route::match(['get', 'post'],'/ilchitedangi', 'TailanController@ilchitedangi')->name('ilchitedangi');
Route::match(['get', 'post'],'/nasjilt', 'TailanController@nasjilt')->name('nasjilt');
Route::post('/searchnasjilt','TailanController@searchnasjilt');
Route::match(['get', 'post'],'/zasto2', 'TailanController@zasto2')->name('zasto2');
Route::match(['get', 'post'],'/guilt', 'TailanController@guilt')->name('guilt');
Route::match(['get', 'post'],'/zasplan', 'ZasplanController@index')->name('zasplan');
Route::match(['get', 'post'],'/zasunplan', 'ZasunplanController@index')->name('zasunplan');
Route::match(['get', 'post'],'/searchzasunplan', 'ZasunplanController@index')->name('zasunplan');

Route::match(['get', 'post'],'/zastype', 'ZastypeController@index')->name('zastype');
Route::get('/destroyzastype/{id}/delete', ['as' => 'zastype.destroy', 'uses' => 'ZastypeController@destroy']);
Route::post('/addzastype','ZastypeController@store');
Route::post('/searchzastype','ZastypeController@search');
Route::post('/updatezastype','ZastypeController@update');
Route::get('/zastypefill/{id?}',function($id = 0){
    $dt=App\Zastype::where('seri_code','=',$id)->get();
    return $dt;
});

Route::match(['get', 'post'],'/zasplan', 'ZasplanController@index')->name('zasplan');
Route::get('/destroyzasplan/{id}/delete', ['as' => 'zasplan.destroy', 'uses' => 'ZasplanController@destroy']);
Route::post('/addzasplan','ZasplanController@store');
Route::post('/updatezasplan','ZasplanController@update');
Route::get('/zasplanfill/{id?}',function($id = 0){
    $dt=App\Zasplan::where('repairid','=',$id)->get();
    return $dt;
});
Route::post('/addzasadd','ZasplanController@storeadd');
Route::post('/addzasbaig','ZasplanController@storebaig');
Route::post('/addzasmat','ZasplanController@storemat');

Route::match(['get', 'post'],'/zasunplan', 'ZasunplanController@index')->name('zasunplan');
Route::get('/destroyzasunplan/{id}/delete', ['as' => 'zasunplan.destroy', 'uses' => 'ZasunplanController@destroy']);
Route::post('/addzasunplan','ZasunplanController@store');
Route::post('/addzasdetail','ZasunplanController@storedetail');
Route::post('/updatezasdetail','ZasunplanController@updatestoredetail');
Route::post('/updatezasunplan','ZasunplanController@update');
Route::get('/zasunplanfill/{id?}',function($id = 0){
    $dt=DB::table('ZAS_SOLILT')->where('solilt_id','=',$id)->get();
    return $dt;
});
Route::get('/zasdetail/delete/{id}', 'ZasunplanController@destroydetail');
Route::get('/getzasdetail/{id?}',function($id = 0){
    $dt=DB::table('V_ZAS_SOLILT_DETAIL')->where('solilt_id','=',$id)->get();
    return $dt;
});
Route::match(['get', 'post'],'/zastul', 'ZastulController@index')->name('zastul');
Route::get('/destroyzastul/{id}/delete', ['as' => 'zastul.destroy', 'uses' => 'ZastulController@destroy']);
Route::post('/addzastul','ZastulController@store');
Route::post('/updatezastul','ZastulController@update');
Route::post('/searchzastul','ZastulController@search');


Route::get('/repfill/{id?}/{seri?}',function($id = 0,$seri = 0){
    $dt=DB::table('V_REP')->where('repid','=',$id)->where('reptype','=',$seri)->get();
    return $dt;
});

Route::get('/getrep/{id?}',function($id = 0){	
				$dt=DB::table('V_REP')
                ->where('reptype','=',$id)->orderby('repid')->get();
				return $dt;
		});
Route::get('/seri', 'SeriController@index')->name('seri');
Route::post('/addseri','SeriController@store');
Route::get('/part', 'PartController@index')->name('part');
Route::post('/addpart','PartController@store');
Route::post('/addseri','SeriController@store');
Route::get('/getseri/{id?}/{id1?}/{id2?}',function($id = 0,$id1=0,$id2=0){
    $dt=DB::table('V_ZASZUT_SERI')->where('zas_seri','=',$id)->where('zas_zutnumber','=',$id1)->where('part_det_id','=',$id2)->get();
    return $dt;
});
Route::get('/getnewseri/{id?}',function($id = 0){
    $dt=DB::table('V_SERI')->where('part_id','=',$id)->get();
    return $dt;
});
Route::get('/getzashour/{id?}/{id1?}',function($id = 0,$id1 = 0){
    $dt=DB::select('select case when stopday >0 then stopday*24 else stoptsag end as stoptsag from ZUTGUUR.ZASPLANBASE t where t.sericode= '.$id.'and t.repid='.$id1.'');
    return $dt;
});
Route::get('/getzasplanbase/{id?}',function($id = 0){
    $dt=DB::table('ZUTGUUR.ZASPLANBASE')->where('sericode','=',$id)->get();
    return $dt;
});
Route::get('/getnumber/{id?}/{id1?}/{id3?}',function($id = 0,$id1=0,$id3=0){
    $dt=DB::table('V_ZASZUT_NUM')->where('zas_seri','=',$id)->where('zas_zutnumber','=',$id1)->where('part_seri_id','=',$id3)->where('zas_isavailable','=',1)->get();
    return $dt;
});
Route::get('/getgemtel/{id?}',function($id = 0){
    $dt=DB::table('SET_GEMTEL')->where('gemtel_type','=',$id)->get();
    return $dt;
});
Route::get('/getzut/{id?}/{id1?}',function($id = 0,$id1=0){
    $dt=DB::table('ZUTGUUR.ZUTGUUR')->where('sericode','=',$id)->orderby('zutnumber')->get();
    return $dt;
});
Route::get('/getloc/{id?}',function($id = 0){
    $dt=DB::table('V_ZUTGUUR')->where('depocode','=',$id)->get();
    return $dt;
});
Route::get('/getaddname/{id?}',function($id = 0){
    $dt=DB::table('V_ZASADDBASE')->where('addtype','=',$id)->get();
    return $dt;
});
Route::get('/getplanadd/{id?}',function($id = 0){
    $dt=DB::table('V_ZASADD')->where('repairid','=',$id)->get();
    return $dt;
});
Route::get('/getplan/{id?}',function($id = 0){
    $dt=DB::table('V_ZASPLAN')->where('repairid','=',$id)->get();
    return $dt;
});
Route::get('/getplanbaig/{id?}',function($id = 0){
    $dt=DB::table('V_ZASBAIG')->where('repairid','=',$id)->get();
    return $dt;
});
Route::get('/getplanmat/{id?}',function($id = 0){
    $dt=DB::table('V_ZASMAT')->where('repairid','=',$id)->get();
    return $dt;
});
Route::get('/getzasguilt/{id?}/{id1?}/{id2?}',function($id = 0,$id1=0,$id2=0){
    $dt=DB::table('ZUTGUUR.ZASRUN')->where('repid','=',$id2)->where('zutnumber','=',$id1)->where('sericode','=',$id)->get();
    return $dt;
});
Route::get('/getzasmat/{id?}/{id1?}/{id2?}',function($id = 0, $id1 = 0, $id2 = 0){
    $dt=DB::select('select * from V_ZASMAT t, V_ZASZUT z
    where t.sericode=z.zas_seri and t.zutnumber=z.zas_zutnumber and t.part_id=z.part_det_id and zas_seri ='.$id.' 
    and zas_zutnumber='.$id1.' and t.part_id='.$id2.'');
    return $dt;
});
Route::post('/addzaspart','EdangiController@store')->name('addzaspart');
Route::get('/getzaspart/{id?}',function($id = 0){
    $dt=DB::table('V_ZASZUT')->where('part_id','=',$id)->get();
    return $dt;
});
Route::post('/updatezaspart','EdangiController@update');
Route::get('/destroyzaspart/{id}/delete', ['as' => 'zaspart.destroy', 'uses' => 'EdangiController@destroy']);
Route::post('/searchzaspart','EdangiController@search');
Route::get('/filter_loc_seri/{date}', 'EdangiController@filter_loc_seri');
Route::get('/filter_loc_number/{date}', 'EdangiController@filter_loc_number');
Route::get('/filter_loc_part/{date}', 'EdangiController@filter_loc_part');
Route::get('/filter_loc_depo/{date}', 'EdangiController@filter_loc_depo');