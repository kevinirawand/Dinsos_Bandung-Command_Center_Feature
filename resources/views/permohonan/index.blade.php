@extends('adminlte::page')
@section('content')

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <div class="row">
        <div class="col-lg-12 margin-tb p-4">
            <div class="pull-left">
                <h2>Data permohonan</h2>
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
            <div class="pull-right">
                    @can('Permohonan-Create')
                        <a class="btn btn-success" data-toggle="modal" data-target="#CreateNewDtks">Buat permohonan</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Import Data permohonan</button>
                        <a class="btn btn-warning float-end"  href="/Permohonan/export_excel_permohonan">Export Data Pengaduan </a>
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Import Data permohonan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="post" action="{{ route('import_permohonan') }}" enctype="multipart/form-data">
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
                                        <h4 class="modal-title">Create New Data permohonan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="quickForm" action="{{ route('permohonan.store') }}" method="POST" enctype="multipart/form-data">
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
                                                        <strong>Nama :</strong>
                                                        <input class="form-control" name="Nama" placeholder="Masukan Nama Depan" >
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="Jenis_Permohonan">Jenis Permohonan</label>
                                                    <select id="Jenis_Permohonan" name="Jenis_Permohonan" class="form-control">
                                                      <option name ="Jenis_Permohonan" selected>pilih...</option>
                                                      <option value = "Suket">Suket</option>
                                                      <option value = "Reaktivasi BPJS">Reaktivasi BPJS </option>
                                                    </select>
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
            <table id="example" class="table table-bordered  text-center">
                <thead>
                    <tr>
                        <th width="2%">No</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>File Permohonan</th>
                        <th>Jenis Permohonan</th>
                        <th width="250px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        {{-- @if ($product->Nm == Auth::user()->name) --}}
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $product->Nik }}</td>
                                <td>{{ $product->Nama  }}</td>
                                <td>{{ $product->Jenis_Permohonan  }}</td>
                                <td>
                                    @if (empty($product->File_Permohonan))
                                        <a class="btn btn-info disabled" data-toggle="modal" data-target="#lihatfile{{$product->id}}" >file {{ $product->Jenis_Permohonan }} belum ada</a>
                                    @else
                                        <a class="btn btn-info" data-toggle="modal" data-target="#lihatfile{{$product->id}}">Lihat File {{ $product->Jenis_Permohonan }} </a>
                                    @endif
                                </td>
                                <td>
                                        <a class="btn btn-info" data-toggle="modal" data-target="#details{{$product->id}}">Show</a>
                                        @can('Permohonan-Edit')
                                        <a class="btn btn-primary" data-toggle="modal" data-target="#update{{$product->id}}">Edit</a>
                                        @endcan
                                    
                                        @can('Permohonan-Delete')
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#Delete{{$product->id}}">Delete</button>
                                        @endcan
                                </td>
                            </tr>
                            
                            <div id="lihatfile{{$product->id}}" class="modal fade primary" role="dialog">
                                <div class="modal-dialog modal-xl">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title">Show File Pengajuan Permohonan </h4>    
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <embed  src="{{asset('/File_Permohonan/' . $product->File_Permohonan)}}" width="1000px" height="2100"/>
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
                            <div id="update{{$product->id}}" class="modal fade primary" role="dialog">
                                <div class="modal-dialog modal-xl">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title">Update Data permohonan</h4>    
                                            
                                        </div>
                                        <div class="modal-body">
                                
                                            <form action="{{ route('permohonan.update',[$product->id]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Nik :</strong>
                                                            <input class="form-control" name="Nik" placeholder="Masukan Nik" value="{{ $product->Nik }}" >
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>Nama :</strong>
                                                            <input class="form-control" name="Nama" placeholder="Masukan Nama" value="{{ $product->Nama }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <strong>masukan file permohonan :</strong>
                                                            <input class="form-control" type="file" name="File_Permohonan" placeholder="Masukan status" value="{{ $product->File_Permohonan }}">
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
                                            <h4 class="modal-title">Show Data permohonan</h4>    
                                            
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Nik :</strong>
                                                        <input class="form-control" name="Nik" placeholder="Masukan Nik" value="{{ $product->Nik }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <strong>Nama permohonan:</strong>
                                                        <input class="form-control" name="Nama" placeholder="Masukan Nama" value="{{ $product->Nama }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kelurahan :</label>
                                                        <input type="text" name="Deskrpisi" class="form-control" placeholder="Masukan Deskrpisi" value="{{ $product->Kelurahan }}"disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jenis Permohonan :</label>
                                                        <input type="text" name="Deskrpisi" class="form-control" placeholder="Masukan Deskrpisi" value="{{ $product->Jenis_Permohonan }}"disabled>
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
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h4 class="modal-title">Delete Data permohonan</h4>    
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center">apakah ada yakin untuk menghapus Data permohonan ini?</p>
                                            <form action="{{ route('permohonan.destroy',$product->id) }}" method="POST">
                                                <div class="modal-footer center">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        @csrf
                                                        @method('DELETE')
                                                        {{-- @can('UMKM-delete') --}}
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        {{-- @endcan --}}
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
        
   {{-- <div class="d-flex justify-content-center">
    {!! $products->links() !!}
</div> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        
        var table = $('#example').DataTable({
                        paging: false,
                        ordering: false,
                        info: false,
                        "columnDefs": [
                                { "width": "20%", "targets": 0 }
                            ]
                    });
          
        $("#example thead tr td").each( function ( i ) {
            
            var select = $('<select><option value=""></option></select>')
                .appendTo( $(this).empty() )
                .on( 'change', function () {
                    table.column( i )
                        .search( $(this).val() )
                        .draw();
                } );
    
            table.column( i ).data().unique().sort().each( function ( d, j ) {
                select.append( '<option value="'+d+'" width="1px">'+d+'</option>' )
            } );
        } );
    } );
   
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