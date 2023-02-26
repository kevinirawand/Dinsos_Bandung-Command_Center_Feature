@extends('adminlte::page')
@section('content')
<div class="row my-5">
    <div class="col-sm-6">
      <div class="card">
        <div class="card">
          <div class="card-header text-center">
            Data PKH
          </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pkh as $item)
                        <tr>
                                <td>{{  $item->Nik  }}</td>
                                <td>{{  $item->Nama_Penerima    }}</td>
                                <td>{{  $item->Alamat  }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card">
          <div class="card-header text-center">
            Data BPNT
          </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                  <th>Nik</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($bpnt as $item)
                    <tr>
                            <td>{{  $item->Nik  }}</td>
                            <td>{{  $item->Nama_Penerima  }}</td>
                            <td>{{  $item->Alamat  }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card">
          <div class="card-header text-center">
            Data PBI Daerah
          </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                  <th>Nik</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($pbi as $item)
                    <tr>
                            <td>{{  $item->Nik  }}</td>
                            <td>{{  $item->Nama  }}</td>
                            <td>{{  $item->Alamat  }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card">
          <div class="card-header text-center">
            Data umkm
          </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nik</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($umkm as $item)
                    <tr>
                            <td>{{  $i++  }}</td>
                            <td>{{  $item->Nik  }}</td>
                            <td>{{  $item->Nama_depan  }}</td>
                            <td>{{  $item->Alamat  }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card">
          <div class="card-header text-center">
            Data BLT BBM
          </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                  <th>Nik</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($blt as $item)
                    <tr>
                            <td>{{  $item->Nik  }}</td>
                            <td>{{  $item->Nama  }}</td>
                            <td>{{  $item->Alamat  }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

@endsection