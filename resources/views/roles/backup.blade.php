@extends('adminlte::page')
@section('content')
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
{{-- <section class="py-3 align-items-center d-flex rounded-0 mb-2" style="background:#1d3b53;">
    <!-- Main banner background image -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <!-- Title -->
                <h1 class="text-white">Laravel Ajax CRUD Tutorial Example</h1>
                <p class="text-white mb-0">LaravelTuts.com</p>	
            </div>
        </div>
    </div>
</section>
<section> --}}
    <div class="container">
        <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-start mb-4 ">
            <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> Create New Product</a>
        </ul>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    {{-- <th>No</th> --}}
                    <th>no</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
<section>
 
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                    <input type="hidden" name="product_id" id="product_id">
                     <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                         </div>
                     </div>   
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            <div class="col-sm-12">
                                <textarea id="permission" name="permission" required="" placeholder="Enter Details" class="form-control"></textarea>
                            </div>
                        </div>      
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                            </button>
                        </div>
                 </form>
        </div>
    </div>
</div>
</body>
{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" data-toggle="modal" data-target="#create"> Create New Role</a>
            <div id="create" class="modal fade primary" role="dialog">
                <div class="modal-dialog modal-xl">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title">Modal dtks</h4>    
                        </div>
                        <div class="modal-body">
                          
                        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                          <form role="form">
                            <!-- input states -->
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                            <!-- Card Dark -->
                            <div class="modal-body ">
                                <div class="row p-3 d-flex justify-content-center">
                                    <div class="card card-primary card-outline col-xl-3 col-md-4 col-sm-4 p-3" style="margin-right: 20px;">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle"
                                                src="{{asset('images/pp.png')}}"
                                                alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center">akses menu roles</h3>
                                    
                                            <ul class="list-group list-group-unbordered mb-3">
                                                @foreach($akses_role as $value)
                                                    <li class="list-group-item">
                                                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                    </label> <b> {{ $value->name }}</b> <a class="float-right"></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card card-primary card-outline col-xl-3 col-md-3 col-sm-3 p-3" style="margin-right: 20px;">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle"
                                                src="{{asset('images/pp.png')}}"
                                                alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center">Akses Menu DTKS</h3>
                                    
                                            <ul class="list-group list-group-unbordered mb-3">
                                                @foreach($akses_dtks as $value)
                                                    <li class="list-group-item">
                                                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                    </label> <b> {{ $value->name }}</b> <a class="float-right"></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card card-primary card-outline col-xl-3 col-md-4 col-sm-4 p-3" style="margin-right: 20px;">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle"
                                                src="{{asset('images/pp.png')}}"
                                                alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center">Akses Menu User</h3>
                                    
                                            <ul class="list-group list-group-unbordered mb-3">
                                                @foreach($akses_user as $value)
                                                    <li class="list-group-item">
                                                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                    </label> <b> {{ $value->name }}</b> <a class="float-right"></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card card-primary card-outline col-xl-3 col-md-4 col-sm-4 p-3" style="margin-right: 20px;">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle"
                                                src="{{asset('images/pp.png')}}"
                                                alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center">Akses Menu User</h3>
                                    
                                            <ul class="list-group list-group-unbordered mb-3">
                                                @foreach($akses_command as $value)
                                                    <li class="list-group-item">
                                                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                    </label> <b> {{ $value->name }}</b> <a class="float-right"></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                    
                                        </div>
                                    </div>
                                </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                        {!! Form::close() !!}
                        </div>
                      </div>
                  </div>
                </div>
              </div>
                  
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        <p>{{ $message }}</p>
    </div>
@endif


        <table  id="example" class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                        @endcan
                        @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                <!-- Button trigger modal -->

                    
                    <!-- Modal -->
                    <div class="modal fade" id="editrole{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            ...
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table> --}}


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });
        </script>
        <script type="text/javascript">
            $(function () {
                
                
              /*------------------------------------------
               --------------------------------------------
               Pass Header Token
               --------------------------------------------
               --------------------------------------------*/ 
              $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
              });
                
              /*------------------------------------------
              --------------------------------------------
              Render DataTable
              --------------------------------------------
              --------------------------------------------*/
              var table = $('.data-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: "{{ route('roles.index') }}",
                  columns: [
                    //   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                      {data: 'id', name: 'id'},
                      {data: 'name', name: 'name'},
                    //   {data: 'permissions', name: 'permissions'},
                      {data: 'action', name: 'action', orderable: false, searchable: false},
                  ]
              });
                
              /*------------------------------------------
              --------------------------------------------
              Click to Button
              --------------------------------------------
              --------------------------------------------*/
              $('#createNewProduct').click(function () {
                  $('#saveBtn').val("create-product");
                  $('#product_id').val('');
                  $('#productForm').trigger("reset");
                  $('#modelHeading').html("Create New Product");
                  $('#ajaxModel').modal('show');
              });
                
              /*------------------------------------------
              --------------------------------------------
              Click to Edit Button masih belum jalan 
              --------------------------------------------
              --------------------------------------------*/
              $('body').on('click', '.editProduct', function () {
                var product_id = $(this).data('id');
                $.get("{{ route('roles.index') }}" +'/' + product_id +'/edit', function (data) {
                    console.log(data.rolePermissions[0]);
                    // $('#modelHeading').html("Edit Product");
                    // $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    // $('#product_id').val(data.role.id);
                    $('#name').val(data.role.name);
                    $('#permission').val(data.rolePermissions[0]);
                })
              });
              
                
              /*------------------------------------------
              --------------------------------------------
              Create Product Code
              --------------------------------------------
              --------------------------------------------*/
              $('#saveBtn').click(function (e) {
                  e.preventDefault();
                  $(this).html('Sending..');
                
                  $.ajax({
                    data: $('#productForm').serialize(),
                    url: "{{ route('roles.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                 
                        $('#productForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                     
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
              });
                
              /*------------------------------------------
              --------------------------------------------
              Delete Product Code
              --------------------------------------------
              --------------------------------------------*/
              $('body').on('click', '.deleteProduct', function () {
               
                  var product_id = $(this).data("id");
                  confirm("Are You sure want to delete !");
                  
                  $.ajax({
                      type: "DELETE",
                      url: "{{ route('roles.store') }}"+'/'+product_id,
                      success: function (data) {
                          table.draw();
                      },
                      error: function (data) {
                          console.log('Error:', data);
                      }
                  });
              });
                 
            });
          </script>
@endsection