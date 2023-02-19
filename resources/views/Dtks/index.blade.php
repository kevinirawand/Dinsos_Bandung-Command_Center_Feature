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
                <h2>Data DTKS</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">
                        @can('Dtks-Create')
                        <a class="btn btn-success" data-toggle="modal" data-target="#CreateNewDtks"> Create New DTKS</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Import Data DTKS</button>
                        {{-- <a id="btn-place"></a> --}}
                        {{-- <a class="btn btn-warning float-end" href="{{ route('data-export-Dtks') }}">Export Data Dtks </a> --}}
                        <div class="modal fade" id="CreateNewDtks">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create New Dtks</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="quickForm" action="{{ route('Dtks.store') }}" method="POST">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Id_DTKS:</strong>
                                                            <input class="form-control" name="Id_DTKS" placeholder="Masukan ID DTKS">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Nama:</strong>
                                                            <input class="form-control" name="Nama" placeholder="Masukan Nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Provinsi</label>
                                                            <input type="text" name="Provinsi" class="form-control" placeholder="Masukan PROVINSI">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Kabupaten/kota</label>
                                                            <input class="form-control" name="Kabupaten_Kota" placeholder="Masukan Kabupaten/Kota">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Kecamatan</label>
                                                            <input class="form-control" name="Kecamatan" placeholder="Masukan Kecamatan">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Desa/Kelurahan</label>
                                                            <input class="form-control" name="Desa_Kelurahan" placeholder="Masukan Desa/Kelurahan">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>RT</label>
                                                            <input class="form-control" name="RT" placeholder="masukan RT">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>RW</label>
                                                            <input class="form-control" name="RW" placeholder="Masukan RW">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>NOKK</label>
                                                            <input class="form-control" name="Nokk" placeholder="Masukan NOKK">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>NIK</label>
                                                                <input  class="form-control" name="Nik" placeholder="Masukan NIK">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Alamat:</strong>
                                                            <input class="form-control" name="Alamat" placeholder="Masukan Alamat">
                                                        </div>
                                                    </div> 
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Dusun:</strong>
                                                            <input class="form-control" name="Dusun" placeholder="Masukan Dusun">
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <strong>Tanggal Lahir :</strong>
                                                            <input type="date" class="form-control" name="Tanggal_Lahir" placeholder="Masukan TANGGAL LAHIR">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <strong>Tempat Lahir :</strong>
                                                            <input class="form-control" name="Tempat_Lahir" placeholder="Masukan TEMPAT LAHIR">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Jenis Kelamin :</strong>
                                                            <input class="form-control" name="Jenis_Kelamin" placeholder="Masukan jenis kelamin">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Pekerjaan :</strong>
                                                            <input class="form-control" name="Pekerjaan" placeholder="Masukan Pekerjaan">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Nama Ibu Kandung :</strong>
                                                            <input class="form-control" name="Nama_Ibu_Kandung" placeholder="Masukan Ibu Kandung">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Hub Keluarga :</strong>
                                                            <input class="form-control" name="Hub_Keluarga" placeholder="Masukan Hub Keluarga">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Keterangan padan :</strong>
                                                            <input class="form-control" name="Keterangan_padan" placeholder="Masukan Keterangan padan">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Bansos BPNT :</strong>
                                                            <input class="form-control" name="Bansos_Bpnt" placeholder="Masukan Bansos BPNT">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Bansos PKH :</strong>
                                                            <input class="form-control" name="Bansos_Pkh" placeholder="Masukan Bansos PKH ">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Bansos BNPNT PPKM :</strong>
                                                            <input class="form-control" name="Bansos_Bnpnt_Ppkm" placeholder="Masukan Bansos BNPNT PPKM">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Pbi_Jni:</strong>
                                                        <input class="form-control" name="Pbi_Jni" placeholder="Masukan JENIS" required>
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
     
            <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Import Data DTKS</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post" action="{{ route('data-import-Dtks') }}" enctype="multipart/form-data">
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
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered nowrap text-center" style="width:100%">
            <thead>
                <tr>
                    <th data-orderable="false">No</th>
                    <th data-orderable="false">Nama</th>
                    <th data-orderable="false">NOKK</th>
                    <th data-orderable="false">NIK</th>
                    <th data-orderable="false">Kecamatan</th>
                    <th data-orderable="false">Kabupaten</th>
                    <th data-orderable="false">Jenis Kelamin</th>
                    <th data-orderable="false">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $product->Nama }}</td>
                        <td>{{ $product->Nik }}</td>
                        <td>{{ $product->Nokk }}</td>
                        <td>{{ $product->Kecamatan }}</td>
                        <td>{{ $product->Kabupaten_Kota }}</td>
                        <td>{{ $product->Jenis_Kelamin }}</td>
                        <td>
                                <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#details{{$product->id}}">Show</a>
                                @can('Dtks-Edit')
                                <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#update{{$product->id}}">Edit</a>
                                @endcan
                            
                                @can('Dtks-Delete')
                                    <button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#Delete{{$product->id}}">Delete</button>
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
                        
                                    <form id="quickForm" action="{{ route('Dtks.update',[$product->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Id_DTKS:</strong>
                                                        <input class="form-control" name="Id_DTKS" placeholder="" value="{{ $product->Id_DTKS }}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Nama:</strong>
                                                        <input class="form-control" name="Nama" placeholder=""  value="{{ $product->Nama }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Provinsi</label>
                                                        <input type="text" name="Provinsi" class="form-control" placeholder="" value="{{ $product->Provinsi }}">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kabupaten/kota</label>
                                                        <input class="form-control" name="Kabupaten_Kota" placeholder=""  value="{{ $product->Kabupaten_Kota }}">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kecamatan</label>
                                                        <input class="form-control" name="Kecamatan" placeholder=""  value="{{ $product->Kecamatan }}">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Desa/Kelurahan</label>
                                                        <input class="form-control" name="Desa_Kelurahan" placeholder=""  value="{{ $product->Desa_Kelurahan }}">
                                                    </div>
                                                </div>
                                            </div> 
                                        
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>RT</label>
                                                        <input class="form-control" name="RT" placeholder=""  value="{{ $product->RT }}">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>RW</label>
                                                        <input class="form-control" name="RW" placeholder=""  value="{{ $product->RW }}">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NOKK</label>
                                                        <input class="form-control" name="Nokk" placeholder=""  value="{{ $product->Nokk }}">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NIK</label>
                                                        <input  class="form-control" name="Nik" placeholder=""  value="{{ $product->Nik }}">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Alamat:</strong>
                                                        <input class="form-control" name="Alamat" placeholder=""  value="{{ $product->Alamat }}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>dusun:</strong>
                                                        <input class="form-control" name="Dusun" placeholder=""  value="{{ $product->Dusun }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>TEMPAT LAHIR :</strong>
                                                        <input class="form-control" name="Tempat_Lahir" placeholder=""  value="{{ $product->Tempat_Lahir }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>TANGGAL LAHIR :</strong>
                                                        <input type="date" class="form-control" name="Tanggal_Lahir" placeholder=""  value="{{ $product->Tanggal_Lahir }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Pekerjaan :</strong>
                                                        <input class="form-control" name="Pekerjaan" placeholder=""  value="{{ $product->Pekerjaan }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Nama Ibu Kandung :</strong>
                                                        <input class="form-control" name="Nama_Ibu_Kandung" placeholder=""  value="{{ $product->Nama_Ibu_Kandung }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Nama Ibu Kandung :</strong>
                                                        <input class="form-control" name="Hub_Keluarga" placeholder=""  value="{{ $product->Hub_Keluarga }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Keterangan padan :</strong>
                                                        <input class="form-control" name="Keterangan_padan" placeholder=""  value="{{ $product->Keterangan_padan }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Bansos BPNT :</strong>
                                                        <input class="form-control" name="Bansos_Bpnt" placeholder=""  value="{{ $product->Bansos_Bpnt }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Bansos PKH :</strong>
                                                        <input class="form-control" name="Bansos_Pkh" placeholder=""  value="{{ $product->Bansos_Pkh }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Bansos BNPNT PPKM :</strong>
                                                        <input class="form-control" name="Bansos_Bnpnt_Ppkm" placeholder=""  value="{{ $product->Bansos_Bnpnt_Ppkm }}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Pbi_Jni :</strong>
                                                        <input class="form-control" name="Pbi_Jni" placeholder=""  value="{{ $product->Pbi_Jni }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Jenis Kelamin:</strong>
                                                        <input class="form-control" name="Jenis_Kelamin" placeholder=""  value="{{ $product->Jenis_Kelamin }}"> 
                                                    </div>
                                                </div>
                                            </div>`
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
                        
                                    <form id="quickForm" action="{{ route('Dtks.update',[$product->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Id_DTKS:</strong>
                                                        <input class="form-control" name="Id_DTKS" placeholder="" value="{{ $product->Id_DTKS }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Nama:</strong>
                                                        <input class="form-control" name="Nama" placeholder=""  value="{{ $product->Nama }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Provinsi</label>
                                                        <input type="text" name="Provinsi" class="form-control" placeholder="" value="{{ $product->Provinsi }}" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kabupaten/kota</label>
                                                        <input class="form-control" name="Kabupaten_Kota" placeholder=""  value="{{ $product->Kabupaten_Kota }}" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kecamatan</label>
                                                        <input class="form-control" name="Kecamatan" placeholder=""  value="{{ $product->Kecamatan }}" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Desa/Kelurahan</label>
                                                        <input class="form-control" name="Desa_Kelurahan" placeholder=""  value="{{ $product->Desa_Kelurahan }}" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                        
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>RT</label>
                                                        <input class="form-control" name="RT" placeholder=""  value="{{ $product->RT }}" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>RW</label>
                                                        <input class="form-control" name="RW" placeholder=""  value="{{ $product->RW }}" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NOKK</label>
                                                        <input class="form-control" name="Nokk" placeholder=""  value="{{ $product->Nokk }}" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NIK</label>
                                                        <input  class="form-control" name="Nik" placeholder=""  value="{{ $product->Nik }}" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Alamat:</strong>
                                                        <input class="form-control" name="Alamat" placeholder=""  value="{{ $product->Alamat }}" disabled> 
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>dusun:</strong>
                                                        <input class="form-control" name="Dusun" placeholder=""  value="{{ $product->Dusun }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>TEMPAT LAHIR :</strong>
                                                        <input class="form-control" name="Tempat_Lahir" placeholder=""  value="{{ $product->Tempat_Lahir }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>TANGGAL LAHIR :</strong>
                                                        <input type="date" class="form-control" name="Tanggal_Lahir" placeholder=""  value="{{ $product->Tanggal_Lahir }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Pekerjaan :</strong>
                                                        <input class="form-control" name="Pekerjaan" placeholder=""  value="{{ $product->Pekerjaan }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Nama Ibu Kandung :</strong>
                                                        <input class="form-control" name="Nama_Ibu_Kandung" placeholder=""  value="{{ $product->Nama_Ibu_Kandung }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Nama Ibu Kandung :</strong>
                                                        <input class="form-control" name="Hub_Keluarga" placeholder=""  value="{{ $product->Hub_Keluarga }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Keterangan padan :</strong>
                                                        <input class="form-control" name="Keterangan_padan" placeholder=""  value="{{ $product->Keterangan_padan }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Bansos BPNT :</strong>
                                                        <input class="form-control" name="Bansos_Bpnt" placeholder=""  value="{{ $product->Bansos_Bpnt }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <strong>Bansos PKH :</strong>
                                                        <input class="form-control" name="Bansos_Pkh" placeholder=""  value="{{ $product->Bansos_Pkh }}" disabled> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Bansos BNPNT PPKM :</strong>
                                                        <input class="form-control" name="Bansos_Bnpnt_Ppkm" placeholder=""  value="{{ $product->Bansos_Bnpnt_Ppkm }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Pbi_Jni :</strong>
                                                        <input class="form-control" name="Pbi_Jni" placeholder=""  value="{{ $product->Pbi_Jni }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Jenis Kelamin:</strong>
                                                        <input class="form-control" name="Jenis_Kelamin" placeholder=""  value="{{ $product->Jenis_Kelamin }}" disabled> 
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
                    <div id="Delete{{$product->id}}" class="modal fade primary mt-10" role="dialog">
                        <div class="modal-dialog modal-xl">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h4 class="modal-title">Show Data Dtks</h4>    
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">apakah ada yakin untuk menghapus Data DTKS ini?</p>
                                    <form action="{{ route('Dtks.destroy',$product->id) }}" method="POST">
                                        <div class="modal-footer center">
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                @csrf
                                                @method('DELETE')
                                                @can('Dtks-delete')
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
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