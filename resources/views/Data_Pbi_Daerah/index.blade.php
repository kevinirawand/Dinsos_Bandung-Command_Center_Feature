@extends('adminlte::page')
@section('content')

<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.1.0/css/searchPanes.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.5.0/css/select.bootstrap.min.css">
    <div class="row">
        <div class="col-lg-12 margin-tb p-4">
            <div class="pull-left">
                <h2> Data PBI Daerah</h2>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">
                        @can('PBI-Daerah-Create')
                        <a class="btn btn-success" data-toggle="modal" data-target="#CreateNewDtks">Create New Data PBI Daerah</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Import Data PBI Daerah</button>
                        {{-- <a class="btn btn-warning float-end" href="{{ route('data-export-Pkh') }}">Export Data PBI Daerah </a> --}}
                        <a id="btn-place"></a>
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Import Data UMKM</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="post" action="{{ route('data-import-PBI') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">File input</label>
                                                    <input type="file" name="file" id="file" required>
                                                    <p class="help-block">Example block-level help text here.</p>
                                                </div>
                                                
                                            </div>
                                            <!-- /.box-body -->
                                        
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success btn-md">Import</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="CreateNewDtks">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create New Data PBI Daerah</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="quickForm" action="{{ route('Data-Pbi-Daerah.store') }}" method="POST">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>PS Noka :</strong>
                                                            <input class="form-control" name="Ps_Noka" placeholder="Masukan PS Noka">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Noka :</strong>
                                                            <input class="form-control" name="Noka" placeholder="Masukan Noka">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" name="Nama" class="form-control" placeholder="Masukan Nama">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nik</label>
                                                            <input class="form-control" name="Nik" placeholder="Masukan Nik">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Pisat</label>
                                                            <input class="form-control" name="Pisat" placeholder="Masukan Pisat">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Tgl_lahir</label>
                                                            <input class="form-control" type="Date" name="Tgl_lahir" placeholder="masukan Tanggal lahir">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Jenkel</label>
                                                            <input class="form-control" name="Jenkel" placeholder="masukan Jenkel">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Kd_Status_Pst</label>
                                                            <input class="form-control" name="Kd_Status_Pst" placeholder="Masukan Kd Status Pst">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Premi</label>
                                                            <input class="form-control" name="Premi" placeholder="Masukan Premi">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kelas</label>
                                                                <input  class="form-control" name="Kelas" placeholder="Masukan Kelas">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Tmt :</strong>
                                                            <input class="form-control"type="date" name="Tmt" placeholder="Masukan Tmt">
                                                        </div>
                                                    </div> 
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>No_Pkk</label>
                                                            <input class="form-control" name="No_Pkk" placeholder="masukan No Pkk">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <strong>Alamat:</strong>
                                                            <input  class="form-control" name="Alamat" placeholder="Masukan Alamat">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <strong>Rt :</strong>
                                                            <input class="form-control" name="Rt" placeholder="Masukan Rt">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Rw :</strong>
                                                            <input class="form-control" name="Rw" placeholder="Masukan Rw">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Kd_Desa :</strong>
                                                            <input class="form-control" name="Kd_Desa" placeholder="Masukan Kode Desa">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Nmdesa :</strong>
                                                            <input class="form-control" name="NmDesa" placeholder="Masukan Nama Desa">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Kd_Kec :</strong>
                                                            <input class="form-control" name="Kd_Kec" placeholder="Masukan Kode Kecamatan">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Nm_Kec :</strong>
                                                            <input class="form-control" name="Nm_Kec" placeholder="Masukan Nama Kecamatan">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>No_KK:</strong>
                                                            <input class="form-control" name="No_KK" placeholder="Masukan Nomer Kartu Keluarga">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Ts_input :</strong>
                                                            <input class="form-control" type ="DateTime-local"name="Ts_input" placeholder="Masukan Ts input">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Jn_Stag:</strong>
                                                            <input class="form-control" name="Jn_Stag" placeholder="Masukan Jn Stag">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    {{-- <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>CreateBy:</strong>
                                                            <input class="form-control" name="CreateBy" placeholder="Masukan Nama pembuat data">
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>NmPkk</label>
                                                            <input class="form-control" name="NmPkk" placeholder="masukan No Pkk">
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('masuk'))
    <div class="alert alert-success">
        <a class="close" data-dismiss="alert">×</a>
        <p>{{ $message }}</p>
        <img src="close.soon" style="display:none;" onerror="(function(el){ setTimeout(function(){ el.parentNode.parentNode.removeChild(el.parentNode); },2000 ); })(this);" />
    </div>
     @endif
     @if ($message = Session::get('deleted'))
     <div class="alert alert-danger">
        <a class="close" data-dismiss="alert">×</a>
        <p>{{ $message }}</p>
        <img src="close.soon" style="display:none;" onerror="(function(el){ setTimeout(function(){ el.parentNode.parentNode.removeChild(el.parentNode); },2000 ); })(this);" />
    </div>
      @endif
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered nowrap text-center" style="width:100%">
                <thead>
                    <tr>
                        <th >No</th>
                        <th data-orderable="false" >Nama</th>
                        <th data-orderable="false" >NmPkk</th>
                        <th data-orderable="false" >Tmt</th>
                        <th data-orderable="false" >Ps_Noka</th>
                        <th data-orderable="false" >Nik</th>
                        {{-- <th>Alamat</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->Nama }}</td>
                            <td>{{ $product->NmPkk  }}</td>
                            <td>{{ $product->Tmt }}</td>
                            <td>{{ $product->Ps_Noka }}</td>
                            <td>{{ $product->Nik }}</td>
                            {{-- <td>{{ $product->Alamat }}</td> --}}
                            <td>
                                    <a class="btn btn-info" data-toggle="modal" data-target="#details{{$product->id}}">Show</a>
                                    @can('PBI-Daerah-Edit')
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#update{{$product->id}}">Edit</a>
                                    @endcan
                                
                                    @can('PBI-Daerah-Delete')
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#Delete{{$product->id}}">Delete</button>
                                    @endcan
                            </td>
                        </tr>
                        
                        <div id="update{{$product->id}}" class="modal fade primary" role="dialog">
                            <div class="modal-dialog modal-xl">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h4 class="modal-title">Update Data DTKS</h4>    
                                        
                                    </div>
                                    <div class="modal-body">
                            
                                        <form id="quickForm" action="{{ route('Data-Pbi-Daerah.update',[$product->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>PS_Noka :</strong>
                                                        <input class="form-control" name="Ps_Noka" placeholder="Masukan Nokk" value="{{ $product->Ps_Noka }}" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Noka :</strong>
                                                        <input class="form-control" name="Noka" placeholder="Masukan Noka" value="{{ $product->Noka }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="Nama" class="form-control" placeholder="Masukan Nama" value="{{ $product->Nama }}" >
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nik</label>
                                                        <input class="form-control" name="Nik" placeholder="Masukan Nik" value="{{ $product->Nik }}" >
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pisat</label>
                                                        <input class="form-control" name="Pisat" placeholder="Masukan Pisat" value="{{ $product->Pisat }}" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tgl_lahir</label>
                                                        <input class="form-control" type="Date" name="Tgl_lahir" placeholder="masukan Terakhir Padan Capil" value="{{ $product->Tgl_lahir }}" >
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jenkel</label>
                                                        <input class="form-control" name="Jenkel" placeholder="masukan Terakhir Padan Capil" value="{{ $product->Jenkel }}" >
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kd_Status_Pst</label>
                                                        <input class="form-control" name="Kd_Status_Pst" placeholder="Masukan Kd Status Pst" value="{{ $product->Kd_Status_Pst }}" >
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Premi</label>
                                                        <input class="form-control" name="Premi" placeholder="Masukan Premi" value="{{ $product->Premi }}" >
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Kelas</label>
                                                            <input  class="form-control" name="Kelas" placeholder="Masukan Kelas" value="{{ $product->Kelas }}" >
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Tmt :</strong>
                                                        <input class="form-control"type="date" name="Tmt" placeholder="Masukan Tmt" value="{{ $product->Tmt }}" >
                                                    </div>
                                                </div> 
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>No_Pkk</label>
                                                        <input class="form-control" name="No_Pkk" placeholder="masukan No Pkk" value="{{ $product->No_Pkk }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Alamat:</strong>
                                                        <input  class="form-control" name="Alamat" placeholder="Masukan Alamat" value="{{ $product->Alamat }}" >
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Rt :</strong>
                                                        <input class="form-control" name="Rt" placeholder="Masukan Rt" value="{{ $product->Rt }}" >
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Rw :</strong>
                                                        <input class="form-control" name="Rw" placeholder="Masukan Rw" value="{{ $product->Rw }}" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Kd_Desa :</strong>
                                                        <input class="form-control" name="Kd_Desa" placeholder="Masukan Kd_Desa" value="{{ $product->Kd_Desa }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Nmdesa :</strong>
                                                        <input type="text" class="form-control" name="Nmdesa" placeholder="Masukan Nmdesa" value="{{ $product->NmDesa }}" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Kd_Kec :</strong>
                                                        <input class="form-control" name="Kd_Kec" placeholder="Masukan Kd_Kec" value="{{ $product->Kd_Kec }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Nm_Kec :</strong>
                                                        <input class="form-control" name="Nm_Kec" placeholder="Masukan Nm_Kec" value="{{ $product->Nm_Kec }}" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>No_KK:</strong>
                                                        <input class="form-control" name="No_KK" placeholder="Masukan No_KK" value="{{ $product->No_KK }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Ts_input :</strong>
                                                        <input class="form-control" type ="DateTime-local" name="Ts_Input" placeholder="Masukan Ts_input" value="{{ $product->Ts_Input }}" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Jn_Stag:</strong>
                                                        <input class="form-control" name="Jn_Stag" placeholder="Masukan Jn_Stag" value="{{ $product->Jn_Stag }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    {{-- <div class="form-group">
                                                        <strong>UpdateBy:</strong>
                                                        <input class="form-control" name="UpdateBy" placeholder="Masuka" value="{{  \Auth::user()->name }}" disabled>
                                                    </div> --}}
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NmPkk</label>
                                                        <input class="form-control" name="NmPkk" placeholder="masukan No Pkk" value="{{ $product->NmPkk }}" >
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="details{{$product->id}}" class="modal fade primary" role="dialog">
                            <div class="modal-dialog modal-xl">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h4 class="modal-title">Show Data PBI Daerah</h4>    
                                        
                                    </div>
                                    <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>PS_Noka :</strong>
                                                        <input class="form-control" name="Ps_Noka" placeholder="Masukan Nokk" value="{{ $product->Ps_Noka }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Noka :</strong>
                                                        <input class="form-control" name="Noka" placeholder="Masukan Noka" value="{{ $product->Noka }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="Nama" class="form-control" placeholder="Masukan Nama" value="{{ $product->Nama }}" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nik</label>
                                                        <input class="form-control" name="Nik" placeholder="Masukan Nik" value="{{ $product->Nik }}" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pisat</label>
                                                        <input class="form-control" name="Pisat" placeholder="Masukan Pisat" value="{{ $product->Pisat }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tgl_lahir</label>
                                                        <input class="form-control" type="Date" name="Tgl_lahir" placeholder="masukan Terakhir Padan Capil" value="{{ $product->Tgl_lahir }}" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jenkel</label>
                                                        <input class="form-control" name="Jenkel" placeholder="masukan Terakhir Padan Capil" value="{{ $product->Jenkel }}" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kd_Status_Pst</label>
                                                        <input class="form-control" name="Kd_Status_Pst" placeholder="Masukan Kd Status Pst" value="{{ $product->Kd_Status_Pst }}" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Premi</label>
                                                        <input class="form-control" name="Premi" placeholder="Masukan Premi" value="{{ $product->Premi }}" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Kelas</label>
                                                            <input  class="form-control" name="Kelas" placeholder="Masukan Kelas" value="{{ $product->Kelas }}" disabled>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Tmt :</strong>
                                                        <input class="form-control"type="date" name="Tmt" placeholder="Masukan Tmt" value="{{ $product->Tmt }}" disabled>
                                                    </div>
                                                </div> 
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>No_Pkk</label>
                                                        <input class="form-control" name="No_Pkk" placeholder="masukan No Pkk" value="{{ $product->No_Pkk }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Alamat:</strong>
                                                        <input  class="form-control" name="Alamat" placeholder="Masukan Alamat" value="{{ $product->Alamat }}" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Rt :</strong>
                                                        <input class="form-control" name="Rt" placeholder="Masukan Rt" value="{{ $product->Rt }}" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Rw :</strong>
                                                        <input class="form-control" name="Rw" placeholder="Masukan Rw" value="{{ $product->Rw }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Kd_Desa :</strong>
                                                        <input class="form-control" name="Kd_Desa" placeholder="Masukan Kd_Desa" value="{{ $product->Kd_Desa }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Nmdesa :</strong>
                                                        <input type="text" class="form-control" name="Nmdesa" placeholder="Masukan Nmdesa" value="{{ $product->NmDesa }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Kd_Kec :</strong>
                                                        <input class="form-control" name="Kd_Kec" placeholder="Masukan Kd_Kec" value="{{ $product->Kd_Kec }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Nm_Kec :</strong>
                                                        <input class="form-control" name="Nm_Kec" placeholder="Masukan Nm_Kec" value="{{ $product->Nm_Kec }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>No_KK:</strong>
                                                        <input class="form-control" name="No_KK" placeholder="Masukan No_KK" value="{{ $product->No_KK }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Ts_input :</strong>
                                                        <input class="form-control" type ="DateTime-local"name="Ts_input" placeholder="Masukan Ts_input" value="{{ $product->Ts_Input }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Jn_Stag:</strong>
                                                        <input class="form-control" name="Jn_Stag" placeholder="Masukan Jn_Stag" value="{{ $product->Jn_Stag }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>CreateBy:</strong>
                                                        <input class="form-control" name="CreateBy" placeholder="Masukan CreateBy" value="{{  \Auth::user()->name }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NmPkk</label>
                                                        <input class="form-control" name="NmPkk" placeholder="masukan No Pkk" value="{{ $product->NmPkk }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div id="Delete{{$product->id}}" class="modal fade primary mt-10" role="dialog">
                            <div class="modal-dialog modal-xl">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h4 class="modal-title">Delete Data PBI Daerah</h4>    
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center">apakah ada yakin untuk menghapus Data DTKS ini?</p>
                                        <form action="{{ route('Data-Pbi-Daerah.destroy',$product->id) }}" method="POST">
                                            <div class="modal-footer center">
                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('PBI-Daerah-Delete')
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
        </div>
   <div class="d-flex justify-content-center">
    {!! $products->links() !!}
</div>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- jquery datatable -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<!-- script tambahan  -->

    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>
    <script src=" https://cdn.datatables.net/searchpanes/2.1.0/js/dataTables.searchPanes.min.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/2.1.0/js/searchPanes.bootstrap.min.js"></script> 
    <script src ="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script>
    <script  src="{{ asset('js/filterDropDown.js') }}"></script>
    <script>
        var table = $('#example').DataTable({
            paging: true,
            // ordering: true,
            info: true,
            dom: 'lfrtip',
            lengthMenu: [
            [ 10, 25, 50,300, -1 ],
            [ '10 baris', '25 baris', '50 baris','300 baris','400 baris']
            ],
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 5 ]
                    }
                },
            'colvis',
            // 'pageLength'
            ],
            searchPanes: true
            });
        table.searchPanes.container().prependTo(table.table().container());
        table.searchPanes.resizePanes();
        $('#btn-place').html(table.buttons().container()); 
        var uploadField = document.getElementById("file");
            uploadField.onchange = function() {
                // console.log(this.files[0].size);
                if(this.files[0].size > 3163245){
                    $('#error-message').html("File upload size is larger than 2MB");
                    $('#error-message').css("display","block");
                    $('#error-message').css("color","red");
                }else{
                    $('#error-message').css("display","none");
                };
            };
    </script>
@endsection