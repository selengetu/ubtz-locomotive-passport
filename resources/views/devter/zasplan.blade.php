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
                            Төлөвлөгөөт засвар
                        </span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a class="joshview1 " id="add" data-toggle="modal" data-target="#myModal1">
                                <label class="btn btn-transparent green btn-circle btn-sm active">
                                    <i class="icon icon-plus">
                                    </i>
                                    Төлөвлөгөөт засвар бүртгэх
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
                                                     <form method="post" action="tuuzorchuulsan">
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
                   <div class="row">
          <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="printarea">
              <p><center><b> {{$startdate}} -аас {{$enddate}} -ны төлөвлөгөөт засвар</b></center> </p>
              <table class="table table-striped table-bordered table-hover"  id="example">
                  <thead style="background-color: #81b5d5; color: #fff">
                  <tr>

                      <th> # </th>
                      <th>Засварын дугаар</th>
                      <th>И/т сери </th>
                      <th>И/т №</th>
                      <th>Засварын код</th>
                      <th>Засварын томьёолол</th>
                      <th>Засварт орсон хугацаа</th>
                      <th>Засвараас гарсан хугацаа</th>
                      <th>Нийт зогсолт</th>
                      <th>ТО-4 зогсолт</th>
                      <th>Нэмэлт зогсолт</th>
                      <th>Засварын зогсолт</th>
                      <th>Гүйлт</th>
                      <th>Хүлээн авагч</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php $no = 1; ?>
                  @foreach($zasplan as $zasplans)
                      <tr>
                          <td>{{$no}}</td>
                          <td>{{$zasplans->repairid}}</td>
                          <td>{{$zasplans->seriname}}</td>
                          <td>{{$zasplans->zutnumber}}</td>
                          <td>{{$zasplans->repid}}</td>
                          <td>{{$zasplans->repshname}}</td>
                          <td>{{$zasplans->repindate}}</td>
                          <td>{{$zasplans->repoutdate}}</td>
                          <td>{{$zasplans->stopsum}}</td>
                          <td>{{$zasplans->stopto4}}</td>
                          <td>{{$zasplans->stopadd}}</td>
                          <td>{{$zasplans->stopclean}}</td>
                          <td>{{$zasplans->runkm}}</td>
                          <td>{{$zasplans->recievman}}</td>
                      </tr>
                      <?php $no++; ?>
                  @endforeach
                  </tbody>
              </table>
              <table class="table table-striped table-bordered table-hover" style="width: 50%">
                  <thead style="background-color: #81b5d5; color: #fff">
                  <tr>

                      <th> # </th>
                      <th>Төрөл</th>
                      <th>Ажлын код </th>
                      <th>Нэмэлт ажлын нэр</th>
                      <th>Ажлын цаг</th>
                      <th>Удаа</th>
                      <th>Нийт цаг</th>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
              <table class="table table-striped table-bordered table-hover" style="width: 50%">
                  <thead style="background-color: #81b5d5; color: #fff">
                  <tr>

                      <th> # </th>
                      <th>Код</th>
                      <th>Байгууллагын нэр </th>
                      <th>Тооцох цаг</th>

                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
  </div>

</div>

                
               
                </div>
                <!-- END CONTENT BODY -->
            </div>
          <div class="modal fade" id="myModal1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Төлөвлөгөөт засвар бүртгэх</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#home">Үндсэн</a></li>
                              <li><a data-toggle="tab" href="#menu1">Нэмэлт ажил</a></li>
                              <li><a data-toggle="tab" href="#menu2">Байгууллага</a></li>
                              <li><a data-toggle="tab" href="#menu3">Материал</a></li>
                          </ul>


                          <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                  <form method="post" action="addzastype">
                                      <div class="col-md-12">

                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Зүтгүүрийн сери</label>
                                                  <select class="form-control select2" id="seri_code" name="seri_code" >
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
                                                  <input type="text" class="form-control inputtext" id="zutnumber" name="zutnumber">
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Урсгал засварын томьёолол</label>
                                                  <select class="form-control select2" id="repid" name="repid" >
                                                      @foreach($rep as $reps)
                                                          <option value= "{{$reps->repid}}" tag="{{$reps->repshname}}"> {{$reps->repshname}} - {{$reps->repname}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>

                                          </div>

                                          <div class="col-md-3">

                                              <div class="form-group">
                                                  <label for="name">Засварт орсон огноо</label>
                                                  <input type="text" class="form-control inputtext" id="respondent" name="respondent" >
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Засварт гарсан огноо</label>
                                                  <input type="text" class="form-control inputtext" id="reprate" name="reprate">
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Нийт цаг</label>
                                                  <input type="number" class="form-control inputtext" id="stopday" name="stopday" readonly="true">
                                              </div>

                                          </div>

                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Засварын зогсолт</label>
                                                  <input type="number" class="form-control inputtext" id="priority" name="priority" readonly="true">
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Гүйлт</label>
                                                  <input type="number" class="form-control inputtext" id="priority" name="priority">
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">ТО-4</label>
                                                  <input type="number" class="form-control inputtext" id="priority" name="priority">
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Нэмэлт зогсолт</label>
                                                  <input type="number" class="form-control inputtext" id="priority" name="priority">
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Хүлээн авагч</label>
                                                  <input type="text" class="form-control inputtext" id="priority" name="priority">
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">.</label><br>
                                                  <button class="btn btn-success">Хадгалах</button>
                                              </div>
                                          </div>
                                      </div>
                                  </form>

                              </div>
                              <div id="menu1" class="tab-pane fade">
                                 <div class="col-md-12">
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="name">Төрөл</label>
                                             <input type="text" class="form-control inputtext" id="priority" name="priority">
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="name">Ажлын код</label>
                                             <input type="text" class="form-control inputtext" id="priority" name="priority">
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="name">Нэмэлт ажлын нэр</label>
                                             <input type="text" class="form-control inputtext" id="priority" name="priority">
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="name">Ажлын цаг</label>
                                             <input type="text" class="form-control inputtext" id="priority" name="priority">
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="name">Нийт цаг</label>
                                             <input type="text" class="form-control inputtext" id="priority" name="priority">
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="name">.</label><br>
                                             <button class="btn btn-success">Хадгалах</button>
                                         </div>
                                     </div>
                                 </div>
                                   <table class="table table-bordered table-hover">
                  <thead>
                  <tr>

                      <th> # </th>
                      <th>Төрөл</th>
                      <th>Ажлын код </th>
                      <th>Нэмэлт ажлын нэр</th>
                      <th>Ажлын цаг</th>
                      <th>Удаа</th>
                      <th>Нийт цаг</th>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
                              </div>
                              <div id="menu2" class="tab-pane fade">
                                  <div class="col-md-12">
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Код</label>
                                              <input type="text" class="form-control inputtext" id="priority" name="priority">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Байгууллагын нэр</label>
                                              <input type="text" class="form-control inputtext" id="priority" name="priority">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Тооцох газар</label>
                                              <input type="text" class="form-control inputtext" id="priority" name="priority">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">.</label><br>
                                              <button class="btn btn-success">Хадгалах</button>
                                          </div>
                                      </div>
  <table class="table table-bordered table-hover">
                  <thead>
                  <tr>

                      <th> # </th>
                      <th>Код</th>
                      <th>Байгууллагын нэр </th>
                      <th>Тооцох цаг</th>

                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>                                  </div>
                              </div>
                              <div id="menu3" class="tab-pane fade">
                                  <div class="col-md-12">
                                      <div class="col-md-3">
                                
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                    <select class="form-control select2" id="achaa_seri" name="achaa_seri" >
                                                                     <option value="0">Бүгд</option>
                                                                          @foreach($part as $parts) 
                                                                               <option value= "{{$parts->part_id}}">{{$parts->part_name}}</option>
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
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Эд ангийн сери</label>
                                              <input type="text" class="form-control inputtext" id="priority" name="priority">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Эд ангийн дугаар</label>
                                              <input type="text" class="form-control inputtext" id="priority" name="priority">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">.</label><br>
                                              <button class="btn btn-success">Хадгалах</button>
                                          </div>
                                      </div>
                                  </div>
                                  <table class="table table-bordered table-hover">
                  <thead>
                  <tr>

                      <th> # </th>
                      <th>Эд ангийн төрөл</th>
                      <th>Эд ангийн сери </th>
                      <th>Эд ангийн дугаар</th>

                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>   
                              </div>
                          </div>

                      </div>
                      <div class="modal-footer">

                      </div>
                  </div>
              </div>
          </div>
            @endsection
            @section('cscript')
          <script type="text/javascript">
            $("#datepicker").datepicker( {
    format: "mm-yyyy",
    viewMode: "months", 
    minViewMode: "months"
});
 function printDiv() {

     var printContents = document.getElementById('printarea').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

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