@extends('adminlte::page')
@section('content')
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
        @can('Role-Create')
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
                                            <h3 class="profile-username text-center">Akses Menu Data BLT BBM</h3>
                                    
                                            <ul class="list-group list-group-unbordered mb-3">
                                                @foreach($Blt_Bbm as $value)
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
                                            <h3 class="profile-username text-center">Akses Menu Data PBI Daerah</h3>
                                    
                                            <ul class="list-group list-group-unbordered mb-3">
                                                @foreach($Pkh as $value)
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
                                            <h3 class="profile-username text-center">Akses Menu Data UMKM</h3>
                                    
                                            <ul class="list-group list-group-unbordered mb-3">
                                                @foreach($Data_Umkm as $value)
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
                                            <h3 class="profile-username text-center">Akses Menu Data PKH</h3>
                                    
                                            <ul class="list-group list-group-unbordered mb-3">
                                                @foreach($Pbi_Daerah as $value)
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
                                            <h3 class="profile-username text-center">Akses Menu Command Center</h3>
                                    
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
                                    <div class="card card-primary card-outline col-xl-3 col-md-4 col-sm-4 p-3" style="margin-right: 20px;">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle"
                                                src="{{asset('images/pp.png')}}"
                                                alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center">Akses Menu Kelurahan</h3>
                                    
                                            <ul class="list-group list-group-unbordered mb-3">
                                                @foreach($role_pengaduan as $value)
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
                <a class="close" data-dismiss="alert">×</a>
                <p>{{ $message }}</p>
                <img src="close.soon" style="display:none;" onerror="(function(el){ setTimeout(function(){ el.parentNode.parentNode.removeChild(el.parentNode); },2000 ); })(this);" />
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
                        @can('Role-Edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                        @endcan
                        @can('Role-Delete')
                            {{-- {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!} --}}

                            <button class="btn btn-danger" data-toggle="modal" data-target="#Delete{{$role->id}}">Delete</button>
                        @endcan
                    </td>
                </tr>
                <!-- Button trigger modal -->

                    
                    <!-- Modal -->
                    <div class="modal fade" id="Delete{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h4 class="modal-title">Show Data Dtks</h4>    
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">apakah ada yakin untuk menghapus Data DTKS ini?</p>
                                    <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                        <div class="modal-footer center">
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                @csrf
                                                @method('DELETE')
                                                @can('dtks-delete')
                                                     <button type="submit" class="btn btn-danger">Delete</button>
                                                @endcan
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });
        </script>
@endsection