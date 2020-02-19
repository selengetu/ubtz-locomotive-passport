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
                            Тууз бүртгэл
                        </span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a class="joshview1 add" id="add" data-toggle="modal" data-target="#myModal1">
                                <label class="btn btn-transparent green btn-circle btn-sm active">
                                    <i class="icon icon-plus">
                                    </i>
                                     Тууз оруулах
                                </label>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                 <div class="panel-group accordion" id="accordion">
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#sear" style="font-weight: bold;"> <i class="fa fa-search"> Хайлт </i> 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="sear" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="comptailansearch">
                                        <div class="col-md-12">
                                                         <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                <input class="form-control datepicker" id="comp_start" name="comp_start" type="text" > 
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
                                                                  <input class="form-control datepicker" id="comp_end" name="comp_end" type="text"> 
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
                                                                
                                                                       <select class="select2 form-control" id="comptailan_dep" name="comptailan_dep" style="width: 100%">
                                                                          <option value= "0"> Бүгд</option>
              
                                                                        </select>
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Машинч
                                                                    </label>
                                                                   
                                                            </div>
                                                        </div>
                                                              <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                <select class="select2 form-control" id="comptailan_dep" name="comptailan_dep" style="width: 100%">
                                                                          <option value= "0"> Бүгд</option>
              
                                                                        </select>
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Туслах машинч
                                                                    </label>
                                                                    <span class="help-block">
                                                                    </span>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                               <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                <input class="form-control" id="comp_dr_tag" name="comp_dr_tag" type="text"/>
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Маршрутын дугаар
                                                                    </label>
                                                                    <span class="help-block">
                                                                    </span>
                                                                    <i class="fa fa-pencil">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                     
                                                              <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                    <select class="form-control select2" id="comp_devicefilter" name="comp_devicefilter">
                                                                     <option value="0">Бүгд</option>
                                                                       
                                                                     </select>
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Хаанаас
                                                                    </label>
                                                                    <span class="help-block">
                                                                    </span>
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                               
                                                              <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                
                                                                       <select class="select2 form-control" id="comp_service_dsp" name="comp_service_dsp" style="width: 100%">
                                                                          <option value= "0"> Бүгд</option>
                   
             </select>
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Хаашаа
                                                                    </label>
                                                                   
                                                            </div>
                                                        </div>
                                                         <div class="col-md-2">
                                                            <div class="form-group form-md-line-input has-success">
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                       <button class="btn btn-success"><i class="fa fa-search"></i> Хайх</button>
                                     </div>
                                    </div>
                                        </div>
                                        
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                   <div class="table-container">
          <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
      <table class="table table-striped table-bordered table-hover"  id="example">
                                              <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Огноо </th>
                                                        <th> Машинч </th>
                                                        <th> Т/машинист </th>
                                                        <th> Г/т № </th>
                                                        <th> И/т №  </th>
                                                        <th> Жин </th>
                                                        <th> Гол </th>
                                                        <th> Х/х №</th>
                                                         <th> Чиглэл</th>
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
                                <td> </td>
                   <td> </td>
                     

                          </tr>
                        
            
          </tbody>
                                            </table>
  </div>
</div>
           
                
               
                </div>
                <!-- END CONTENT BODY -->
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
} );
</script>
@endsection