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
                <h2> Data Data-Umkm</h2>
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
                        @can('UMKM-Create')
                        <a class="btn btn-success" data-toggle="modal" data-target="#CreateNewDtks"> Data-Umkm</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Import Data Data-Umkm</button>
                        {{-- <a class="btn btn-warning float-end" href="{{ route('data-export-umkm') }}">Export Data Data-Umkm </a> --}}
                        <a id="btn-place"></a>
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Import Data UMKM</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="post" action="{{ route('data-import-umkm') }}" enctype="multipart/form-data">
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
                </div>
            </div>
                <div class="modal fade" id="CreateNewDtks">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create New  Data Data-Umkm</h4>
                            </div>
                            <div class="modal-body">
                                <form id="quickForm" action="{{ route('Data-Umkm.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Nik :</strong>
                                                <input class="form-control" name="Nik" placeholder="Masukan Nokk">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Nama_Depan :</strong>
                                                <input class="form-control" name="Nama_Depan" placeholder="Masukan Nama Depan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" name="Alamat" class="form-control" placeholder="Masukan Alamat">
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Rt</label>
                                                <input class="form-control" name="Rt" placeholder="Masukan Rt">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Rw</label>
                                                <input class="form-control" name="Rw" placeholder="Masukan Rw">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kelurahan</label>
                                                <input class="form-control" name="Kelurahan" placeholder="Masukan Nama Kelurahan">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <input class="form-control" name="Kecamatan" placeholder="Masukan Nama Kecamatan">
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama_Usaha</label>
                                                <input class="form-control" name="Nama_Usaha" placeholder="Masukan Nama Usaha">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis_Usaha</label>
                                                <input class="form-control" name="Jenis_Usaha" placeholder="masukan Jenis Usaha">
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Bentuk_Usaha</label>
                                                <input class="form-control" name="Bentuk_Usaha" placeholder="Masukan Bentuk Usaha">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Produk_1</label>
                                                <input class="form-control" name="Produk_1" placeholder="masukan Produk_1">
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Jenis Aset</label>
                                                    <input class="form-control" name="Jenis_Aset" placeholder="Masukan Jenis Aset">
                                                </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis_Omset</label>
                                                <input class="form-control" name="Jenis_Omset" placeholder="masukan Jenis Omset">
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Jumlah_Omset</label>
                                                    <input class="form-control" name="Jumlah_Omset" placeholder="Masukan Jumlah Omset">
                                                </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama_DTKS</label>
                                                <input class="form-control" name="Nama_DTKS" placeholder="masukan Nama DTKS">
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>DTKS</label>
                                                <input class="form-control" name="DTKS" placeholder="Masukan DTKS">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>KPM_Bansos</label>
                                                <input class="form-control" name="KPM_Bansos" placeholder="masukan KPM Bansos">
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>BLT_BBM</label>
                                                <input class="form-control" name="BLT_BBM" placeholder="Masukan BLT BBM">
                                            </div>
                                        </div>
                                    </div> 
                                    {{-- <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>CreateBy</label>
                                                <input class="form-control" name="CreatedBy" value="{{ \Auth::user()->name }}">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Jumlah Aset</label>
                                        <input class="form-control" name="jumlah_aset" placeholder="Masukan Jumlah aset">
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
    @if ($message = Session::get('masuk'))
    <div class="alert alert-success">
        <a class="close" data-dismiss="alert">??</a>
        <p>{{ $message }}</p>
        <img src="close.soon" style="display:none;" onerror="(function(el){ setTimeout(function(){ el.parentNode.parentNode.removeChild(el.parentNode); },2000 ); })(this);" />
    </div>
     @endif
    @if ($message = Session::get('deleted'))
    <div class="alert alert-danger">
        <a class="close" data-dismiss="alert">??</a>
        <p>{{ $message }}</p>
        <img src="close.soon" style="display:none;" onerror="(function(el){ setTimeout(function(){ el.parentNode.parentNode.removeChild(el.parentNode); },2000 ); })(this);" />
    </div>
    @endif
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered nowrap text-center" style="width:100%"> 
            <div id="btn-place"></div>
            <thead>
                <tr>
                    <th >No</th>
                    <th data-orderable="false" >Nik</th>
                    <th data-orderable="false" >Nama Depan</th>
                    <th data-orderable="false" >Alamat</th>
                    <th data-orderable="false" >Jenis_Usaha</th>
                    <th data-orderable="false" > Jumlah_Omset</th>
                    {{-- <th data-orderable="false" >Alamat</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $product->Nik }}</td>
                        <td>{{ $product->Nama_Depan  }}</td>
                        <td>{{ $product->Jenis_Usaha }}</td>
                        <td>{{ $product->Kelurahan }}</td>
                        <td>{{ $product->Jumlah_Omset }}</td>
                        {{-- <td>{{ $product->Alamat }}</td> --}}
                        <td>
                                <a class="btn btn-info" data-toggle="modal" data-target="#details{{$product->id}}">Show</a>
                                @can('UMKM-Edit')
                                <a class="btn btn-primary" data-toggle="modal" data-target="#update{{$product->id}}">Edit</a>
                                @endcan
                            
                                @can('UMKM-Delete')
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
                        
                                    <form id="quickForm" action="{{ route('Data-Umkm.update',[$product->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <strong>Nik :</strong>
                                                    <input class="form-control" name="Nik" placeholder="Masukan Nokk" value="{{ $product->Nik }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <strong>Nama_Depan :</strong>
                                                    <input class="form-control" name="Nama_Depan" placeholder="Masukan Nama Depan" value="{{ $product->Nama_Depan }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input type="text" name="Alamat" class="form-control" placeholder="Masukan Alamat" value="{{ $product->Alamat }}">
                                                </div>
                                            </div>
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Rt</label>
                                                    <input class="form-control" name="Rt" placeholder="Masukan Rt" value="{{ $product->RT}}">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Rw</label>
                                                    <input class="form-control" name="Rw" placeholder="Masukan Rw" value="{{ $product->RW}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Kelurahan</label>
                                                    <input class="form-control" name="Kelurahan" placeholder="masukan Kelurahan" value="{{ $product->Kelurahan }}">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Kecamatan</label>
                                                    <input class="form-control" name="Kecamatan" placeholder="masukan Kecamatan" value="{{ $product->Kecamatan }}">
                                                </div>
                                            </div>
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nama_Usaha</label>
                                                    <input class="form-control" name="Nama_Usaha" placeholder="Masukan Nama Usaha" value="{{ $product->Nama_Usaha }}">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Jenis_Usaha</label>
                                                    <input class="form-control" name="Jenis_Usaha" placeholder="masukan Jenis Usaha" value="{{ $product->Jenis_Usaha }}">
                                                </div>
                                            </div>
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Bentuk_Usaha</label>
                                                    <input class="form-control" name="Bentuk_Usaha" placeholder="Masukan Bentuk Usaha" value="{{ $product->Bentuk_Usaha }}"> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Produk_1</label>
                                                    <input class="form-control" name="Produk_1" placeholder="Masukan Produk_1"value="{{ $product->Produk_1 }}">
                                                </div>
                                            </div>
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Jenis Aset</label>
                                                    <input class="form-control" name="Jenis_aset" placeholder="Masukan Jenis Aset"value="{{ $product->Jenis_aset }}">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Jenis_Omset</label>
                                                    <input class="form-control" name="Jenis_Omset" placeholder="Masukan Jenis Omset" value="{{ $product->Jenis_Omset }}">
                                                </div>
                                            </div>
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Jumlah_Omset</label>
                                                    <input class="form-control" name="Jumlah_Omset" placeholder="Masukan Jumlah Omset" value="{{ $product->Jumlah_Omset }}">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nama_DTKS</label>
                                                    <input class="form-control" name="Nama_DTKS" placeholder="masukan Nama DTKS" value="{{ $product->Nama_DTKS }}">
                                                </div>
                                            </div>
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>DTKS</label>
                                                    <input class="form-control" name="DTKS" placeholder="Masukan DTKS" value="{{ $product->DTKS }}">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>KPM_Bansos</label>
                                                    <input class="form-control" name="KPM_Bansos" placeholder="masukan KPM Bansos" value="{{ $product->KPM_Bansos }}">
                                                </div>
                                            </div>
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>BLT_BBM</label>
                                                    <input class="form-control" name="BLT_BBM" placeholder="Masukan BLT BBM" value="{{ $product->BLT_BBM }}">
                                                </div>
                                            </div>
                                        </div> 
                                        {{-- <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>UpdateBy</label>
                                                    <input class="form-control" name="UpdateBy" value="{{ \Auth::user()->name }}" disabled>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jumlah Aset</label>
                                                <input class="form-control" name="jumlah_aset" placeholder="Masukan Jumlah Aset" value="{{ $product->Jumlah_Aset }}">
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
                                    <h4 class="modal-title">Show Data Dtks</h4>    
                                    
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Nik :</strong>
                                                <input class="form-control" name="Nik" placeholder="Masukan Nokk" value="{{ $product->Nik }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Nama_Depan :</strong>
                                                <input class="form-control" name="Nama_Depan" placeholder="Masukan Nama Depan" value="{{ $product->Nama_Depan }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" name="Alamat" class="form-control" placeholder="Masukan Alamat" value="{{ $product->Alamat }}" disabled>
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Rt</label>
                                                <input class="form-control" name="Rt" placeholder="Masukan Rt" value="{{ $product->RT}}" disabled>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Rw</label>
                                                <input class="form-control" name="Rw" placeholder="Masukan Rw" value="{{ $product->RW}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kelurahan</label>
                                                <input class="form-control" name="Kelurahan" placeholder="masukan Nama Kelurahan" value="{{ $product->Kelurahan }}" disabled>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <input class="form-control" name="Kecamatan" placeholder="masukan Nama Kecamatan" value="{{ $product->Kecamatan }}" disabled>
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama_Usaha</label>
                                                <input class="form-control" name="Nama_Usaha" placeholder="Masukan Nama Usaha" value="{{ $product->Nama_Usaha }}" disabled>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis_Usaha</label>
                                                <input class="form-control" name="Jenis_Usaha" placeholder="masukan Jenis Usaha" value="{{ $product->Jenis_Usaha }}" disabled>
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Bentuk_Usaha</label>
                                                <input class="form-control" name="Bentuk_Usaha" placeholder="Masukan Bentuk Usaha" value="{{ $product->Bentuk_Usaha }}" disabled> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Produk_1</label>
                                                <input class="form-control" name="Produk_1" placeholder="masukan Produk_1"value="{{ $product->Produk_1 }}" disabled>
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Jenis Aset</label>
                                                    <input class="form-control" name="Jenis_Aset" placeholder="Masukan Jenis Aset"value="{{ $product->Jenis_Aset }}" disabled>
                                                </div>
                                            </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis_Omset</label>
                                                <input class="form-control" name="Jenis_Omset" placeholder="masukan Jenis Omset" value="{{ $product->Jenis_Omset }}" disabled>
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jumlah_Omset</label>
                                                <input class="form-control" name="Jumlah_Omset" placeholder="Masukan Jumlah Omset" value="{{ $product->Jumlah_Omset }}" disabled>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama_DTKS</label>
                                                <input class="form-control" name="Nama_DTKS" placeholder="masukan Nama DTKS" value="{{ $product->Nama_DTKS }}" disabled>
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>DTKS</label>
                                                <input class="form-control" name="DTKS" placeholder="Masukan DTKS" value="{{ $product->DTKS }}" disabled>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>KPM_Bansos</label>
                                                <input class="form-control" name="KPM_Bansos" placeholder="masukan KPM Bansos" value="{{ $product->KPM_Bansos }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>BLT_BBM</label>
                                                <input class="form-control" name="BLT_BBM" placeholder="Masukan BLT BBM" value="{{ $product->BLT_BBM }}" disabled>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        {{-- <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>CreateBy</label>
                                                <input class="form-control" name="CreatedBy" value="{{ \Auth::user()->name }}" disabled>
                                            </div>
                                        </div> --}}
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jumlah Aset</label>
                                                <input class="form-control" name="Jumlah_Aset" placeholder="Masukan Jumlah Aset"value="{{ $product->Jumlah_Aset }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                                    <h4 class="modal-title">Delete Data Umkm</h4>    
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">apakah ada yakin untuk menghapus Data Umkm ini?</p>
                                    <form action="{{ route('Data-Umkm.destroy',$product->id) }}" method="POST">
                                        <div class="modal-footer center">
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                @csrf
                                                @method('DELETE')
                                                @can('UMKM-Delete')
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