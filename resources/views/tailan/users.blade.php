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
                            Хэрэглэгчдийн бүртгэл
                        </span>
                    </div>
            
                </div>
            </div>
                   <div class="table-container">
          <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
      <table class="table table-striped table-bordered table-hover"  id="example">
                                                 <thead style="background-color: #81b5d5; color: #fff">
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Нэр </th>
                                                        <th> Депо </th>
                                                        <th> И-мейл </th>
                                                        <th> Албан тушаал </th>
                                                        <th></th>
                                                      </tr>
                                                </thead>
                                                  <tbody>
                         <?php $no = 1; ?>
                              @foreach($user as $users)
                           
                                                    <tr>
                                         
                                <td>{{$no}}</td>
                                <td>{{$users->name}}</td>
                                <td>{{$users->depo_id}}</td>
                                <td>{{$users->email}}</td>
                                   <td>{{$users->grand_type}}</td>
                               
                                <td > <a class="btn btn-xs btn-info update"  data-toggle="modal" data-target="#myModal2" data-id="{{$users->id}}" tag="{{$users->id}}"><span class="glyphicon glyphicon-pencil " ></span></a><a class="btn btn-xs btn-danger"  href="" onclick="return confirm('Энэ хэрэглэгчийг устгах уу?')" ><span class="glyphicon glyphicon-trash"></a> </td>
                                 
                                 
                                    
                          </tr>
                             <?php $no++; ?>
                         @endforeach    
                        
            
          </tbody>
                                            </table>
  </div>
</div>
      <div class="modal fade" id="myModal2" role="dialog">

    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
      <form method="post" action="" id="form1" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title"></h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                  <div class="col-md-12">
                   <div class="col-md-4">
                        <div class="form-group">
                <label for="exampleInputPassword1">Нэр</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input type="text" class="form-control inputtext" id="name" name="name" required="true">
                <input type="text" class="form-control hidden" id="id" name="id">
              </div>
                   </div>
           <div class="col-md-4">
                        <div class="form-group">
                <label for="exampleInputPassword1">Нэр</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input type="text" class="form-control inputtext" id="name" name="name" required="true">
                <input type="text" class="form-control hidden" id="id" name="id">
              </div>
                   </div>
           <div class="col-md-4">
                        <div class="form-group">
                <label for="exampleInputPassword1">Нэр</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input type="text" class="form-control inputtext" id="name" name="name" required="true">
                <input type="text" class="form-control hidden" id="id" name="id">
              </div>
                   </div>
      
                  </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default">Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
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