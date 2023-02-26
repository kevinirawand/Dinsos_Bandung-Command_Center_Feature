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
                <h2>Data BLT Minyak Goreng</h2>
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
                        @can('BLT-Minyak-Gorengs-Create')
                        <a class="btn btn-success" data-toggle="modal" data-target="#CreateNewDtks"> Create New BLT Minyak Goreng</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Import Data BLT Minyak Goreng</button>
                        {{-- <a class="btn btn-warning float-end" href="{{ route('data-export-Minyak') }}">Export Data BLT Minyak Goreng </a> --}}
                        <a id="btn-place"></a>
                        <div class="modal fade" id="CreateNewDtks">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Buat Data BLT Minyak Goreng</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="quickForm" action="{{ route('Bansos.store') }}" method="POST">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Nokk :</strong>
                                                            <input class="form-control" name="Nokk" placeholder="Masukan Nokk">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Nik :</strong>
                                                            <input class="form-control" name="Nik" placeholder="Masukan Nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nama :</label>
                                                            <input type="text" name="Nama" class="form-control" placeholder="Masukan Nama">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Alamat :</label>
                                                            <input class="form-control" name="Alamat" placeholder="Masukan Alamat">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Sk_Dtks :</label>
                                                            <input class="form-control" name="Sk_Dtks" placeholder="Masukan Sk_Dtks">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Terakhir_Padan_Capil :</label>
                                                            <input type="datetime-local" class="form-control" type="DateTime" name="Terakhir_Padan_Capil" placeholder="masukan Terakhir Padan Capil">
                                                        </div>
                                                    </div>
                                                </div> 
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Bpnt :</label>
                                                                <input class="form-control" name="Bpnt" placeholder="Masukan Bpnt">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <strong>Kelurahan :</strong>
                                                                <input class="form-control" name="Kelurahan" placeholder="Masukan Kelurahan">
                                                            </div>
                                                        </div>
                                                    </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Bst :</label>
                                                            <input class="form-control" name="Bst" placeholder="Masukan Bst">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Pkh :</label>
                                                                <input  class="form-control" name="Pkh" placeholder="Masukan Pkh">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Pbi :</strong>
                                                            <input class="form-control" name="Pbi" placeholder="Masukan Pbi">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <strong>Bpnt Ppkm :</strong>
                                                            <input  class="form-control" name="Bpnt_Ppkm" placeholder="Masukan Bpnt_Ppkm">
                                                        </div>
                                                    </div> 
                                                </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <strong>Blt :</strong>
                                                                <input class="form-control" name="Blt" placeholder="Masukan Blt">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <strong>Kecamatan:</strong>
                                                                <input class="form-control" name="Kecamatan" placeholder="Masukan Kecamatan">
                                                            </div>
                                                        </div>
                                                    </div> 
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Blt Bbm :</strong>
                                                            <input class="form-control" name="Blt_Bbm" placeholder="Masukan Blt Bbm">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Rutilahu :</strong>
                                                            <input class="form-control" name="Rutilahu" placeholder="Masukan Rutilahu">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Keterangan Meninggal:</strong>
                                                            <input type="text" class="form-control" name="Keterangan_Meninggal" placeholder="Masukan Keterangan Meninggal">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Keterangan_Disabilitas :</strong>
                                                            <input class="form-control" name="Keterangan_Disabilitas" placeholder="Masukan Keterangan_Disabilitas">
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
    {{-- @if ($message = Session::get('masuk'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        <p>{{ $message }}</p>
      </div>
     @endif --}}
            <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Import Data BLT Minyak Goreng</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post" action="{{ route('data-import-Minyak') }}" enctype="multipart/form-data">
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
                <th ></th>
                <th data-orderable="false">Nama</th>
                <th data-orderable="false">NOKK</th>
                <th data-orderable="false">NIK</th>
                <th data-orderable="false">Kecamatan</th>
                <th data-orderable="false">Kabupaten</th>
             
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->Nama }}</td>
                    <td>{{ $product->Nokk }}</td>
                    <td>{{ $product->Nik }}</td>
                    <td>{{ $product->Kecamatan }}</td>
                    <td>{{ $product->Kelurahan }}</td>
                    {{-- <td>{{ $product->Alamat }}</td> --}}
                    <td>
                            <a class="btn btn-info" data-toggle="modal" data-target="#details{{$product->id}}">Show</a>
                            @can('BLT-Minyak-Gorengs-Edit')
                            <a class="btn btn-primary" data-toggle="modal" data-target="#update{{$product->id}}">Edit</a>
                            @endcan
                        
                            @can('BLT-Minyak-Gorengs-Delete')
                                <button class="btn btn-danger" data-toggle="modal" data-target="#Delete{{$product->id}}">Delete</button>
                            @endcan
                    </td>
                </tr>
                <div id="update{{$product->id}}" class="modal fade primary" role="dialog">
                    <div class="modal-dialog modal-xl">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title">Update Data  Data BLT Minyak Goreng</h4>    
                                
                            </div>
                            <div class="modal-body">
                    
                                <form id="quickForm" action="{{ route('Bansos.update',[$product->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Nokk :</strong>
                                                <input class="form-control" name="Nokk" placeholder="Masukan Nokk"  value="{{ $product->Nokk }}" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Nik :</strong>
                                                <input class="form-control" name="Nik" placeholder="Masukan Nama"  value="{{ $product->Nik }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama :</label>
                                                <input type="text" name="Nama" class="form-control" placeholder="Masukan Nama"  value="{{ $product->Nama }}" >
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat :</label>
                                                <input class="form-control" name="Alamat" placeholder="Masukan Alamat"  value="{{ $product->Alamat }}" >
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Sk_Dtks :</label>
                                                <input class="form-control" name="Sk_Dtks" placeholder="Masukan Sk_Dtks"  value="{{ $product->Sk_Dtks }}" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                
                                                <label >Terakhir_Padan_Capil :</label>
                                                <input class="form-control" name="Terakhir_Padan_Capil"  value="{{ $product->Terakhir_Padan_Capil }}" >
                                            </div>
                                        </div>
                                    </div> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Bpnt :</label>
                                                    <input class="form-control" name="Bpnt" placeholder="Masukan Bpnt"  value="{{ $product->Bpnt }}" >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <strong>Kelurahan :</strong>
                                                    <input class="form-control" name="Kelurahan" placeholder="Masukan Kelurahan"  value="{{ $product->Kelurahan }}" >
                                                </div>
                                            </div>
                                        </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Bst :</label>
                                                <input class="form-control" name="Bst" placeholder="Masukan Bst"  value="{{ $product->Bst }}" >
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Pkh :</label>
                                                    <input  class="form-control" name="Pkh" placeholder="Masukan Pkh"  value="{{ $product->Pkh }}" >
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Pbi :</strong>
                                                <input class="form-control" name="Pbi" placeholder="Masukan Pbi"  value="{{ $product->Pbi }}" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Bpnt Ppkm :</strong>
                                                <input  class="form-control" name="Bpnt_Ppkm" placeholder="Masukan Bpnt_Ppkm"  value="{{ $product->Bpnt_Ppkm }}" >
                                            </div>
                                        </div> 
                                    </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <strong>Blt :</strong>
                                                    <input class="form-control" name="Blt" placeholder="Masukan Blt"  value="{{ $product->Blt }}" >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <strong>Kecamatan:</strong>
                                                    <input class="form-control" name="Kecamatan" placeholder="Masukan Kecamatan"  value="{{ $product->Kecamatan }}" >
                                                </div>
                                            </div>
                                        </div> 
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Blt Bbm :</strong>
                                                <input class="form-control" name="Blt_Bbm" placeholder="Masukan Blt Bbm"  value="{{ $product->Blt_Bbm }}" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Rutilahu :</strong>
                                                <input class="form-control" name="Rutilahu" placeholder="Masukan Rutilahu"  value="{{ $product->Rutilahu }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Keterangan Meninggal:</strong>
                                                <input type="text" class="form-control" name="Keterangan_Meninggal" placeholder="Masukan Keterangan Meninggal"  value="{{ $product->Keterangan_Meninggal }}" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Keterangan_Disabilitas :</strong>
                                                <input class="form-control" name="Keterangan_Disabilitas" placeholder="Masukan Keterangan_Disabilitas"  value="{{ $product->Keterangan_Disabilitas }}" >
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
                                <h4 class="modal-title">Show Data BLT Minyak Goreng</h4>    
                                
                            </div>
                            <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Nokk :</strong>
                                                <input class="form-control" name="Nokk" placeholder="Masukan Nokk"  value="{{ $product->Nokk }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Nik :</strong>
                                                <input class="form-control" name="Nik" placeholder="Masukan Nama"  value="{{ $product->Nik }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama :</label>
                                                <input type="text" name="Nama" class="form-control" placeholder="Masukan Nama"  value="{{ $product->Nama }}" disabled>
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat :</label>
                                                <input class="form-control" name="Alamat" placeholder="Masukan Alamat"  value="{{ $product->Alamat }}" disabled>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Sk_Dtks :</label>
                                                <input class="form-control" name="Sk_Dtks" placeholder="Masukan Sk_Dtks"  value="{{ $product->Sk_Dtks }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Terakhir_Padan_Capil :</label>
                                                <input class="form-control" name="Terakhir_Padan_Capil"  value="{{ $product->Terakhir_Padan_Capil }}" disabled>
                                            </div>
                                        </div>
                                    </div> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Bpnt :</label>
                                                    <input class="form-control" name="Bpnt" placeholder="Masukan Bpnt"  value="{{ $product->Bpnt }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <strong>Kelurahan :</strong>
                                                    <input class="form-control" name="Kelurahan" placeholder="Masukan Kelurahan"  value="{{ $product->Kelurahan }}" disabled>
                                                </div>
                                            </div>
                                        </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Bst :</label>
                                                <input class="form-control" name="Bst" placeholder="Masukan Bst"  value="{{ $product->Bst }}" disabled>
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Pkh :</label>
                                                    <input  class="form-control" name="Pkh" placeholder="Masukan Pkh"  value="{{ $product->Pkh }}" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Pbi :</strong>
                                                <input class="form-control" name="Pbi" placeholder="Masukan Pbi"  value="{{ $product->Pbi }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Bpnt Ppkm :</strong>
                                                <input  class="form-control" name="Bpnt_Ppkm" placeholder="Masukan Bpnt_Ppkm"  value="{{ $product->Bpnt_Ppkm }}" disabled>
                                            </div>
                                        </div> 
                                    </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <strong>Blt :</strong>
                                                    <input class="form-control" name="Blt" placeholder="Masukan Blt"  value="{{ $product->Blt }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <strong>Kecamatan:</strong>
                                                    <input class="form-control" name="Kecamatan" placeholder="Masukan Kecamatan"  value="{{ $product->Kecamatan }}" disabled>
                                                </div>
                                            </div>
                                        </div> 
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Blt Bbm :</strong>
                                                <input class="form-control" name="Blt_Bbm" placeholder="Masukan Blt Bbm"  value="{{ $product->Blt_Bbm }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Rutilahu :</strong>
                                                <input class="form-control" name="Rutilahu" placeholder="Masukan Rutilahu"  value="{{ $product->Rutilahu }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Keterangan Meninggal:</strong>
                                                <input type="text" class="form-control" name="Keterangan_Meninggal" placeholder="Masukan Keterangan Meninggal"  value="{{ $product->Keterangan_Meninggal }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <strong>Keterangan_Disabilitas :</strong>
                                                <input class="form-control" name="Keterangan_Disabilitas" placeholder="Masukan Keterangan_Disabilitas"  value="{{ $product->Keterangan_Disabilitas }}" disabled>
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
                                <h4 class="modal-title">Show  Data BLT Minyak Goreng</h4>    
                            </div>
                            <div class="modal-body">
                                <p class="text-center">apakah ada yakin untuk menghapus  Data BLT Minyak Goreng ini?</p>
                                <form action="{{ route('Bansos.destroy',$product->id) }}" method="POST">
                                    <div class="modal-footer center">
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            @csrf
                                            @method('DELETE')
                                            @can('BLT-Minyak-Gorengs-Delete')
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
        <script src="https://cdn.datatables.net/searchpanes/2.1.0/js/dataTables.searchPanes.min.js"></script>
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