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
                            Шугаман эд ангийн хөдөлгөөний дэвтэр
                        </span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a class="joshview1 " id="add" data-toggle="modal" data-target="#myModal1">
                                <label class="btn btn-transparent green btn-circle btn-sm active">
                                    <i class="icon icon-plus">
                                    </i>
                                     Хөдөлгөөн бүртгэх
                                </label>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

                                        <div class="panel">
                                            <div class="panel-heading" style="background-color: #81b5d5; color: #fff">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#sear" style="font-weight: bold;"> <i class="fa fa-search"> Хайлт </i> 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="sear" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="searchmachinist">
                                        <div class="col-md-12">
                                                         <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                <input class="form-control datepicker" id="mach_start" name="mach_start" type="text" value="{{$startdate}}"> 
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
                                                                  <input class="form-control datepicker" id="mach_end" name="mach_end" type="text" value="{{$enddate}}"> 
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
                                            <div class="col-md-3">

                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <select class="form-control select2" id="achaa_seri" name="achaa_seri" >
                                                            <option value="0">Бүгд</option>
                                                            @foreach($locserial as $locserials)
                                                                <option value= "{{$locserials->sericode}}">{{$locserials->seriname}}</option>
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
                                                        <input type="text" name="locnumber" class="form-control">
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
                                                    <select class="form-control select2" id="achaa_seri" name="achaa_seri" >
                                                        <option value="0">Бүгд</option>
                                                        <option>Хос дугуй</option>
                                                        <option>Татах цахилгаан хөдөлгүүр</option>
                                                        <option>Якорь</option>
                                                        <option>Агаар хөргөгч</option>
                                                    </select>
                                                    <label for="form_control_1" style="font-size:12px;">
                                                        Эд анги
                                                    </label>
                                                    <span class="help-block">
                                                                    </span>

                                                </div>
                                            </div>
                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group form-md-line-input has-success">
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <button class="btn btn-info" style="background-color: #2EB9A8; border-color: #2EB9A8"><i class="fa fa-search"></i> Хайх</button>
                                     </div>
                                    </div>        
                                       
                                        </div>
                                        
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                <div class="table-container">
                                    <p><center><b> {{$startdate}} -аас {{$enddate}} -ны шугаман эд ангийн хөдөлгөөний дэвтэр</b></center> </p>
                                    <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                        <table class="table table-striped table-bordered table-hover"  id="example">
                                            <thead style="background-color: #81b5d5; color: #fff">
                                            <tr>

                                                <th> # </th>
                                                <th>Огноо</th>
                                                <th>Татах хэсэг</th>
                                                <th>И/т сери </th>
                                                <th>И/т №</th>
                                                <th>Хэддүгээр</th>
                                                <th>Засварын төрөл</th>
                                                <th>Авсан №</th>
                                                <th>Тавьсан №</th>
                                                <th>Шалтгаан</th>
                                                <th>Тайлбар</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>





                                            </tbody>
                                        </table>
                                    </div>
                                </div>


           
                
               
                </div>
                <!-- END CONTENT BODY -->
            </div>
          <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Хөдөлгөөн бүртгэх</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="col-md-12" style="border-top: none thick green;">
                              <div class="col-md-3">
                                  <div class="form-group form-md-line-input has-success">
                                      <div class="input-icon">
                                          <select class="form-control select2" id="achaa_seri" name="achaa_seri" >
                                              <option value="0">Бүгд</option>
                                              <option>Хос дугуй</option>
                                              <option>Татах цахилгаан хөдөлгүүр</option>
                                              <option>Якорь</option>
                                              <option>Агаар хөргөгч</option>
                                          </select>
                                          <label for="form_control_1" style="font-size:12px;">
                                              Эд анги
                                          </label>
                                          <span class="help-block">
                                                                    </span>

                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="col-md-12">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Огноо</label>
                                      <input type="text" class="form-control inputtext" id="ilchit" name="ilchit">
                                  </div>

                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Илчит тэрэгний сери</label>
                                      <select class="form-control select2" id="achaa_seri" name="achaa_seri" >
                                          <option value="0">Бүгд</option>
                                          @foreach($locserial as $locserials)
                                              <option value= "{{$locserials->sericode}}">{{$locserials->seriname}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Илчит тэрэгний №</label>
                                      <input type="text" class="form-control inputtext" id="tuuzmarsh" name="tuuzmarsh" >
                                  </div>

                              </div>
                              <div class="col-md-3">

                                  <div class="form-group">
                                      <label for="name">Секц</label>
                                      <select class="form-control select2" id="achaa_seri" name="achaa_seri" >
                                          <option value="1">A</option>
                                          <option value="2">Б</option>
                                      </select>
                                  </div>

                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Хэддүгээр</label>
                                      <select class="form-control select2" id="achaa_seri" name="achaa_seri" >
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="1">3</option>
                                          <option value="2">4</option>
                                          <option value="1">5</option>
                                          <option value="2">6</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Засварын төрөл</label>
                                      <select class="form-control select2" id="achaa_seri" name="achaa_seri" >
                                          <option value="1">ТО-1</option>
                                          <option value="2">ТО-2</option>
                                          <option value="1">ТО-3</option>

                                      </select>
                                  </div>

                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Сольсон шалтгаан</label>
                                      <input type="text" class="form-control inputtext" id="tuuzmarsh" name="tuuzmarsh" >
                                  </div>

                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Авсан огноо</label>
                                      <input type="text" class="form-control inputtext" id="ilchit" name="ilchit"  value="2ТЭ116.30.50.011">
                                  </div>

                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Авсан эд ангийн марк</label>
                                      <input type="text" class="form-control inputtext" id="ilchit" name="ilchit"  value="2ТЭ116.30.50.011">
                                  </div>

                              </div>

                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Авсан эд ангийн дугаар</label>
                                      <input type="text" class="form-control inputtext" id="ilchit" name="ilchit">
                                  </div>

                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Илчит тэрэгнээс авсан хүний нэр</label>
                                      <input type="text" class="form-control inputtext" id="ilchit" name="ilchit">
                                  </div>

                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Тавьсан огноо</label>
                                      <input type="text" class="form-control inputtext" id="ilchit" name="ilchit"  value="2ТЭ116.30.50.011">
                                  </div>

                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Тавьсан эд ангийн марк</label>
                                      <input type="text" class="form-control inputtext" id="ilchit" name="ilchit"  value="2ТЭ116.30.50.011">
                                  </div>

                              </div>

                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Тавьсан эд ангийн дугаар</label>
                                      <input type="text" class="form-control inputtext" id="ilchit" name="ilchit">
                                  </div>

                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Илчит тэргэнд тавьсан хүний нэр</label>
                                      <input type="text" class="form-control inputtext" id="ilchit" name="ilchit">
                                  </div>

                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="name">Тайлбар</label>
                                      <textarea class="form-control" rows="3" id="hoorond_reason" name="hoorond_reason" maxlength="255"></textarea>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
                          <button type="button" class="btn btn-primary">Хадгалах</button>
                      </div>
                  </div>
              </div>
          </div>


@endsection
            @section('cscript')

            <script type="text/javascript">
  $(document).ready(function() {
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
          $("#mach_start").datepicker({
        format: 'yyyy-mm-dd',
        todayBtn:  1,
        autoclose: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#mach_end').datepicker('setStartDate', minDate);
    });
    
    $("#mach_end").datepicker({
        format: 'yyyy-mm-dd',
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#mach_start').datepicker('setEndDate', minDate);
        });
} );
</script>
@endsection