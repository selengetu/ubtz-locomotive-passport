@extends('layouts.app')
@section('content')

          <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                         <div class="portlet light portlet-fit portlet-datatable">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-green">
                        </i>
                        <span class="caption-subject font-green sbold uppercase">
                            Засвар бүртгэл
                        </span>
                    </div>
             <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a class="joshview1 " id="add" data-toggle="modal" data-target="#myModal1">
                                <label class="btn btn-transparent green btn-circle btn-sm active">
                                    <i class="icon icon-plus">
                                    </i>
                                    Засвар бүртгэх
                                </label>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                <div class="panel">
                                                   <div class="panel-heading" style="background-color: #81b5d5; color: #fff">
                                                <h4 class="panel-title">
                                                    <a style="font-weight: bold;"> <i class="fa fa-search"> Хайлт </i> 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="sear" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="searchzasunplan">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input class="form-control datepicker" id="mach_start" name="mach_start" type="text">
                                                        <label for="form_control_1" style="font-size:12px;">
                                                            Эхлэх огноо
                                                        </label>
                                                        <span class="help-block">
                                                                    </span>
                                                        <i class="fa fa-calendar-plus-o">
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input class="form-control datepicker" id="mach_end" name="mach_end" type="text">
                                                        <label for="form_control_1" style="font-size:12px;">
                                                            Дуусах огноо
                                                        </label>
                                                        <span class="help-block">
                                                                    </span>
                                                        <i class="fa fa-calendar-plus-o">
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>

                                                         <div class="col-md-2">
                                                            <div class="form-group form-md-line-input has-success">
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                       <button class="btn btn-info"  style="background-color: #2EB9A8; border-color: #2EB9A8"><i class="fa fa-search"></i> Хайх</button>
                                     </div>
                                    </div>
                                        </div>
                                        
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
  
            <button class="btn btn-info" id="buttonprint" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</button>
                        <button class="btn btn-info" id="btnExport" onclick="tableToExcel('testTable', 'Export HTML Table to Excel')"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>
                   <div class="table-container">
          <div class="table-responsive" id="printarea">
              <p><center><b> {{$startdate}} -аас {{$enddate}} -ны засвар</b></center> </p>
              <table class="table table-striped table-bordered table-hover"  id="example">
                  <thead style="background-color: #81b5d5; color: #fff">
                  <tr>

                      <th> # </th>

                      <th>И/т сери, №</th>
                      <th>Секц</th>
                      <th>Орсон огноо</th>
                      <th>Гарсан огноо</th>

                      <th>Засварын томьёолол</th>

                      <th>Засварын депо</th>
                      <th>Эвдрэл</th>
                      <th>Материал</th>
                      <th>Авсан эд анги</th>
                      <th>Тавьсан эд анги</th>
       

                      <th>Тохиргоо</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; ?>
                  @foreach($zasunplan as $zasunplans)
                  <tr>
                      <td>{{$no}}</td>

                      <td>{{$zasunplans->seriname}} - {{$zasunplans->zutnumber}}</td>
                      <td>{{$zasunplans->sec}}</td>
                      <td>{{$zasunplans->repindate}}</td>
                      <td>{{$zasunplans->repoutdate}}</td>

                      <td>{{$zasunplans->repshname}}</td>
                      <td>
                          @if ($zasunplans->depocode == 5)
                              ТЧ-1
                          @elseif ($zasunplans->depocode == 2)
                              ТЧ-2
                          @elseif ($zasunplans->depocode == 3)
                              ТЧ-3
                          @elseif ($zasunplans->depocode == 1)
                              Сүхбаатар
                          @elseif ($zasunplans->depocode == 13)
                              Замын-Үүд
                          @endif
                              </td>
                      <td>{{$zasunplans->gemtel_name}}</td>
                      <td>     </td>
                      <td>      </td>
                      <td>     </td>

                      <td><a class='btn btn-xs btn-info update' data-toggle='modal' data-target='#myModalup' data-id="{{$zasunplans->repairid}}" tag=" {{$zasunplans->repairid}} "><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag="{{$zasunplans->repairid}}"  href="{{route('zasunplan.destroy', $zasunplans->repairid)}}" onclick="return confirm('Энэ засварыг устгах уу?')" ><span class='glyphicon glyphicon-trash'></span></a></td>

                  </tr>
                  <?php $no++; ?>
                  @endforeach
                  </tbody>
              </table>
  </div>
</div>
           
                
               
                </div>
                <!-- END CONTENT BODY -->
                        </div>
          <div class="modal fade" id="myModal1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Засвар бүртгэх</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">

                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#home">Үндсэн</a></li>
                              <li class="menuli1 disabled disabledTab"><a data-toggle="tab" href="#menu1">Материал</a></li>

                          </ul>
                          <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                  <form method="post"  action="addzasunplan" id="formzasunplan">
                                      <div class="col-md-12">
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Татах хэсэг</label>
                                                  <select class="form-control select2" id="zas_owndepo" name="zas_owndepo" >
                                                      <option value="5">ТЧ-1</option>
                                                      <option value="2">ТЧ-2</option>
                                                      <option value="3">ТЧ-3</option>
                                                      <option value="1">Сүхбаатар</option>
                                                      <option value="13">Замын-Үүд</option>
                                                  </select>

                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Зүтгүүрийн сери</label>
                                                  <select class="form-control select2" id="zas_seri" name="zas_seri" required="true">
                                                      <option value="0">Бүгд</option>
                                                      @foreach($locserial as $locserials)
                                                          <option value= "{{$locserials->sericode}}"> {{$locserials->sericode}} - {{$locserials->seriname}}</option>
                                                      @endforeach
                                                  </select>

                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Зүтгүүрийн дугаар</label>
                                                  <select class="form-control select2" id="zas_zutnumber" name="zas_zutnumber" >


                                                  </select>
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Секц</label>
                                                  <select class="form-control select2" id="zas_sekts" name="zas_sekts" >
                                                      <option value="0">Бүгд</option>

                                                          <option value= "А">А</option>
                                                      <option value= "Б">Б</option>
                                                  </select>

                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Хэддүгээр</label>
                                                  <select class="form-control select2" id="zas_sekts_num" name="zas_sekts_num" >

                                                      <option value="0">Бүгд</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                      <option value="5">5</option>
                                                      <option value="6">6</option>
                                                  </select>

                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Урсгал засварын томьёолол</label>
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                  <select class="form-control select2" id="zas_type" name="zas_type" >

                                                      <option value= "1"> Төлөвлөгөөт </option>
                                                      <option value= "2"> Төлөвлөгөөт бус </option>
                                                      <option value= "3"> Хоорондын засвар </option>
                                                  </select>
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Урсгал засварын нэр</label>
                                                  <select class="form-control select2" id="zas_rep" name="zas_rep" >
                                                      @foreach($rep as $reps)
                                                          <option value= "{{$reps->rep_id}}" tag="{{$reps->rep_name}}"> {{$reps->rep_name}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Засварт орсон огноо</label>
                                                  <input type="text" required="true" class="form-control inputtext" id="zas_begindate" name="zas_begindate" >
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Засварт гарсан огноо</label>
                                                  <input type="text" required="true" class="form-control inputtext" id="zas_enddate" name="zas_enddate">
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Засвар хийсэн депо</label>
                                                  <select class="form-control select2" id="zas_depo" name="zas_depo" >

                                                      <option value="5">ТЧ-1</option>
                                                      <option value="2">ТЧ-2</option>
                                                      <option value="3">ТЧ-3</option>
                                                      <option value="1">Сүхбаатар</option>
                                                      <option value="13">Замын-Үүд</option>
                                                  </select>
                                              </div>

                                          </div>

                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Гэмтэл</label>
                                                  <select class="form-control select2" id="zas_gemtel" name="zas_gemtel" >
                                                      <option value="0">Төлөвлөгөөт засварын дагуу</option>
                                                      @foreach($break as $breaks)
                                                          <option value= "{{$breaks->gemtel_id}}" tag="{{$breaks->gemtel_id}}"> {{$breaks->gemtel_type}}-{{$breaks->gemtel_name}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>

                                          </div>


                                      </div>


                                      <div class="col-md-12">
                                          <div class="pull-right">
                                              <button class="btn btn-default submit">Хадгалах</button>
                                          </div>

                                      </div>
                          </form>
                              </div>
                              <div id="menu1" class="tab-pane fade ">
                                  <form method="post" action="addzasdetail" id="formzasdetail">
                                  <div class="col-md-12">
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">  Илчит тэрэгний эд анги</label>
                                              <input type="text" class="form-control inputtext hidden" id="zasid" name="zasid">
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                              <select class="form-control select2" id="mat_part" name="mat_part" >

                                              </select>
                                          </div>

                                      </div>


                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Авсан эд ангийн сери</label>
                                              <select class="form-control select2" id="mat_avsanseri" name="mat_avsanseri" >


                                              </select>


                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Авсан эд ангийн дугаар</label>
                                              <select class="form-control select2" id="mat_avsandugaar" name="mat_avsandugaar" >


                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Тавьсан эд ангийн сери</label>
                                              <select class="form-control select2" id="mat_tavisanseri" name="mat_tavisanseri" >


                                              </select>


                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Тавьсан эд ангийн дугаар</label>
                                              <input type="text" class="form-control inputtext" id="mat_tavisandugaar" name="mat_tavisandugaar">
                                          </div>
                                      </div>

                                  </div>
                                  <table class="table table-bordered table-hover" id="zasdetail">
                                      <thead>
                                      <tr>


                                          <th>Эд ангийн төрөл</th>
                                          <th>Авсан эд ангийн сери </th>
                                          <th>Авсан эд  ангийн дугаар</th>
                                          <th>Тавьсан эд ангийн сери </th>
                                          <th>Тавьсан эд  ангийн дугаар</th>
                                          <th></th>
                                      </tr>
                                      </thead>
                                      <tbody>

                                      </tbody>
                                  </table>
                                  <div class="col-md-12">
                                      <div class="pull-right">
                                          <button class="btn btn-default">Хадгалах</button>
                                      </div>

                                  </div>
                                  </form>
                              </div>
                          </div>

                      </div>

                      <div class="modal-footer">

                      </div>
                  </div>
              </div>
          </div>
          <div class="modal fade" id="myModalup" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Засварлах</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">

                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#home1">Үндсэн</a></li>
                              <li><a data-toggle="tab" href="#menu11" id="menu112">Материал</a></li>

                          </ul>
                          <div class="tab-content">
                              <div id="home1" class="tab-pane fade in active">
                                  <form method="post"  action="updatezasunplan">
                                      <div class="col-md-12">
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Татах хэсэг</label>
                                                  <select class="form-control select2" id="upzas_owndepo" name="upzas_owndepo" >
                                                      <option value="5">ТЧ-1</option>
                                                      <option value="2">ТЧ-2</option>
                                                      <option value="3">ТЧ-3</option>
                                                      <option value="1">Сүхбаатар</option>
                                                      <option value="13">Замын-Үүд</option>
                                                  </select>

                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Зүтгүүрийн сери</label>
                                                  <select class="form-control select2" id="upzas_seri" name="upzas_seri" required="true">
                                                      <option value="0">Бүгд</option>
                                                      @foreach($locserial as $locserials)
                                                          <option value= "{{$locserials->sericode}}"> {{$locserials->sericode}} - {{$locserials->seriname}}</option>
                                                      @endforeach
                                                  </select>

                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Зүтгүүрийн дугаар</label>
                                                  <input type="text" required="true" class="form-control inputtext" id="upzas_zutnumber" name="upzas_zutnumber" >
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Секц</label>
                                                  <select class="form-control select2" id="upzas_sekts" name="upzas_sekts" >
                                                      <option value="0">Бүгд</option>

                                                      <option value= "А">А</option>
                                                      <option value= "Б">Б</option>
                                                  </select>

                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Хэддүгээр</label>
                                                  <select class="form-control select2" id="upzas_sekts_num" name="upzas_sekts_num" >

                                                      <option value="0">Бүгд</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                      <option value="5">5</option>
                                                      <option value="6">6</option>
                                                  </select>

                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Урсгал засварын томьёолол</label>
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                  <select class="form-control select2" id="upzas_type" name="upzas_type" >

                                                      <option value= "1"> Төлөвлөгөөт </option>
                                                      <option value= "2"> Төлөвлөгөөт бус </option>
                                                      <option value= "3"> Хоорондын засвар </option>
                                                  </select>
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Урсгал засварын нэр</label>
                                                  <select class="form-control select2" id="upzas_rep" name="upzas_rep" >
                                                      @foreach($rep as $reps)
                                                          <option value= "{{$reps->rep_id}}" tag="{{$reps->rep_name}}"> {{$reps->rep_name}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <input type="text" class="form-control inputtext hidden" id="upzasid" name="upzasid">
                                              <div class="form-group">
                                                  <label for="name">Засварт орсон огноо</label>
                                                  <input type="text" required="true" class="form-control inputtext" id="upzas_begindate" name="upzas_begindate" >
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Засварт гарсан огноо</label>
                                                  <input type="text" required="true" class="form-control inputtext" id="upzas_enddate" name="upzas_enddate">
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Засвар хийсэн депо</label>
                                                  <select class="form-control select2" id="upzas_depo" name="upzas_depo" >

                                                      <option value="5">ТЧ-1</option>
                                                      <option value="2">ТЧ-2</option>
                                                      <option value="3">ТЧ-3</option>
                                                      <option value="1">Сүхбаатар</option>
                                                      <option value="13">Замын-Үүд</option>
                                                  </select>
                                              </div>

                                          </div>

                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Гэмтэл</label>
                                                  <select class="form-control select2" id="upzas_gemtel" name="upzas_gemtel" >
                                                      @foreach($break as $breaks)
                                                          <option value= "{{$breaks->gemtel_id}}" tag="{{$breaks->gemtel_id}}"> {{$breaks->gemtel_type}}-{{$breaks->gemtel_name}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>

                                          </div>


                                      </div>


                                      <div class="col-md-12">
                                          <div class="pull-right">
                                              <button class="btn btn-default submit">Хадгалах</button>
                                          </div>

                                      </div>
                                  </form>
                              </div>
                              <div id="menu11" class="tab-pane fade ">
                                  <form method="post" action="updatezasdetail" id="formupdatedetail">
                                      <div class="col-md-12">
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">  Илчит тэрэгний эд анги</label>

                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                  <input type="text" class="form-control inputtext hidden" id="upzasid1" name="upzasid1">
                                                  <select class="form-control select2" id="upmat_part" name="upmat_part" >
                                                      <option value="0">Бүгд</option>
                                                      @foreach($part as $parts)
                                                          <option value= "{{$parts->part_id}}">{{$parts->part_name}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>

                                          </div>


                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Авсан эд ангийн сери</label>
                                                  <select class="form-control select2" id="upmat_avsanseri" name="upmat_avsanseri" >


                                                  </select>


                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Авсан эд ангийн дугаар</label>
                                                  <select class="form-control select2" id="upmat_avsandugaar" name="upmat_avsandugaar" >


                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Тавьсан эд ангийн сери</label>
                                                  <select class="form-control select2" id="upmat_tavisanseri" name="upmat_tavisanseri" >


                                                  </select>


                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Тавьсан эд ангийн дугаар</label>
                                                  <input type="text" class="form-control inputtext" id="upmat_tavisandugaar" name="upmat_tavisandugaar">
                                              </div>
                                          </div>

                                      </div>
                                      <table class="table table-bordered table-hover" id="upzasdetail">
                                          <thead>
                                          <tr>


                                              <th>Эд ангийн төрөл</th>
                                              <th>Авсан эд ангийн сери </th>
                                              <th>Авсан эд  ангийн дугаар</th>
                                              <th>Тавьсан эд ангийн сери </th>
                                              <th>Тавьсан эд  ангийн дугаар</th>
                                              <th></th>
                                          </tr>
                                          </thead>
                                          <tbody>

                                          </tbody>
                                      </table>
                                      <div class="col-md-12">
                                          <div class="pull-right">
                                              <button class="btn btn-default submit">Хадгалах</button>
                                          </div>

                                      </div>
                                  </form>
                              </div>
                          </div>

                      </div>

                      <div class="modal-footer">

                      </div>
                  </div>
              </div>
          </div>
    <style>
        .disabledTab {
            pointer-events: none;
        }
    </style>
            @endsection
            @section('cscript')
          <script type="text/javascript">
            $("#datepicker").datepicker( {
    format: "mm-yyyy",
    viewMode: "months", 
    minViewMode: "months"
});
            function detail(itag)
            {
                $.get('getzasdetail/'+itag,function(data){
                    $("#zasdetail tbody").empty();
                    $("#upzasdetail tbody").empty();

                    $.each(data,function(i,qwe){

                        var sHtmls = "<tr>" +
                            "   <td class='m1'>" + qwe.part_name + "</td>" +
                            "   <td class='m2'>" + qwe.seri_name + "</td>" +
                            "   <td class='m3'>" + qwe.solilt_num + "</td>" +
                            "   <td class='m2'>" + qwe.eseri_name + "</td>" +
                            "   <td class='m3'>" + qwe.solilt_enum + "</td>" +
                            "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalanhaaramj' data-id=" + qwe.solilt_detail_id + " tag=" +  qwe.solilt_detail_id + " '><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.solilt_detail_id + " onclick='destroydetail(" + qwe.solilt_detail_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +

                            "</tr>";
                        $("#zasdetail tbody").append(sHtmls);
                        $("#upzasdetail tbody").append(sHtmls);
                    });

                });
            }
            function destroydetail(itag)
            {
                var marsh=$('#upzasid1').val();
                $.ajax(
                    {
                        url: "zasdetail/delete/"+itag,
                        type: 'GET',
                      
                        data: {
                            "id": itag,
                            "_method": 'DELETE',

                        },
                        success: function ()
                        {
                            alert('Материал устгагдлаа');
detail(marsh);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            if (jqXHR.status == 500) {
                                alert('Internal error: ' + jqXHR.responseText);
                            } else {
                                alert('Unexpected error.');
                            }
                        }
                    });
            }
 function printDiv() {

     var printContents = document.getElementById('printarea').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
 }
            $('#formzasunplan').submit(function(event){
                event.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'addzasunplan',
                    data: $('form#formzasunplan').serialize(),
                    success: function(result){

                        alert('Засвар бүртгэгдлээ');//this will alert you the last_id
                        ;
                        $("#zasid").val(result);

                        $( ".menuli1" ).removeClass("disabled disabledTab");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status == 500) {
                            alert('Internal error: ' + jqXHR.responseText);
                        } else {
                            alert('Unexpected error.');
                        }
                    }
                })

            });
            $('#formzasdetail').submit(function(event){
                event.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'addzasdetail',
                    data: $('form#formzasdetail').serialize(),
                    success: function(result){

                        alert('Материал бүртгэгдлээ');//this will alert you the last_id
                        $('#mat_tavisandugaar').val('');
                        $('.nav-tabs > .active').next('li').find('a').trigger('click');
                        var tag =  $("#zasid").val();
                        detail(tag);
                        var itag1=$('#zas_zutnumber').val();

                        var itag=$('#zas_seri').val();

                        var itag2=$('#mat_part').val();

                        var itag3=$('#mat_avsanseri').val();
                        $.get('getnumber/'+itag+'/'+itag1+'/'+itag2+'/'+itag3,function(data){
                            $('#mat_avsandugaar').empty();
                            $.each(data,function(i,qwe){
                                $('#mat_avsandugaar').append($('<option>', {
                                    value: qwe.part_num,
                                    id: qwe.part_num,
                                    text: qwe.part_num
                                })).trigger('change');
                            });
                        });
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status == 500) {
                            alert('Internal error: ' + jqXHR.responseText);
                        } else {
                            alert('Unexpected error.');
                        }
                    }
                })

            });
            $('#formupdatedetail').submit(function(event){
                event.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'updatezasdetail',
                    data: $('form#formupdatedetail').serialize(),
                    success: function(result){

                        alert('Материал бүртгэгдлээ');//this will alert you the last_id
                        ;
                        $('.nav-tabs > .active').next('li').find('a').trigger('click');
                        var tag =  $("#upzasid1").val();
                        detail(tag);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status == 500) {
                            alert('Internal error: ' + jqXHR.responseText);
                        } else {
                            alert('Unexpected error.');
                        }
                    }
                })

            });

</script>
 <script type="text/javascript">
        var tableToExcel = (function () {
            var uri = 'data:application/vnd.ms-excel;base64,'
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><p><center><b>  УБТЗ-ын Улаанбаатар Зүтгүүрийн депогийн 2018 оны 7-р сарын тууз бүртгэлийн тайлан</b> </center> </p><table border="1">{table}</table><span> ТАЙЛАН ГАРГАСАН: Тууз орчуулагч:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span></body></html>'
                , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
            return function (table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
                var blob = new Blob([format(template, ctx)]);
                var blobURL = window.URL.createObjectURL(blob);
 
                if (ifIE()) {
                    csvData = table.innerHTML;
                    if (window.navigator.msSaveBlob) {
                        var blob = new Blob([format(template, ctx)], {
                            type: "text/html"
                        });
                        navigator.msSaveBlob(blob, '' + name + '.xls');
                    }
                }
                else
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
 
        function ifIE() {
            var isIE11 = navigator.userAgent.indexOf(".NET CLR") > -1;
            var isIE11orLess = isIE11 || navigator.appVersion.indexOf("MSIE") != -1;
            return isIE11orLess;
        }
    </script>

          <script type="text/javascript">
              $(document).ready(function() {
                
                  $('#zas_seri').change(function(){
                      var itag=$(this).val();
                      var itag1=$('#zas_owndepo').val();
                      $.get('getzut/'+itag+'/'+itag1,function(data){
                          $('#zas_zutnumber').empty();

                          $.each(data,function(i,qwe){
                              $('#zas_zutnumber').append($('<option>', {
                                  value: qwe.zutnumber,
                                  id: qwe.zutnumber,
                                  text: qwe.zutnumber
                              })).trigger('change');
                          });
                      });
                  });

                  $('#zas_owndepo').change(function(){
                      var itag=$(this).val();
                      $.get('getloc/'+itag,function(data){
                          $('#zas_seri').empty();

                          $.each(data,function(i,qwe){
                              console.log(qwe);
                              $('#zas_seri').append($('<option>', {
                                  value: qwe.sericode,
                                  id: qwe.sericode,
                                  text: qwe.seriname
                              })).trigger('change');
                          });
                      });
                  });

                  $('#upzas_seri').change(function(){
                      var itag=$(this).val();

                      var itag1=$('#upzas_owndepo').val();
                      $.get('getzut/'+itag+'/'+itag1,function(data){
                          $('#upzas_zutnumber').empty();

                          $.each(data,function(i,qwe){
                              $('#upzas_zutnumber').append($('<option>', {
                                  value: qwe.zutnumber,
                                  id: qwe.zutnumber,
                                  text: qwe.zutnumber
                              })).trigger('change');
                          });
                      });
                  });
                  $('.update').on('click',function(){
                      var itag=$(this).attr('tag');
                      $.get('zasunplanfill/'+itag,function(data){
                          $.each(data,function(i,qwe){
                              $('#upzasid').val(qwe.repairid);
                              $('#upzasid1').val(qwe.repairid);
                              $('#upzas_owndepo').val(qwe.depocode).trigger('change');
                              $('#upzas_seri').val(qwe.sericode).trigger('change');
                              $('#upzas_zutnumber').val(qwe.zutnumber);
                              $('#upzas_sekts').val(qwe.sec).trigger('change');
                              $('#upzas_sekts_num').val(qwe.solilt__sekts_num);
                              $('#upzas_type').val(qwe.solilt_zastype).trigger('change');
                              $('#upzas_rep').val(qwe.repid).trigger('change');
                              $('#upzas_begindate').val(qwe.repindate);
                              $('#upzas_depo').val(qwe.depocode).trigger('change');
                              $('#upzas_gemtel').val(qwe.gemtel_id).trigger('change');
                              $('#upzas_enddate').val(qwe.repoutdate);
                          });

                      });
                      detail(itag);
                  });

                  $( ".menuli1" ).click(function() {
                      var itag1=$('#zas_zutnumber').val();
                      var itag=$('#zas_seri').val();
                      $.get('getsolilt/'+itag+'/'+itag1,function(data){
                          $('#mat_part').empty();
                          $.each(data,function(i,qwe){

                              $('#mat_part').append($('<option>', {
                                  value: qwe.part_det_id,
                                  id: qwe.part_det_id,
                                  text: qwe.part_name
                              })).trigger('change');
                          });

                      });
                  });
                  $( "#menu112" ).click(function() {
                      var itag1=$('#upzas_zutnumber').val();
                      var itag=$('#upzas_seri').val();
                      $.get('getsolilt/'+itag+'/'+itag1,function(data){
                          $('#upmat_part').empty();
                          $.each(data,function(i,qwe){

                              $('#upmat_part').append($('<option>', {
                                  value: qwe.part_det_id,
                                  id: qwe.part_det_id,
                                  text: qwe.part_name
                              })).trigger('change');
                          });

                      });
                  });
                  $('#upmat_part').change(function(){
                      var itag1=$('#upzas_zutnumber').val();
                      var itag=$('#upzas_seri').val();
                      var itag2=$(this).val();
                      console.log(itag);
                      console.log(itag1);
                      console.log(itag2);
                      $.get('getseri/'+itag+'/'+itag1+'/'+itag2,function(data){
                          $('#upmat_avsanseri').empty();
                          $.each(data,function(i,qwe){
                              $('#upmat_avsanseri').append($('<option>', {
                                  value: qwe.part_seri_id,
                                  id: qwe.part_seri_id,
                                  text: qwe.seri_name
                              })).trigger('change');
                          });
                      });
                      $.get('getnewseri/'+itag2,function(data){
                          $('#upmat_tavisanseri').empty();
                          $.each(data,function(i,qwe){
                              $('#upmat_tavisanseri').append($('<option>', {
                                  value: qwe.seri_id,
                                  id: qwe.seri_id,
                                  text: qwe.seri_name
                              })).trigger('change');
                          });
                      });
                  });
                  $('#mat_part').change(function(){
                      var itag1=$('#zas_zutnumber').val();
                      var itag=$('#zas_seri').val();
                      var itag2=$(this).val();
                      $.get('getseri/'+itag+'/'+itag1+'/'+itag2,function(data){
                          $('#mat_avsanseri').empty();
                          $.each(data,function(i,qwe){
                              $('#mat_avsanseri').append($('<option>', {
                                  value: qwe.part_seri_id,
                                  id: qwe.part_seri_id,
                                  text: qwe.seri_name
                              })).trigger('change');
                          });
                      });
                      $.get('getnewseri/'+itag2,function(data){
                          $('#mat_tavisanseri').empty();
                          $.each(data,function(i,qwe){
                              $('#mat_tavisanseri').append($('<option>', {
                                  value: qwe.seri_id,
                                  id: qwe.seri_id,
                                  text: qwe.seri_name
                              })).trigger('change');
                          });
                      });
                  });
                  $('#mat_avsanseri').change(function(){
                      var itag1=$('#zas_zutnumber').val();

                      var itag=$('#zas_seri').val();

                      var itag2=$('#mat_part').val();

                      var itag3=$(this).val();
                      $.get('getnumber/'+itag+'/'+itag1+'/'+itag2+'/'+itag3,function(data){
                          $('#mat_avsandugaar').empty();
                          $.each(data,function(i,qwe){
                              $('#mat_avsandugaar').append($('<option>', {
                                  value: qwe.part_num,
                                  id: qwe.part_num,
                                  text: qwe.part_num
                              })).trigger('change');
                          });
                      });
                  });
                  $('#upmat_avsanseri').change(function(){
                      var itag1=$('#upzas_zutnumber').val();

                      var itag=$('#upzas_seri').val();

                      var itag2=$('#upmat_part').val();

                      var itag3=$(this).val();
                      $.get('getnumber/'+itag+'/'+itag1+'/'+itag2+'/'+itag3,function(data){
                          $('#upmat_avsandugaar').empty();
                          $.each(data,function(i,qwe){
                              $('#upmat_avsandugaar').append($('<option>', {
                                  value: qwe.part_num,
                                  id: qwe.part_num,
                                  text: qwe.part_num
                              })).trigger('change');
                          });
                      });
                  });
                  $("#zas_begindate").datetimepicker({format: 'YYYY-MM-DD HH:mm'});
                  $("#zas_enddate").datetimepicker({format: 'YYYY-MM-DD HH:mm'});
                  $("#mach_start").datepicker({
                      format: 'yyyy-mm-dd',

                  });
                  $("#mach_end").datepicker({
                      format: 'yyyy-mm-dd',

                  });
                  $('#example').DataTable( {

                      "language": {
                          "lengthMenu": " _MENU_ бичлэг",
                          "zeroRecords": "Бичлэг олдсонгүй",
                          "info": "_PAGE_ ээс _PAGES_ хуудас" ,
                          "infoEmpty": "Бичлэг олдсонгүй",
                          "infoFiltered": "(filtered from _MAX_ total records)",
                          "search": "Хайлт:"
                      },
                      dom: 'Bfrtip',
                      buttons: [

                          'csv', 'excel', 'pdf'

                      ]


                  } );



              } );
          </script>
@endsection