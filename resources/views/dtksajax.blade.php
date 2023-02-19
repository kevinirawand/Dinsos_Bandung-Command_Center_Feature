@extends('adminlte::page')
@section('content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />   
<style>
    .form-control {
    border-radius: 0;
    box-shadow: none;
    border-color: #d2d6de
}

.select2-hidden-accessible {
    border: 0 !important;
    clip: rect(0 0 0 0) !important;
    height: 1px !important;
    margin: -1px !important;
    overflow: hidden !important;
    padding: 0 !important;
    position: absolute !important;
    width: 1px !important
}

.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
}

.select2-container--default .select2-selection--single,
.select2-selection .select2-selection--single {
    border: 1px solid #d2d6de;
    border-radius: 0;
    padding: 6px 12px;
    height: 34px
}

.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px
}

.select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 28px;
    user-select: none;
    -webkit-user-select: none
}

.select2-container .select2-selection--single .select2-selection__rendered {
    padding-right: 10px
}

.select2-container .select2-selection--single .select2-selection__rendered {
    padding-left: 0;
    padding-right: 0;
    height: auto;
    margin-top: -3px
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px
}

.select2-container--default .select2-selection--single,
.select2-selection .select2-selection--single {
    border: 1px solid #d2d6de;
    border-radius: 0 !important;
    padding: 6px 12px;
    height: 40px !important
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 6px !important;
    right: 1px;
    width: 20px
}
</style>
<section>

        <div class="container p-4  ">
            <div class="container bg-dark p-2">

                <!-- Dari Sini -->
                <form action="{{ route('search.filter') }}" method="GET" enctype="multipart/form-data">
                    <div class="row">
                        <strong class="m-2">Filter Data</strong>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control select2" aria-label="Default select example" name="nama_kecamatan" id='kecamatan' aria-placeholder="Cari">
                                            <option class="text-left" value=''>Kecamatan</option>
                                            @foreach ($kecamatan as $item)
                                                <option value="{{ $item->Nama_Kecamatan }}" {{ @$dataFilter['nama_kecamatan'] == $item->Nama_Kecamatan ? 'selected' : '' }} >{{ $item->Nama_Kecamatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control select2" aria-label="Default select example" name="nama_kelurahan" id='cari' aria-placeholder="Cari">
                                            <option class="text-left" value=''>Kelurahan/Desa</option>
                                            @foreach ($kelurahan as $item)
                                                <option value="{{ $item->nama_kelurahan}}">{{ $item->nama_kelurahan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input placeholder="Nama" type="text" class="form-control" name="nama" id="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input placeholder="NIK" type="text" class="form-control" name="nik" id="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input placeholder="No KK" type="text" class="form-control" name="nokk" id="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input placeholder="PSNOKA" type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        {{-- 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" aria-label="Default select example" name="filter_field[]" id='cari' aria-placeholder="Cari">
                                            <option class="text-left" value=''>Filter Status</option>
                                            <option value='u.Nama'>Nama</option>
                                            <option value='u.Nik'>Nik</option>
                                            <option value='u.Alamat' >Alamat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" aria-label="Default select example" name="filter_field[]" id='cari' aria-placeholder="Cari">
                                            <option class="text-left" value=''>Filter Disabilitas</option>
                                            <option value='u.Nama'>Nama</option>
                                            <option value='u.Nik'>Nik</option>
                                            <option value='u.Alamat' >Alamat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" aria-label="Default select example" name="filter_field[]" id='cari' aria-placeholder="Cari">
                                            <option class="text-left" value=''>Filter Penilaian SIKS-GIS</option>
                                            <option value='u.Nama'>Nama</option>
                                            <option value='u.Nik'>Nik</option>
                                            <option value='u.Alamat' >Alamat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <Strong class="m-2">Jenis Bansos</Strong>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2 m-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            PKH
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 m-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            BPNT
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 m-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            BST
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 m-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            BPNT PPKM
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 m-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            BPNT EKSTREAM
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 m-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            BLT Minyak Goreng
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 m-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            BLT Tambahan
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 m-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            PBI
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 m-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            RUTILAHU
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 m-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            NON BANSOS
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="text-right my-2">
                        <button id="btnFilter" class="submit btn btn-info w-25">Cari</button>
                    </div>
            </form>
            </div>
            @if($dataDTKS)
                <table class="text-center mt-3"  id="data-tabe" width='100%' border="1" style='border-collapse: collapse;'>
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nik</th>
                            {{-- <th>BPNT</th>
                            <th>PKH</th>
                            <th>UMKM</th>
                            <th>BLT BBM</th>
                            <th>PBI</th>
                            <th>blt minyak goreng</th> --}}
                            <th>Alamat</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            {{--<th>SK DTKS</th>
                            <th>BLT BANSOS</th>
                            <th>Penerima</th>
                            <th>PS NOKA</th>
                            <th>PKH</th>
                            <th>KPM</th>
                            <th>BLT BBM</th>
                            <th>PPKS</th>--}}
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($dataDTKS as $index => $item)
                    <tr>
                        <td>{{  $item->id ?? '-' }}</td>
                        <td>{{ $item->Nama ?? '-' }}</td>
                        <td>{{ $item->Nik ?? '-' }}</td>
                        <td>{{ $item->Alamat ?? '-' }}</td>
                        <td>{{ $item->Kecamatan ?? '-' }}</td>
                        <td>{{ $item->Desa_Kelurahan ?? '-' }}</td>
                        {{-- <td>{{ $item->Sk_Dtks ??'BelumTermasukBantuan'  }}</td>
                        <td>{{ $item->Bansos_BLT_BBM ?? 'Belum Termasuk Bantuan' }}</td>
                        <td>{{ $item->Nama_Penerima ?? 'Belum Termasuk Bantuan' }}</td>
                        <td>{{ $item->Ps_Noka ?? 'Belum Termasuk Bantuan'}}</td>
                        <td>{{ $item->Data_Bansos_Pkh ?? 'Belum Termasuk Bantuan' }}</td>
                        <td>{{ $item->KPM_Bansos ?? 'Belum Termasuk Bantuan' }}</td>
                        <td>{{ $item->BLT_BBM ?? 'Belum Termasuk Bantuan' }}</td>
                        <td>-</td>--}}
                        <td>
                            <a class="btn " href="{{ route('search.show', $item->id) }}">
                                <button type="button" class="d-flex btn btn-primary">View Details</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
            {!! $dataDTKS->appends($_GET)->links() !!}
            @endif
        </div>
        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                            <div class="container rounded bg-white">
                                <div class="row">
                                    <div class="col-md-3 border-right">
                                        <div class="d-flex flex-column align-items-center text-center"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <div class="">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="text-right">Profile Settings</h4>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6"><label class="labels">Name</label><input type="text" id="Nama" name="Nama" class="form-control" placeholder="first name" value=""></div>
                                                <div class="col-md-6"><label class="labels">Surname</label><input type="text" id="Nik" name="Nik" class="form-control" value="" placeholder="surname"></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12"><label class="labels">PKH</label><input type="text" id="PKH" name="PKH" class="form-control" placeholder="enter phone number" value=""></div>
                                                <div class="col-md-12"><label class="labels">pbi</label><input type="text" id="Ps_Noka" name="Ps_Noka" class="form-control" placeholder="enter address line 1" value=""></div>
                                                <div class="col-md-12"><label class="labels">blt_minyak_gorengs</label><input type="text" id="Sk_Dtks" name="Sk_Dtks" class="form-control" placeholder="enter address line 2" value=""></div>
                                                <div class="col-md-12"><label class="labels">data_umkm</label><input type="text" id="BLT_BBM" name="BLT_BBM" class="form-control" placeholder="enter address line 2" value=""></div>
                                                <div class="col-md-12"><label class="labels">data_bpnt</label><input type="text" id="Nama_Penerima" name="Nama_Penerima" class="form-control" placeholder="enter address line 2" value=""></div>
                                                {{-- <div class="col-md-12"><label class="labels">Postcode</label><input type="text" id="BLT_BBM" name="BLT_BBM" class="form-control" placeholder="enter address line 2" value=""></div> --}}
                                            </div>
                                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3 py-5">
                                            <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                                            <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                                            <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
                $('.select2').select2({
                closeOnSelect: false
            });
        });
    </script>
@endsection  