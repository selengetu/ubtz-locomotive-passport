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
                           Цахим дэвтэр                           
                        </span>
                    </div>
                        <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a class="joshview1 " id="add" data-toggle="modal" data-target="#myModal1">
                                <label class="btn btn-transparent green btn-circle btn-sm active">
                                    <i class="icon icon-plus">
                                    </i>
                                     Эд анги нэмэх
                                </label>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
                 
                                        
                               <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Үндсэн</a></li>
      <li><a data-toggle="tab" href="#detail" id="tabdetail">Эд анги</a></li>
   
  </ul>
  <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div class="panel" >
                                            <div class="panel-heading" style="background-color: #81b5d5; color: #fff">
                                                <h4 class="panel-title">
                                                    <a  style="font-weight: bold;"> <i class="fa fa-search"></i>  Хайлт 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="sear" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                   <form method="post" action="filter_zaspart">

                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="name">Татах хэсэг</label>
                                                    <select class="form-control select2" id="loc_depo" name="loc_depo" onchange="javascript:location.href = 'filter_loc_depo/'+this.value;" >
                                                    @foreach($depo as $depos)
                                                        <option value= "{{$depos->depocode}}" @if(Session::get('loc_depo')==$depos->depocode)
                                                        selected @endif >{{$depos->deponame}} </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">

                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <select class="form-control select2" id="loc_seri" name="loc_seri" onchange="javascript:location.href = 'filter_loc_seri/'+this.value;" >

                                                            @foreach($locserial as $locserials)
                                                                <option value= "{{$locserials->sericode}}" @if(Session::get('loc_seri')==$locserials->
                                sericode) selected @endif >{{$locserials->seriname}} </option>
                                                            @endforeach
                                                        </select>
                                                        <label for="form_control_1" style="font-size:12px;">
                                                            Илчит тэрэгний сери
                                                        </label>
                                                        <span class="help-block">
                                                                    </span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">

                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <select class="form-control select2" id="loc_number" name="loc_number" onchange="javascript:location.href = 'filter_loc_number/'+this.value;">
                                                            @foreach($loc as $locs)
                                                                <option value= "{{$locs->zutnumber}}" @if(Session::get('loc_zutnumber')==$locs->zutnumber)
                                                                selected @endif>{{$locs->zutnumber}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="form_control_1" style="font-size:12px;">
                                                            Илчит тэрэгний дугаар
                                                        </label>
                                                        <span class="help-block">
                                                                    </span>

                                                    </div>
                                                </div>
                                            </div>
                                                              <div class="col-md-3">

                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                    <select class="form-control select2" id="loc_part" name="loc_part" onchange="javascript:location.href = 'filter_loc_part/'+this.value;">
                                                                     <option value="0">Бүгд</option>
                                                                          @foreach($zpart as $zparts)
                                                                               <option value= "{{$zparts->part_det_id}}" @if(Session::get('loc_part')==$zparts->part_det_id)
                                                                               selected @endif>{{$zparts->part_name}}</option>
                                                                           @endforeach
                                                                     </select>
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Илчит тэрэгний эд анги
                                                                    </label>
                                                                    <span class="help-block">
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>

                                        </div>
                                        
                                         </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                   <div class="table-container">
            
                            <p><center><b> Илчит тэрэгний эд ангийн дэвтэр</b></center> </p>
                    
                    <button class="btn btn-info" id="buttonprint" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</button>
                        <button class="btn btn-info" id="btnExport" onclick="tableToExcel('testTable', 'Export HTML Table to Excel')"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>     
          <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover"  id="example">
                                              <thead style="background-color: #81b5d5; color: #fff">
                                                    <tr >

                                                        <th> # </th>
                                                        <th> Депо</th>
                                                        <th> Илчит тэрэг №</th>
                                                        <th> Секц №</th>
                                                        <th> Эд ангийн төрөл</th>
                                                        <th> Эд ангийн марк </th>
                                                        <th> Эд ангийн дугаар</th>
                                                        <th> Үйлдвэрлэсэн огноо</th>
                                                        <th> Насжилт</th>
                                                        <th> Тавьсан огноо</th>
                                                        <th>ЗП гүйлт</th>
                                                        <th>ТР-3 гүйлт</th>
                                                        <th>ТР-3 огноо</th>
                                                        <th>ТР-2 гүйлт</th>
                                                        <th>ТР-2 огноо</th>
                                                        <th></th>
                                                       
                                                           
                                                      </tr>
                                                </thead>
                                                  <tbody>
                                                   


                        <?php $no = 1; ?>
                        @foreach($zaspart as $zasparts)

                                  <tr class="zaspart" onclick="$('#tabdetail').trigger('click')"  data-id="{{$zasparts->part_id}}" tag="{{$zasparts->part_id}}">

                                    <td>{{$no}}</td>
                                      <td>{{$zasparts->zas_depo}}</td>
                                      <td>{{$zasparts->seriname}}-{{$zasparts->zas_zutnumber}}</td>
                                      <td>{{$zasparts->zas_sekts}} {{$zasparts->zas_sekts_num}}</td>
                                    <td>{{$zasparts->part_name}}</td>
                                    <td>{{$zasparts->seri_name}}</td>
                                    <td>{{$zasparts->part_num}}</td>
                                    <td>{{$zasparts->part_date}}</td>
                                    <td>{{ round(($zasparts->days / 365),2)}} жил</td>
                                      <td>{{date('Y-m-d', strtotime($zasparts->zas_begindate))}}</td>
                                      <td>{{$zasparts->zp_guilt}}</td>
                                      <td>{{$zasparts->tr3_guilt}}</td>
                                      <td>{{$zasparts->tr3_date}}</td>
                                      <td>{{$zasparts->tr2_guilt}}</td>
                                      <td>{{$zasparts->tr2_date}}</td>
                                      <td><a class="btn btn-xs btn-danger"  href="{{route('zaspart.destroy', $zasparts->part_id)}}"onclick="return confirm('Энэ эд ангийг устгах уу?')" ><span class="glyphicon glyphicon-trash"></span></a></td>
                                </tr>
                                <?php $no++; ?>
                                @endforeach



                                                  </tbody>
                                            </table>
  </div>
</div>
  
      </div>
  <div id="detail" class="tab-pane fade">
     <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                   <a style="font-weight: bold;"> <i class="fa fa-edit"> </i> Эд анги бүртгэл
                                                   </a>
                                        
                                                </h4>
                                            </div>
                                          
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="updatezaspart" id="formzaspart">
                           
                                              <div class="col-md-12">
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <label for="name">Татах хэсэг</label>
                                                          <select class="form-control select2" id="angi_depo" name="angi_depo" >
                                                              <option value="5">ТЧ-1</option>
                                                              <option value="2">ТЧ-2</option>
                                                              <option value="3">ТЧ-3</option>
                                                    
                                                          </select>

                                                      </div>
                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <label for="name"> Илчит тэрэгний сери</label>
                                                          <select class="form-control select2" id="angi_loc" name="angi_loc" >
                                                              <option value="0">Бүгд</option>
                                                              @foreach($locserial as $locserials)
                                                                  <option value= "{{$locserials->sericode}}">{{$locserials->seriname}}</option>
                                                              @endforeach
                                                          </select>

                                                      </div>
                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <label for="name">Илчит тэрэгний дугаар</label>
                                                          <input type="text" class="form-control inputtext hidden" id="angi_id" name="angi_id">
                                                          <input class="form-control datepicker" id="angi_zutnum" name="angi_zutnum" type="text">
                                                      </div>

                                                  </div>

                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <label for="name">Секц</label>
                                                          <select class="form-control select2" id="angi_sekts" name="angi_sekts" >
                                                              <option value="0">Бүгд</option>
                                                              <option value="А">А</option>
                                                              <option value="Б">Б</option>
                                                          </select>

                                                      </div>
                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <label for="name">Хэддүгээр</label>
                                                          <select class="form-control select2" id="angi_sekts_num" name="angi_sekts_num" >
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


                                                  <div class="col-md-2">
                                      <div class="form-group">
                                          <label for="name">Илчит тэрэгний эд анги</label>
                                          <select class="form-control select2" id="angi_part" name="angi_part" >
                                             <option value="0">Бүгд</option>
                                                  @foreach($part as $parts)
                                                    <option value= "{{$parts->part_id}}">{{$parts->part_name}}</option>
                                                  @endforeach
                                          </select>

                                      </div>
                                  </div>


                    <div class="col-md-2">
                <div class="form-group">
                <label for="name">Эд ангийн марк</label>
                    <div class="form-group">

                        <select class="form-control select2" id="angi_seri" name="angi_seri" >
                            @foreach($seri as $seris)
                                <option value= "{{$seris->seri_id}}">{{$seris->seri_name}}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
               
                  </div>

                    <div class="col-md-2">
                <div class="form-group">
                <label for="name">Эд ангийн дугаар</label>
                  <input type="text" class="form-control inputtext" id="angi_dugaar" name="angi_dugaar">
                </div>
               
                  </div>
                       <div class="col-md-2">
                <div class="form-group">
                <label for="name">Үйлдвэрлэсэн огноо</label>
                    <input class="form-control datepicker" id="angi_ognoo" name="angi_ognoo" type="text">
                </div>
               
                  </div>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <label for="name">ЗП гүйлт</label>
                                                          <input type="text" class="form-control inputtext" id="angi_zp_guilt" name="angi_zp_guilt" >
                                                      </div>

                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <label for="name">ТР-3 гүйлт</label>
                                                          <input type="text" class="form-control inputtext" id="angi_tr3_guilt" name="angi_tr3_guilt" >
                                                      </div>

                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <label for="name">ТР-3 огноо</label>
                                                          <input type="text" class="form-control inputtext" id="angi_tr3_date" name="angi_tr3_date">
                                                      </div>

                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <label for="name">ТР-2 гүйлт</label>
                                                          <input type="text" class="form-control inputtext" id="angi_tr2_guilt" name="angi_tr2_guilt" >
                                                      </div>

                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <label for="name">ТР-2 огноо</label>
                                                          <input type="text" class="form-control inputtext" id="angi_tr2_date" name="angi_tr2_date">
                                                      </div>

                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <label for="name">Илчит тэрэгэнд тавьсан огноо</label>
                                                          <input class="form-control datepicker" id="angi_tavisanognoo" name="angi_tavisanognoo" type="text">
                                                      </div>

                                                  </div>

                                      <div class="col-md-2">
                                                            <div class="form-group form-md-line-input has-success">
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                       <button class="btn btn-success submit" style="background-color: #81b5d5; border-color: #81b5d5;"><i class="fa fa-search"></i> Хадгалах</button>
                                     </div>
                                    </div>
                                              </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                          
                                        </div>
       

                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a style="font-weight: bold;"> <i class="fa fa-flag"> </i> Эд ангийн түүх
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="marshbureldehuun" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                   
                                        <div class="col-md-12">
                                                 <table id="edangihistory" class="table table-striped table-bordered table-hover">
                                                     <thead>
                                                     <th>Тавьсан огноо</th>
                                                     <th>Авсан огноо</th>
                                                     <th>Татах хэсэг</th>
                                                     <th>Гал тэрэгний сери</th>
                                                     <th>Гал тэрэгний №</th>
                                                     <th>Секц</th>
                                                     <th>Засвар</th>
                                                     <th>Тайлбар</th>


                                                     </thead>
                                                     <tbody></tbody>
                                                 </table>        
                                                                
                                        </div>
                                        
                                       
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                        
     
  </div>
</div>
        
                </div>
                <!-- END CONTENT BODY -->
            </div>
           <div class="modal fade " id="myModal1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Эд анги бүртгэх</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form method="post" action="addzaspart">
      <div class="modal-body">

          <div class="col-md-12">
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name">Татах хэсэг</label>
                      <select class="form-control select2" id="ed_depo" name="ed_depo" >
                          <option value="5">ТЧ-1</option>
                          <option value="2">ТЧ-2</option>
                          <option value="3">ТЧ-3</option>
                        
                      </select>

                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name"> Илчит тэрэгний сери</label>
                      <select class="form-control select2" id="ed_loc" name="ed_loc" >
                          <option value="0">Бүгд</option>
                          @foreach($locserial as $locserials)
                              <option value= "{{$locserials->sericode}}">{{$locserials->seriname}}</option>
                          @endforeach
                      </select>

                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name">Илчит тэрэгний дугаар</label>
                       <select class="form-control select2" id="ed_zut" name="ed_zut" >

                      </select>
                  </div>

              </div>

              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name">Секц</label>
                      <select class="form-control select2" id="ed_sekts" name="ed_sekts" >
                          <option value="0">Бүгд</option>
                          <option value="А">А</option>
                          <option value="Б">Б</option>
                      </select>

                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name">Хэддүгээр</label>
                      <select class="form-control select2" id="ed_sekts_num" name="ed_sekts_num" >
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
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group">
                      <label for="name">Илчит тэрэгний эд анги</label>
                      <select class="form-control select2" id="ed_part" name="ed_part" >
                          <option value="0">Бүгд</option>
                          @foreach($part as $parts)
                              <option value= "{{$parts->part_id}}">{{$parts->part_name}}</option>
                          @endforeach
                      </select>

                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name">Эд ангийн марк</label>
                      <select class="form-control select2" id="ed_seri" name="ed_seri" >


                      </select>

                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name">Эд ангийн дугаар</label>
                      <input type="text" class="form-control inputtext" id="ed_dugaar" name="ed_dugaar">
                  </div>
              </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="name">Үйлдвэрлэсэн огноо</label>
                          <input class="form-control datepicker" id="ed_ognoo" name="ed_ognoo" type="text">
                      </div>

                  </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name">Илчит тэрэгэнд тавьсан огноо</label>
                      <input class="form-control datepicker" id="ed_tavisanognoo" name="ed_tavisanognoo" type="text">
                  </div>

              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name">ЗП гүйлт</label>
                      <input type="text" class="form-control inputtext" id="ed_zp_guilt" name="ed_zp_guilt" >
                  </div>

              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name">ТР-3 гүйлт</label>
                      <input type="text" class="form-control inputtext" id="ed_tr3_guilt" name="ed_tr3_guilt" >
                  </div>

              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name">ТР-3 огноо</label>
                      <input type="text"  class="form-control inputtext" id="ed_tr3_date" name="ed_tr3_date">
                  </div>

              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name">ТР-2 гүйлт</label>
                      <input type="text" class="form-control inputtext" id="ed_tr2_guilt" name="ed_tr2_guilt" >
                  </div>

              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name">ТР-2 огноо</label>
                      <input type="text"  class="form-control inputtext" id="ed_tr2_date" name="ed_tr2_date">
                  </div>

              </div>
              <div class="col-md-3">
                  <div class="form-group form-md-line-input has-success">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                      <button class="btn btn-success submit" style="background-color: #81b5d5; border-color: #81b5d5;"><i class="fa fa-search"></i> Хадгалах</button>
                  </div>
              </div>
          </div>

        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
        <button type="submit" class="btn btn-primary">Хадгалах</button>
      </div>
    </form>
    </div>
  </div>
</div>




  @include('layouts.partials.modal')
            <style type="text/css">
              .disabledTab {
    pointer-events: none;
}
 @page { size: landscape; }
            </style>
            <style>


 .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>
            @endsection
          
            @section('cscript')
            <script type="text/javascript">

                        $(document).ready(function(){
                            $('#btnNext').click(function(){

                                    $('.nav-tabs > .active').next('li').find('a').trigger('click');
                                

                            });

              $('#ed_part').change(function(){
            var itag=$(this).val();
           $.get('getnewseri/'+itag,function(data){
                 $('#ed_seri').empty();
                  
                $.each(data,function(i,qwe){
                
                     $('#ed_seri').append($('<option>', {
                        value: qwe.seri_id,
                        id: qwe.seri_id,
                        text: qwe.seri_name
                    })).trigger('change');
                });
            });
              });

                            $('#ed_loc').change(function(){
                                var itag=$(this).val();

                                var itag1=$('#ed_depo').val();
                                $.get('getzut/'+itag+'/'+itag1,function(data){
                                    $('#ed_zut').empty();

                                    $.each(data,function(i,qwe){
                                        $('#ed_zut').append($('<option>', {
                                            value: qwe.zutnumber,
                                            id: qwe.zutnumber,
                                            text: qwe.zutnumber
                                        })).trigger('change');
                                    });
                                });
                            });
                            $('#ed_depo').change(function(){
                                var itag=$(this).val();
                                $.get('getloc/'+itag,function(data){
                                    $('#ed_loc').empty();

                                    $.each(data,function(i,qwe){
                                        console.log(qwe);
                                        $('#ed_loc').append($('<option>', {
                                            value: qwe.sericode,
                                            id: qwe.sericode,
                                            text: qwe.seriname
                                        })).trigger('change');
                                    });
                                });
                            });

                            $("#ed_ognoo").datepicker({
                                format: 'yyyy-mm-dd',

                            });
                            $("#ed_tavisanognoo").datepicker({
                                format: 'yyyy-mm-dd',

                            });
                            $("#angi_ognoo").datepicker({
                                format: 'yyyy-mm-dd',

                            });
                            $("#angi_tavisanognoo").datepicker({
                                format: 'yyyy-mm-dd',

                            });
                            $("#angi_tr3_date").datepicker({
                                format: 'yyyy-mm-dd',

                            });
                            $("#angi_tr2_date").datepicker({
                                format: 'yyyy-mm-dd',

                            });
                            $("#ed_tr3_date").datepicker({
                                format: 'yyyy-mm-dd',

                            });
                            $("#ed_tr2_date").datepicker({
                                format: 'yyyy-mm-dd',

                            });
                            $('.zaspart').on('click',function(){
                                var itag=$(this).attr('tag');
                                console.log(itag);
                                $.get('getzaspart/'+itag,function(data){

                                    $.each(data,function(i,qwe){
                                        var sHtml = " <tr class='table-row' >" +
                                            "   <td class='m1'>" + qwe.zas_begindate+ "</td>" +
                                            "   <td class='m1'>" + qwe.zas_enddate+ "</td>" +
                                            "   <td class='m1'>" + qwe.zas_depo+ "</td>" +
                                            "   <td class='m2'>" + qwe.seriname + "</td>" +
                                            "   <td class='m3'>" + qwe.zas_zutnumber + "</td>" +
                                            "   <td class='m3'>" + qwe.zas_sekts + "</td>"+
                                            "   <td class='m3'>" +  + "</td>"+
                                            "   <td class='m3'>" +  + "</td>"+
                                            "</tr>";

                                        $("#edangihistory tbody").append(sHtml);


                                        $('#angi_loc').val(qwe.zas_seri).trigger('change');
                                        $('#angi_depo').val(qwe.zas_depo).trigger('change');
                                        $('#angi_zutnum').val(qwe.zas_zutnumber);
                                        $('#angi_sekts').val(qwe.zas_sekts).trigger('change');
                                        $('#angi_sekts_num').val(qwe.zas_sekts_num).trigger('change');
                                        $('#angi_part').val(qwe.part_det_id).trigger('change');
                                        $('#angi_seri').val(qwe.part_seri_id).trigger('change');
                                        $('#angi_tr3_guilt').val(qwe.tr3_guilt);
                                        $('#angi_tr3_date').val(qwe.tr3_date);
                                        $('#angi_zp_guilt').val(qwe.zp_guilt);
                                        $('#angi_dugaar').val(qwe.part_num);
                                        $('#angi_ognoo').val(qwe.part_date);
                                        $('#angi_nas').val(qwe.days);
                                        $('#angi_id').val(qwe.part_id);
                                        $('#angi_tavisanognoo').val(qwe.zas_begindate);
                                    });
                                });
                            });
            });
            </script>
@include('layouts.partials.devterscript')
@endsection