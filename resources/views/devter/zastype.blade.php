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
                            Засварын ангилал бүртгэл
                        </span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a class="joshview1 " id="add" data-toggle="modal" data-target="#myModal1">
                                <label class="btn btn-transparent green btn-circle btn-sm active">
                                    <i class="icon icon-plus">
                                    </i>
                                    Ангилал бүртгэх
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
                                                     <form method="post" action="searchzastype" id="formzastype">
                                        <div class="col-md-12">
                                            <div class="col-md-3">

                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <select class="form-control select2" id="achaa_seri" name="achaa_seri"  value="{{$seri}}" >
                                                            <option value="0">Бүгд</option>
                                                            @foreach($locserial as $locserials)
                                                                <option value= "{{$locserials->sericode}}">{{$locserials->sericode}} - {{$locserials->seriname}}</option>
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
          <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="printarea">
              @if(Session::has('message'))
                  <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
              @endif
              <table class="table table-striped table-bordered table-hover"  id="example">
                  <thead style="background-color: #81b5d5; color: #fff">
                  <tr>

                      <th> # </th>
                      <th>Сери</th>
                      <th>Ангиллын код</th>
                      <th>Урсгал засварын нэр </th>
                      <th>Төрлийн томьёолол</th>
                      <th>Хариуцан гүйцэтгэгч</th>
                      <th>Гүйлтийн норм</th>
                      <th>Зогсоох нормт өдөр</th>
                      <th>Зогсоох нормт цаг</th>
                      <th>Зогсоох нормт минут</th>
                      <th>Давуу эрх</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; ?>
                  @foreach($zastype as $zastypes)
                  <tr>
                      <td>{{$no}}</td>
                      <td>{{$zastypes->seriname}}</td>
                      <td>{{$zastypes->repid}}</td>
                      <td>{{$zastypes->repname}}</td>
                      <td>{{$zastypes->repshname}}</td>
                      <td>{{$zastypes->respondent}}</td>
                      <td>{{$zastypes->reprate}}</td>
                      <td>{{$zastypes->stopday}}</td>
                      <td>{{$zastypes->stoptsag}}</td>
                      <td>{{$zastypes->stopmin}}</td>
                      <td>{{$zastypes->priority}}</td>

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
                      <form method="post" action="addzastype">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Засварын ангилал бүртгэх</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">

                          <div class="col-md-12">

                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Илчит тэрэгний сери</label>
                                      <select class="form-control select2" id="seri_code" name="seri_code">
                                          <option value="0">Бүгд</option>
                                          @foreach($locserial as $locserials)
                                              <option value= "{{$locserials->sericode}}"> {{$locserials->sericode}} - {{$locserials->seriname}}</option>
                                          @endforeach
                                      </select>
                                    
                                     
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Урсгал засварын төрөл</label>
                                      <select class="form-control" id="reptype" name="reptype" onchange="myfunc(this.value)">
                                        <option value="1">Гүйлтээр</option>
                                          <option value="2">Хугацааагаар</option>
                                      </select>
                                  </div>

                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Урсгал засварын нэр</label>
                                      <select class="form-control select2" id="repid" name="repid" >
                                          @foreach($rep as $reps)
                                              <option value= "{{$reps->repid}}"> {{$reps->repshname}} - {{$reps->repname}}</option>
                                          @endforeach
                                      </select>
                                  </div>

                              </div>
                                <div class="col-md-3 hidden">
                                  <div class="form-group">
                                      <label for="name">.</label>
                                      <input type="text" class="form-control inputtext" id="repshname" name="repshname">
                                  </div>

                              </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">.</label>
                                      <input type="text" class="form-control inputtext" id="repname" name="repname" readonly="true">
                                  </div>

                              </div>

                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Хариуцан гүйцэтгэгч</label>
                                      <select class="form-control select2" id="baig" name="baig" >
                                          @foreach($baig as $baigs)
                                              <option value= "{{$baigs->respondent}}"> {{$baigs->respondent}}</option>
                                          @endforeach
                                      </select>
                                  </div>

                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Гүйлтийн норм</label>
                                      <input type="text" class="form-control inputtext" id="reprate" name="reprate">
                                  </div>

                              </div>
                          </div>
                          <div class="col-md-12">

                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Зогсоох нормт өдөр</label>
                                      <input type="text" class="form-control inputtext" id="stopday" name="stopday">
                                  </div>

                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Зогсоох нормт цаг</label>
                                      <input type="text" class="form-control inputtext" id="stoptsag" name="stoptsag">
                                  </div>

                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Зогсоох нормт минут</label>
                                      <input type="text" class="form-control inputtext" id="stopmin" name="stopmin">
                                  </div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name">Давуу эрх</label>
                                      <input type="text" class="form-control inputtext" id="priority" name="priority">
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
                  setTimeout(function(){
                      $(".alert-danger").remove();
                  }, 2000 );
                  $('.add').on('click',function(){
                      var title = document.getElementById("modal-title");
                      title.innerHTML = "Засварын ангилал нэмэх";
                      document.getElementById('formzastype').action = "addzastype"
                      $('#seri_code').val("");
                      $('#repid').val("");
                      $('#respondent').val("");
                      $('#reprate').val("");
                      $('#stopday').val("");
                      $('#stoptsag').val("");
                      $('#stopmin').val("");
                      $('#priority').val("");
                  });
              } );
              $('.update').on('click',function(){
                  var title = document.getElementById("modal-title");
                  title.innerHTML = "Засварын ангилал засварлах";
                  document.getElementById('formzastype').action = "updatezastype";
                  var itag=$(this).attr('tag');

                  $.get('stationfill/'+itag,function(data){
                      $.each(data,function(i,qwe){

                          $('#seri_code').val(qwe.seri_code);
                          $('#repid').val(qwe.repid);
                          $('#respondent').val(qwe.respondent);
                          $('#reprate').val(qwe.reprate);
                          $('#stopday').val(qwe.stopday);
                          $('#stoptsag').val(qwe.stoptsag);
                          $('#stopmin').val(qwe.stopmin);
                          $('#priority').val(qwe.priority);

                      });

                  });

              } );
              $('#repid').on('change', function() {
                  var type=$("#reptype").val();
                  var itag=this.value;
                  $.get('repfill/'+itag+'/'+type, function(data){
                      $.each(data,function(i,qwe){

                          $('#repname').val(qwe.repname);
                          $('#repshname').val(qwe.repshname);
                      });

                  });
              });
          </script>
           <script type="text/javascript">
                                function myfunc(sel)
 {

  $.get('getrep/' + sel,function(data){
                 $('#repid').empty();
                  
                $.each(data,function(i,qwe){
                 
                  $('#repid').val(qwe.repid).trigger('change');

                    $('#repid').append($('<option>', {
                        value: qwe.repid,
                        id: qwe.repid,
                        text: qwe.repshname + ' - ' + qwe.repname
                    }));

                    $('#repid').focus();

                });
            });
 }
          </script>
@endsection