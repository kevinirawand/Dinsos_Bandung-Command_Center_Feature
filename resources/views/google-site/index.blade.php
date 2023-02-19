@extends('adminlte::page')
@section('content')

<h3 class="mt-4 mb-4">Google-Site Data </h3>
<div class="row">
    <div class="col-md-4">
      <!-- Widget: user widget style 2 -->
      <div class="card card-widget widget-user-2">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-warning">
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="{{ asset('images/avatar-01.png') }}" alt="User Avatar">
          </div>
          <!-- /.widget-user-image -->
          <h3 class="widget-user-username">Google Site Data DTKS</h3>
          <h5 class="widget-user-desc">Tahun 2022</h5>
        </div>
        <div class="card-footer p-0">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a href="https://sites.google.com/view/usulandtksbdg/home" class="nav-link" style="font-size: 20px;"> 
                Usulan Dtks <span class="float-right badge bg-primary ">31</span>
              </a>
            </li>
            <li class="nav-item">
                <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">Jumlah Viewer</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text">Jumlah Data Keseluruhan</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header">35</h5>
                            <span class="description-text">Jumlah Kelurahan</span>
                        </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
            </li>
            <li class="nav-item text-center">
                <button class="btn btn-success m-2" data-toggle="modal" data-target="#update">Edit Google-Site</button>
                <button class="btn btn-danger m-2" data-toggle="modal" data-target="#Delete">Delete Google-Site</button>
            </li>
          </ul>
        </div>
        <div id="update" class="modal fade primary" role="dialog">
            <div class="modal-dialog modal-xl">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Update Data permohonan</h4>    
                        
                    </div>
                    <div class="modal-body">
            
                        {{-- <form action="{{ route('permohonan.update',[$product->Id_Permohonan]) }}" method="POST" enctype="multipart/form-data"> --}}
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>Nik :</strong>
                                        <input class="form-control" name="Nik" placeholder="Masukan Nik">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>Nama :</strong>
                                        <input class="form-control" name="Nama" placeholder="Masukan Nama">
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
      </div>
      <!-- /.widget-user -->
    </div>
    <!-- /.col -->
    <div class="col-md-4">
        <!-- Widget: user widget style 2 -->
        <div class="card card-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-warning">
            <div class="widget-user-image">
              <img class="img-circle elevation-2" src="{{ asset('images/avatar-01.png') }}" alt="User Avatar">
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username">Google Site Data DTKS</h3>
            <h5 class="widget-user-desc">Tahun 2022</h5>
          </div>
            <div class="card-footer p-0">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="https://sites.google.com/view/usulandtksbdg/home" class="nav-link" style="font-size: 20px;"> 
                        Usulan Dtks <span class="float-right badge bg-primary ">31</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                <h5 class="description-header">3,200</h5>
                                <span class="description-text">Jumlah Viewer</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                <h5 class="description-header">13,000</h5>
                                <span class="description-text">Jumlah Data Keseluruhan</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">35</h5>
                                    <span class="description-text">Jumlah Kecamatan</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </li>
                    <li class="nav-item text-center">
                        <button class="btn btn-success m-2" data-toggle="modal" data-target="#update">Edit Google-Site</button>
                        <button class="btn btn-danger m-2" data-toggle="modal" data-target="#Delete">Delete Google-Site</button>
                    </li>
                </ul>
            </div>
          <div id="update" class="modal fade primary" role="dialog">
              <div class="modal-dialog modal-xl">
                  <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header bg-primary">
                          <h4 class="modal-title">Update Data permohonan</h4>    
                          
                      </div>
                      <div class="modal-body">
              
                          {{-- <form action="{{ route('permohonan.update',[$product->Id_Permohonan]) }}" method="POST" enctype="multipart/form-data"> --}}
                              @csrf
                              @method('PUT')
                              <div class="row">
                                  <div class="col-6">
                                      <div class="form-group">
                                          <strong>Nik :</strong>
                                          <input class="form-control" name="Nik" placeholder="Masukan Nik">
                                      </div>
                                  </div>
                                  <div class="col-6">
                                      <div class="form-group">
                                          <strong>Nama :</strong>
                                          <input class="form-control" name="Nama" placeholder="Masukan Nama">
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
            <div id="Delete" class="modal fade primary mt-10" role="dialog">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h4 class="modal-title">Delete Data permohonan</h4>    
                        </div>
                        <div class="modal-body">
                            <p class="text-center">apakah ada yakin untuk menghapus Data permohonan ini?</p>
                            {{-- <form action="{{ route('permohonan.destroy',$product->Id_Permohonan) }}" method="POST"> --}}
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
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.widget-user -->
      </div>
</div>

{{-- <div class="col-md-9">
    <div class="card">
    <div class="card-header p-2">
        <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
        </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content">
            <div class="active tab-pane" id="activity">
                
            </div>
        
            <div class="tab-pane" id="timeline">
            </div>
        <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
</div> --}}
@endsection