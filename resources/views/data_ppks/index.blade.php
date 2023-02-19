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
                <h2> Data PPKS</h2>
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
                        @can('PKH-Create')
                        <a class="btn btn-success" data-toggle="modal" data-target="#CreateNewDtks">Create New Data PPKS</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Import Data PPKS</button>
                        {{-- <a class="btn btn-warning float-end" href="{{ route('data-export-Pkh') }}">Export Data PKH </a> --}}
                        <a id="btn-place"></a>
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Import Data PPKS</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="post" action="{{ route('data-import-Pkh') }}" enctype="multipart/form-data">
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
                                        <h4 class="modal-title">Create New Data PPKS</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="quickForm" action="{{ route('Data-PPKS.store') }}" method="POST">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Kategori_Ppks </strong>
                                                            <input class="form-control" name="Kategori_Ppks" placeholder="Masukan Nokk">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Kondisi_Kedisabilitasan :</strong>
                                                            <input class="form-control" name="Kondisi_Kedisabilitasan" placeholder="Masukan Nama Penerima">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Ragam_Disabilitas :</label>
                                                            <input type="text" name="Ragam_Disabilitas" class="form-control" placeholder="Masukan Alamat">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>NoKK :</label>
                                                            <input class="form-control" name="No_KK" placeholder="Masukan Nomer Rekening">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nik :</label>
                                                            <input class="form-control" name="Nik" placeholder="Masukan penyalur">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nama_Lengkap :</label>
                                                            <input class="form-control"  name="Nama_Lengkap" placeholder="masukan Terakhir Padan Capil">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Jenkel :</label>
                                                            <input class="form-control" name="Jenkel" placeholder="masukan Terakhir Padan Capil">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Tempat Lahir :</label>
                                                            <input class="form-control"  name="Tempat_Lahir" placeholder="Masukan Kd Status Pst">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    {{-- <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Tempat_Lahir</label>
                                                            <input class="form-control" name="Tempat_Lahir" placeholder="masukan Terakhir Padan Capil">
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir :</label>
                                                            <input class="form-control" type="date" name="Tanggal_Lahir" placeholder="Masukan Kd Status Pst">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Agama :</label>
                                                            <input class="form-control" name="Agama" placeholder="masukan Terakhir Padan Capil">
                                                        </div>`
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Pendidikan Terakhir :</label>
                                                            <input class="form-control"  name="Pendidikan_Terakhir" placeholder="Masukan Kd Status Pst">
                                                        </div>
                                                    </div>
                                                </div> 
                                                 <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Pekerjaan :</label>
                                                            <input class="form-control" name="Pekerjaan" placeholder="masukan Terakhir Padan Capil">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Status_Kawin :</label>
                                                            <input class="form-control"  name="Status_Kawin" placeholder="Masukan Kd Status Pst">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Shdk_Duk :</label>
                                                            <input class="form-control" name="Shdk_Duk" placeholder="masukan Terakhir Padan Capil">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nama Ibu Kandung :</label>
                                                            <input class="form-control"  name="Nama_Ibu_Kandung" placeholder="Masukan Kd Status Pst">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Kecamatan :</label>
                                                            <input class="form-control" name="Kecamatan" placeholder="masukan Terakhir Padan Capil">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Kelurahaan :</label>
                                                            <input class="form-control"  name="Kelurahaan" placeholder="Masukan Kd Status Pst">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Alamat :</label>
                                                            <input class="form-control" name="Alamat" placeholder="masukan Terakhir Padan Capil">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Rt :</label>
                                                            <input class="form-control"  name="Rt" placeholder="Masukan Kd Status Pst">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Rw :</label>
                                                            <input class="form-control" name="Rw" placeholder="masukan Terakhir Padan Capil">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Ppks Tinggal :</label>
                                                            <input class="form-control"  name="Ppks_Tinggal" placeholder="Masukan Kd Status Pst">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Status_Dtks :</label>
                                                            <input class="form-control" name="Status_Dtks" placeholder="masukan Terakhir Padan Capil">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>BPNT :</label>
                                                            <input class="form-control"  name="BPNT" placeholder="Masukan Kd Status Pst">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>PKH :</label>
                                                            <input class="form-control" name="PKH" placeholder="masukan Terakhir Padan Capil">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Pbi Jkn :</label>
                                                            <input class="form-control"  name="Pbi_Jkn" placeholder="Masukan Kd Status Pst">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Jenis Bansos</label>
                                                            <input class="form-control" name="Jenis_Bansos" placeholder="masukan Terakhir Padan Capil">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Hubungan Keluarga :</label>
                                                            <input class="form-control"  name="Hubungan_Keluarga" placeholder="Masukan Kd Status Pst">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Status Duk :</label>
                                                            <input class="form-control" name="Status_Duk" placeholder="masukan Terakhir Padan Capil">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Status_Bansos</label>
                                                            <input class="form-control"  name="Status_Bansos" placeholder="Masukan Kd Status Pst">
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>CreeteBy</label>
                                                            <input class="form-control" name="CreatedBy" placeholder="Masukan Premi">
                                                        </div>
                                                    </div>
                                                </div> --}}
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
    <div id="cari">

    </div>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered nowrap text-center" style="width:100%"> 
            <div id="btn-place"></div> 
            <thead>
                <tr>
                    <th >No</th>
                    <th>Nama Lengkap</th>
                    <th>Nik</th>
                    <th>Kategori Ppks</th>
                    <th>Jenis Bansos</th>
                    <th>Status Bansos</th>
                    {{-- <th>Alamat</th> --}}
                    <th width="250px">Action</th>
                </tr>
               
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $product->Nama_Lengkap }}</td>
                        <td>{{ $product->Nik}}</td>
                        <td>{{ $product->Kategori_Ppks }}</td>
                        <td>{{ $product->Jenis_Bansos }}</td>
                        <td>{{ $product->Status_Bansos }}</td>
                        {{-- <td>{{ $product->Alamat }}</td> --}}
                        <td>
                                <a class="btn btn-info" data-toggle="modal" data-target="#details{{$product->id}}">Show</a>
                                @can('PKH-Edit')
                                <a class="btn btn-primary" data-toggle="modal" data-target="#update{{$product->id}}">Edit</a>
                                @endcan

                                @can('PKH-Delete')
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#Delete{{$product->id}}">Delete</button>
                                @endcan
                        </td>
                    </tr>
                    
                    <div id="update{{$product->id}}" class="modal fade primary" role="dialog">
                        <div class="modal-dialog modal-xl">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h4 class="modal-title">Update Data PPKS</h4>    
                                    
                                </div>
                                {{-- <div class="modal-body">
                                    <form id="quickForm" action="{{ route('Data-Pkh.update',[$product->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <strong>Nik :</strong>
                                                    <input class="form-control" name="Nik" placeholder="Masukan Nokk"  value="{{ $product->Nik }}" >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <strong>Nama_Penerima :</strong>
                                                    <input class="form-control" name="Nama_Penerima" placeholder="Masukan Nama Penerima"  value="{{ $product->Nama_Penerima }}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input type="text" name="Alamat" class="form-control" placeholder="Masukan Alamat"  value="{{ $product->Alamat }}" >
                                                </div>
                                            </div>
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nomer_Rekening</label>
                                                    <input class="form-control" name="Nomer_Rekening" placeholder="Masukan Nomer Rekening"  value="{{ $product->Nomer_Rekening }}" >
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>penyalur</label>
                                                    <input class="form-control" name="penyalur" placeholder="Masukan penyalur"  value="{{ $product->penyalur }}" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Bansos</label>
                                                    <input class="form-control" name="Bansos" placeholder="masukan Terakhir Padan Capil"  value="{{ $product->Bansos }}" >
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input class="form-control" name="Status" placeholder="masukan Terakhir Padan Capil"  value="{{ $product->Status }}" >
                                                </div>
                                            </div>
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Periode</label>
                                                    <input class="form-control" name="Periode" placeholder="Masukan Kd Status Pst"  value="{{ $product->Periode }}" >
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>UpdateBy</label>
                                                    <input class="form-control" name="UpdateBy" placeholder="Masukan UpdateBy"  value="{{ \Auth::user()->name }}" disabled >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div> --}}
                                <div class="modal-body">
                                    <form id="quickForm" action="{{ route('Data-PPKS.update',[$product->id]) }}" method="POST">
                                        @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Kategori Ppks </strong>
                                                        <input class="form-control" name="Kategori_Ppks" value="{{ $product->Kategori_Ppks }}"placeholder="Masukan Nokk">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Kondisi Kedisabilitasan :</strong>
                                                        <input class="form-control" name="Kondisi_Kedisabilitasan" value="{{ $product->Kondisi_Kedisabilitasan }}"placeholder="Masukan Nama Penerima">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Ragam Disabilitas :</label>
                                                        <input type="text" name="Ragam_Disabilitas" value="{{ $product->Ragam_Disabilitas }}" class="form-control" placeholder="Masukan Alamat">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NoKK :</label>
                                                        <input class="form-control" name="No_KK"   value="{{ $product->No_KK }}" placeholder="Masukan Nomer Rekening">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nik :</label>
                                                        <input class="form-control" name="Nik" value="{{ $product->Nik }}" placeholder="Masukan penyalur">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama_Lengkap :</label>
                                                        <input class="form-control"  name="Nama_Lengkap" value="{{ $product->Nama_Lengkap }}" placeholder="masukan Terakhir Padan Capil">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jenkel :</label>
                                                        <input class="form-control" name="Jenkel" value="{{ $product->Jenkel }}" placeholder="masukan Terakhir Padan Capil">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tempat Lahir :</label>
                                                        <input class="form-control"  name="Tempat_Lahir" value="{{ $product->Jenkel }}" placeholder="Masukan Kd Status Pst">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                {{-- <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tempat_Lahir</label>
                                                        <input class="form-control" name="Tempat_Lahir" placeholder="masukan Terakhir Padan Capil">
                                                    </div>
                                                </div> --}}
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir :</label>
                                                        <input class="form-control" type="date" name="Tanggal_Lahir" value="{{ $product->Tanggal_Lahir }}" placeholder="Masukan Kd Status Pst">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Agama :</label>
                                                        <input class="form-control" name="Agama" value="{{ $product->Agama }}"  placeholder="masukan Terakhir Padan Capil">
                                                    </div>`
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pendidikan Terakhir :</label>
                                                        <input class="form-control"  name="Pendidikan_Terakhir" value="{{ $product->Pendidikan_Terakhir }}" placeholder="Masukan Kd Status Pst">
                                                    </div>
                                                </div>
                                            </div> 
                                             <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pekerjaan :</label>
                                                        <input class="form-control" name="Pekerjaan"  value="{{ $product->Pekerjaan }}" placeholder="masukan Terakhir Padan Capil">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Status_Kawin :</label>
                                                        <input class="form-control"  name="Status_Kawin" value="{{ $product->Status_Kawin }}" placeholder="Masukan Kd Status Pst">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Shdk_Duk :</label>
                                                        <input class="form-control" name="Shdk_Duk" value="{{ $product->Shdk_Duk }}" placeholder="masukan Terakhir Padan Capil">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama Ibu Kandung :</label>
                                                        <input class="form-control"  name="Nama_Ibu_Kandung" value="{{ $product->Nama_Ibu_Kandung }}" placeholder="Masukan Kd Status Pst">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kecamatan :</label>
                                                        <input class="form-control" name="Kecamatan" value="{{ $product->Kecamatan }}" placeholder="masukan Terakhir Padan Capil">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kelurahaan :</label>
                                                        <input class="form-control"  name="Kelurahaan" value="{{ $product->Kelurahaan }}" placeholder="Masukan Kd Status Pst">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Alamat :</label>
                                                        <input class="form-control" name="Alamat" value="{{ $product->Alamat }}" placeholder="masukan Terakhir Padan Capil">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Rt :</label>
                                                        <input class="form-control"  name="Rt" value="{{ $product->Rt }}" placeholder="Masukan Kd Status Pst">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Rw :</label>
                                                        <input class="form-control" name="Rw" value="{{ $product->Rw }}" placeholder="masukan Terakhir Padan Capil">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Ppks Tinggal :</label>
                                                        <input class="form-control"  name="Ppks_Tinggal" value="{{ $product->Ppks_Tinggal }}" placeholder="Masukan Kd Status Pst">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Status_Dtks :</label>
                                                        <input class="form-control" name="Status_Dtks" value="{{ $product->Status_Dtks }}" placeholder="masukan Terakhir Padan Capil">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>BPNT :</label>
                                                        <input class="form-control"  name="BPNT" value="{{ $product->BPNT }}" placeholder="Masukan Kd Status Pst">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>PKH :</label>
                                                        <input class="form-control" name="PKH" value="{{ $product->PKH }}" placeholder="masukan Terakhir Padan Capil">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pbi Jkn :</label>
                                                        <input class="form-control"  name="Pbi_Jkn" value="{{ $product->Pbi_Jkn }}" placeholder="Masukan Kd Status Pst">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jenis Bansos</label>
                                                        <input class="form-control" name="Jenis_Bansos" value="{{ $product->Jenis_Bansos }}" placeholder="masukan Terakhir Padan Capil">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Hubungan Keluarga :</label>
                                                        <input class="form-control"  name="Hubungan_Keluarga" value="{{ $product->Hubungan_Keluarga }}" placeholder="Masukan Kd Status Pst">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Status Duk :</label>
                                                        <input class="form-control" name="Status_Duk" value="{{ $product->Status_Duk }}" placeholder="masukan Terakhir Padan Capil">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Status_Bansos</label>
                                                        <input class="form-control"  name="Status_Bansos" value="{{ $product->Status_Bansos }}" placeholder="Masukan Kd Status Pst">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>CreeteBy</label>
                                                        <input class="form-control" name="CreatedBy" placeholder="Masukan Premi">
                                                    </div>
                                                </div>
                                            </div> --}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
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
                                    <h4 class="modal-title">Show Data PPKS</h4>    
                                    
                                </div>
                                <div class="modal-body">
                                    {{-- <form id="quickForm" action="{{ route('Data-PPKS.update',[$product->id]) }}" method="POST"> --}}
                                        @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Kategori Ppks </strong>
                                                        <input class="form-control" name="Kategori_Ppks" value="{{ $product->Kategori_Ppks }}"placeholder="Masukan Nokk" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Kondisi Kedisabilitasan :</strong>
                                                        <input class="form-control" name="Kondisi_Kedisabilitasan" value="{{ $product->Kondisi_Kedisabilitasan }}"placeholder="Masukan Nama Penerima" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Ragam Disabilitas :</label>
                                                        <input type="text" name="Ragam_Disabilitas" value="{{ $product->Ragam_Disabilitas }}" class="form-control" placeholder="Masukan Alamat" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NoKK :</label>
                                                        <input class="form-control" name="No_KK"   value="{{ $product->No_KK }}" placeholder="Masukan Nomer Rekening" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nik :</label>
                                                        <input class="form-control" name="Nik" value="{{ $product->Nik }}" placeholder="Masukan penyalur" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama_Lengkap :</label>
                                                        <input class="form-control"  name="Nama_Lengkap" value="{{ $product->Nama_Lengkap }}" placeholder="masukan Terakhir Padan Capil" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jenkel :</label>
                                                        <input class="form-control" name="Jenkel" value="{{ $product->Jenkel }}" placeholder="masukan Terakhir Padan Capil" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tempat Lahir :</label>
                                                        <input class="form-control"  name="Tempat_Lahir" value="{{ $product->Jenkel }}" placeholder="Masukan Kd Status Pst" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                {{-- <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tempat_Lahir</label>
                                                        <input class="form-control" name="Tempat_Lahir" placeholder="masukan Terakhir Padan Capil">
                                                    </div>
                                                </div> --}}
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir :</label>
                                                        <input class="form-control" type="date" name="Tanggal_Lahir" value="{{ $product->Tanggal_Lahir }}" placeholder="Masukan Kd Status Pst" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Agama :</label>
                                                        <input class="form-control" name="Agama" value="{{ $product->Agama }}"  placeholder="masukan Terakhir Padan Capil" disabled>
                                                    </div>`
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pendidikan Terakhir :</label>
                                                        <input class="form-control"  name="Pendidikan_Terakhir" value="{{ $product->Pendidikan_Terakhir }}" placeholder="Masukan Kd Status Pst" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                             <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pekerjaan :</label>
                                                        <input class="form-control" name="Pekerjaan"  value="{{ $product->Pekerjaan }}" placeholder="masukan Terakhir Padan Capil" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Status_Kawin :</label>
                                                        <input class="form-control"  name="Status_Kawin" value="{{ $product->Status_Kawin }}" placeholder="Masukan Kd Status Pst" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Shdk_Duk :</label>
                                                        <input class="form-control" name="Shdk_Duk" value="{{ $product->Shdk_Duk }}" placeholder="masukan Terakhir Padan Capil" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama Ibu Kandung :</label>
                                                        <input class="form-control"  name="Nama_Ibu_Kandung" value="{{ $product->Nama_Ibu_Kandung }}" placeholder="Masukan Kd Status Pst" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kecamatan :</label>
                                                        <input class="form-control" name="Kecamatan" value="{{ $product->Kecamatan }}" placeholder="masukan Terakhir Padan Capil" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kelurahaan :</label>
                                                        <input class="form-control"  name="Kelurahaan" value="{{ $product->Kelurahaan }}" placeholder="Masukan Kd Status Pst" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Alamat :</label>
                                                        <input class="form-control" name="Alamat" value="{{ $product->Alamat }}" placeholder="masukan Terakhir Padan Capil" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Rt :</label>
                                                        <input class="form-control"  name="Rt" value="{{ $product->Rt }}" placeholder="Masukan Kd Status Pst" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Rw :</label>
                                                        <input class="form-control" name="Rw" value="{{ $product->Rw }}" placeholder="masukan Terakhir Padan Capil" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Ppks Tinggal :</label>
                                                        <input class="form-control"  name="Ppks_Tinggal" value="{{ $product->Ppks_Tinggal }}" placeholder="Masukan Kd Status Pst" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Status_Dtks :</label>
                                                        <input class="form-control" name="Status_Dtks" value="{{ $product->Status_Dtks }}" placeholder="masukan Terakhir Padan Capil" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>BPNT :</label>
                                                        <input class="form-control"  name="BPNT" value="{{ $product->BPNT }}" placeholder="Masukan Kd Status Pst" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>PKH :</label>
                                                        <input class="form-control" name="PKH" value="{{ $product->PKH }}" placeholder="masukan Terakhir Padan Capil" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pbi Jkn :</label>
                                                        <input class="form-control"  name="Pbi_Jkn" value="{{ $product->Pbi_Jkn }}" placeholder="Masukan Kd Status Pst" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jenis Bansos</label>
                                                        <input class="form-control" name="Jenis_Bansos" value="{{ $product->Jenis_Bansos }}" placeholder="masukan Terakhir Padan Capil" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Hubungan Keluarga :</label>
                                                        <input class="form-control"  name="Hubungan_Keluarga" value="{{ $product->Hubungan_Keluarga }}" placeholder="Masukan Kd Status Pst" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Status Duk :</label>
                                                        <input class="form-control" name="Status_Duk" value="{{ $product->Status_Duk }}" placeholder="masukan Terakhir Padan Capil" disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Status_Bansos</label>
                                                        <input class="form-control"  name="Status_Bansos" value="{{ $product->Status_Bansos }}" placeholder="data belum ada" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>CreeteBy</label>
                                                        <input class="form-control" name="CreatedBy" placeholder="Masukan Premi">
                                                    </div>
                                                </div>
                                            </div> --}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
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
                                    <h4 class="modal-title">Delete Data PPKS</h4>    
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">apakah ada yakin untuk menghapus Data PPKS ini?</p>
                                    <form action="{{ route('Data-PPKS.destroy',$product->id) }}" method="POST">
                                        <div class="modal-footer center">
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                @csrf
                                                @method('DELETE')
                                                @can('PKH-Delete')
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