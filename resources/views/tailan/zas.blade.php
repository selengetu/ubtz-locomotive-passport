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
                            Илчит тэрэгний засварын түүх
                        </span>
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
                                                     <form method="post" action="searchilchittuuh">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input class="form-control datepicker" id="zut_start" name="zut_start" type="text">
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
                                                        <input class="form-control datepicker" id="zut_end" name="zut_end" type="text">
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
                                                        <select class="form-control select2" id="zut_seri" name="zut_seri" >
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
                                                        <input type="text" name="zut_num" id="zut_num" class="form-control">
                                                        <label for="form_control_1" style="font-size:12px;">
                                                            Илчит тэрэгний дугаар
                                                        </label>
                                                        <span class="help-block">
                                                                    </span>

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

        <center><h4><b> Илчит тэрэгний засварын түүх</b></h4></center>
              <table class="table table-striped table-bordered table-hover"  id="example">
                  <thead style="background-color: #81b5d5; color: #fff">
                  <tr>

                      <th> # </th>

                      <th>И/т сери </th>
                      <th>И/т №</th>
                      <th>Засварын төрөл</th>
                      <th>Засварын томьёолол</th>
                      <th>Засварт орсон хугацаа</th>
                      <th>Засвараас гарсан хугацаа</th>
                      <th>Гэмтэл</th>
                      <th>Засвар хийсэн депо</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; ?>
                  @foreach($zasunplan as $zasunplans)
                      <tr>
                          <td>{{$no}}</td>

                          <td>{{$zasunplans->seriname}} </td>
                          <td>{{$zasunplans->zutnumber}}</td>

                          <td>{{$zasunplans->zastype_name}}</td>
                          <td>{{$zasunplans->repshname}}</td>
                          <td>{{$zasunplans->repindate}}</td>
                          <td>{{$zasunplans->repoutdate}}</td>
                          <td>{{$zasunplans->gemtel_name}}</td>
                          <td>
                              @if ($zasunplans->depocode == 1)
                                  ТЧ-1
                              @elseif ($zasunplans->depocode == 2)
                                  ТЧ-2
                              @elseif ($zasunplans->depocode == 3)
                                  ТЧ-3
                              @endif
                          </td>


                      </tr>
                      <?php $no++; ?>
                  @endforeach
                  </tbody>
              </table>

</div>
                    <div class="dataTables_wrapper form-inline dt-bootstrap no-footer hidden" id="printarea">
                        <center><h4><b> Илчит тэрэгний засварын түүх</b></h4></center>
                        <table class="table table-striped table-bordered table-hover"  id="example">
                            <thead style="background-color: #81b5d5; color: #fff">
                            <tr>

                                <th> # </th>

                                <th>И/т сери </th>
                                <th>И/т №</th>
                                <th>Засварын төрөл</th>
                                <th>Засварын томьёолол</th>
                                <th>Засварт орсон хугацаа</th>
                                <th>Засвараас гарсан хугацаа</th>
                                <th>Гэмтэл</th>
                                <th>Засвар хийсэн депо</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($zasunplan as $zasunplans)
                                <tr>
                                    <td>{{$no}}</td>

                                    <td>{{$zasunplans->seriname}} </td>
                                    <td>{{$zasunplans->zutnumber}}</td>

                                    <td>
                                    </td>
                                    <td>{{$zasunplans->repname}}</td>
                                    <td>{{$zasunplans->repindate}}</td>
                                    <td>{{$zasunplans->repoutdate}}</td>
                                    <td>{{$zasunplans->gemtel_name}}</td>
                                    <td>
                                        @if ($zasunplans->depocode == 1)
                                            ТЧ-1
                                        @elseif ($zasunplans->depocode == 2)
                                            ТЧ-2
                                        @elseif ($zasunplans->depocode == 3)
                                            ТЧ-3
                                        @endif
                                    </td>


                                </tr>
                                </tr>
                                <?php $no++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                
               
                </div>
                <!-- END CONTENT BODY -->
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
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><p><center><b>    Илчит тэрэгний засварын түүх</b> </center> </p><table border="1">{table}</table><span> ТАЙЛАН ГАРГАСАН: Тууз орчуулагч:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span></body></html>'
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
                  $("#zut_start").datepicker({
                      format: 'yyyy-mm-dd',
                      todayBtn:  1,
                      autoclose: true,
                  }).on('changeDate', function (selected) {
                      var minDate = new Date(selected.date.valueOf());
                      $('#mach_end').datepicker('setStartDate', minDate);
                  });

                  $("#zut_end").datepicker({
                      format: 'yyyy-mm-dd',
                  })
                      .on('changeDate', function (selected) {
                          var minDate = new Date(selected.date.valueOf());
                          $('#mach_start').datepicker('setEndDate', minDate);
                      });
              } );
          </script>
@endsection