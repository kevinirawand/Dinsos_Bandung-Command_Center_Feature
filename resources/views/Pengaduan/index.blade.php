@extends('adminlte::page')
@section('content')

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <div class="row">
        <div class="col-lg-12 margin-tb p-4">
            <div class="pull-left">
                <h2>Data Pengaduan</h2>
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
                    @can('Pengaduan-Create')
                        <a class="btn btn-success" data-toggle="modal" data-target="#CreateNewDtks">Buat Pengaduan</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Import Data Pengaduan</button>
                        <a class="btn btn-warning float-end"  href="/Pengaduan/export_excel">Export Data Pengaduan </a>
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Import Data Pengaduan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="post" action="{{ route('import_pengaduan') }}" enctype="multipart/form-data">
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
                                        <h4 class="modal-title">Create New Data Pengaduan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="quickForm" action="{{ route('pengaduan-Menu.store') }}" method="POST" enctype="multipart/form-data">
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
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Deskrpisi :</label>
                                                        <input type="text" name="Deskrpisi" class="form-control" placeholder="Masukan Deskrpisi">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Upload Media :</label>
                                                        <input class="form-control" type="file" name="upload_media" placeholder="Masukan status">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    @if (Auth::user()->id == '1')
                                                    <div class="form-group">
                                                        <label>status :</label>
                                                        <input class="form-control" name="Status" placeholder="Masukan status" >
                                                    </div>
                                                    @else
                                                    <div class="form-group">
                                                        <label>status :</label>
                                                        <input class="form-control" name="Status" placeholder="Masukan status" disabled>
                                                    </div>
                                                    @endif
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
                        <th>Status</th>
                        <th>media Pengaduan</th>
                        <th width="250px">Action</th>
                    </tr>
                    <tr>
                        <td ></td>
                        <td>Nik</td>
                        <td>Nama</td>
                        <td>Status</td>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        {{-- @if ($product->Nm == Auth::user()->name) --}}
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $product->Nik }}</td>
                                <td>{{ $product->Nama  }}</td>
                                <td>{{ $product->Status }}</td>
                                <td><a class="btn btn-info" data-toggle="modal" data-target="#pdf{{$product->Id_Pengaduan}}">Show Upload Media Pengaduan</a></td>
                                {{-- <td> <embed  src="{{asset('upload_media/' . $product->Upload_Media)}}" style="  border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px;" alt="..."/></td> --}}
                                {{-- <td>{{ $product->Alamat }}</td> --}}
                                <td>
                                        @can('Pengaduan-List')
                                            <a class="btn btn-info" data-toggle="modal" data-target="#details{{$product->Id_Pengaduan}}">Show</a>
                                        @endcan
                                        @can('Pengaduan-Edit')
                                            <a class="btn btn-primary" data-toggle="modal" data-target="#update{{$product->Id_Pengaduan}}">Edit</a>
                                        @endcan
                                    
                                        @can('Pengaduan-Delete')
                                        @if ($product->Status )
                                            @if ( (Auth::user()->id == '1'))
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#Delete{{$product->Id_Pengaduan}}">Delete</button>
                                            @else
                                                {{-- <button class="btn btn-danger" data-toggle="modal" data-target="#Delete{{$product->Id_Pengaduan}}" readonly>pengaduan</button> --}}
                                            @endif
                                        @else
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#Delete{{$product->Id_Pengaduan}}">Delete</button>
                                        @endif
                                           
                                        @endcan
                                </td>
                            </tr>
                            {{-- @else --}}
                            {{-- <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $product->Nik }}</td>
                                <td>{{ $product->Nama  }}</td>
                                <td>{{ $product->Status }}</td>
                                <td><a class="btn btn-info" data-toggle="modal" data-target="#pdf{{$product->Id_Pengaduan}}">Show Upload Media Pengaduan</a></td> --}}
                                {{-- <td> <embed  src="{{asset('upload_media/' . $product->Upload_Media)}}" style="  border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px;" alt="..."/></td> --}}
                                {{-- <td>{{ $product->Alamat }}</td> --}}
                                {{-- <td>
                                        <a class="btn btn-info" data-toggle="modal" data-target="#details{{$product->Id_Pengaduan}}">Show</a>
                                        @can('Pengaduan-edit')
                                        <a class="btn btn-primary" data-toggle="modal" data-target="#update{{$product->Id_Pengaduan}}">Edit</a>
                                        @endcan
                                    
                                        @can('Pengaduan-delete')
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#Delete{{$product->Id_Pengaduan}}">Delete</button>
                                        @endcan
                                </td>
                            </tr> --}}
           
                        {{-- @endif --}}
                            <div id="update{{$product->Id_Pengaduan}}" class="modal fade primary" role="dialog">
                                <div class="modal-dialog modal-xl">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title">Update Data Pengaduan</h4>    
                                            
                                        </div>
                                        <div class="modal-body">
                                
                                            <form action="{{ route('pengaduan-Menu.update',[$product->Id_Pengaduan]) }}" method="POST" enctype="multipart/form-data">
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
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Deskrpisi :</label>
                                                            <input type="text" name="Deskrpisi" class="form-control" placeholder="Masukan Deskrpisi" value="{{ $product->Deskrpisi }}" >
                                                        </div>
                                                    </div>
                                                    @if (Auth::user()->id == '1')
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>status :</label>
                                                                    <input class="form-control" name="Status" placeholder="Masukan status" value="{{ $product->Status }}" >
                                                                </div>
                                                            </div>
                                                     @else
                                                        <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="disabledTextInput">status :</label>
                                                                    <input class="form-control" name="Status" placeholder="Masukan status" value="{{ $product->Status }}" readonly>
                                                                </div>
                                                        </div>
                                                    @endif
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>upload media :</label>
                                                            <input class="form-control" type="file" name="Upload_Media" placeholder="Masukan status" value="{{ $product->Upload_Media }}">
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
                            <div id="details{{$product->Id_Pengaduan}}" class="modal fade primary" role="dialog">
                                <div class="modal-dialog modal-xl">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title">Show Data Pengaduan</h4>    
                                            
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
                                                        <strong>Nama :</strong>
                                                        <input class="form-control" name="Nama" placeholder="Masukan Nama" value="{{ $product->Nama }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Deskrpisi :</label>
                                                        <input type="text" name="Deskrpisi" class="form-control" placeholder="Masukan Deskrpisi" value="{{ $product->Deskrpisi }}"disabled>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>status :</label>
                                                        <input class="form-control" name="Status" placeholder="Masukan status" value="{{ $product->Status }}" disabled>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>upload media :</label>
                                                        <input class="form-control" name="upload_media" placeholder="Masukan Sk_Dtks" value="{{ $product->Upload_Media }}" disabled>
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
                            <div id="pdf{{$product->Id_Pengaduan}}" class="modal fade primary" role="dialog">
                                <div class="modal-dialog modal-xl">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title">Show Upload Media Pengaduan</h4>    
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <embed  src="{{asset('/upload_media/' . $product->Upload_Media)}}" width="1000px" height="2100"/>
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
                            <div id="Delete{{$product->Id_Pengaduan}}" class="modal fade primary mt-10" role="dialog">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h4 class="modal-title">Delete Data Pengaduan</h4>    
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center">apakah ada yakin untuk menghapus Data Pengaduan ini?</p>
                                            <form action="{{ route('pengaduan-Menu.destroy',$product->Id_Pengaduan) }}" method="POST">
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