@extends('adminlte::page')
@section('content')

    <section>

        <div class="container-fluid rounded bg-white">
            <div class="row">
                <div class="col-md-9 border-right">
                    <div class="">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Detail Data</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">NIK</label><input type="text"  name="Nik" class="form-control" placeholder="-" value="{{  @$dataDTKS->Nik }}"></div>
                            <div class="col-md-6"><label class="labels">NAMA</label><input type="text" name="Nama" class="form-control" value="{{  @$dataDTKS->Nama }}" placeholder="-"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">SK DTKS</label><input type="text" id="PKH" name="SK" class="form-control" placeholder="-" value="{{  @$dataDTKS->Sk_Dtks }}"></div>
                            <div class="col-md-12"><label class="labels">PKH</label><input type="text" id="PKH" name="Data_Bansos_Pkh" class="form-control" placeholder="-" value="{{  @$dataDTKS->Data_Bansos_Pkh }}"></div>
                            <div class="col-md-12"><label class="labels">PS Noka</label><input type="text" id="" name="" class="form-control" placeholder="-" value="{{  @$dataDTKS->Ps_Noka }}"></div>
<!-- {{--                             <div class="col-md-12"><label class="labels">BLT BBM</label><input type="text" name="BLT_BBM" class="form-control" placeholder="-" value=""></div> --}} -->
                            <div class="col-md-12"><label class="labels">BLT Bansos</label><input type="text" name="BLT_BANSOS" class="form-control" placeholder="-" value="{{  @$dataDTKS->BLT_BBM }}"></div>
                            <div class="col-md-12"><label class="labels">KPM</label><input type="text" id="" name="" class="form-control" placeholder="-" value="{{  @$dataDTKS->KPM_Bansos }}"></div>
                            <div class="col-md-12"><label class="labels">Nama Penerima</label><input type="text" id="Nama_Penerima" name="Nama_Penerima" class="form-control" placeholder="-" value="{{  @$dataDTKS->Nama_Penerima }}"></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                    </div>
                </div>
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{  @$dataDTKS->Nama }}</span></div>
                </div>
            </div>
        </div>
  
    </section>

@endsection 
