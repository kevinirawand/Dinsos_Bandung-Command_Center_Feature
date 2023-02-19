@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('Dtks.index') }}"> Back</a>
            </div>
        </div>
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
						<strong>TANGGAL LAHIR :</strong>
						 <input type="date" class="form-control" name="Tanggal_Lahir" placeholder="Masukan TANGGAL LAHIR">
					</div>
				</div>
					<div class="col-sm-6">
					<div class="form-group">
						<strong>TEMPAT LAHIR :</strong>
						<input class="form-control" name="Tempat_Lahir" placeholder="Masukan TEMPAT LAHIR">
					</div>
				</div>
			</div> 
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<strong>jenis kelamin :</strong>
						<input class="form-control" name="Jenis_Kelamin" placeholder="Masukan JENIS">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<strong>Pekerjaan :</strong>
						<input class="form-control" name="Pekerjaan" placeholder="Masukan JENIS">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<strong>Nama Ibu Kandung :</strong>
						<input class="form-control" name="Nama_Ibu_Kandung" placeholder="Masukan JENIS">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<strong>Hub Keluarga :</strong>
						<input class="form-control" name="Hub_Keluarga" placeholder="Masukan JENIS">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<strong>Keterangan padan :</strong>
						<input class="form-control" name="Keterangan_padan" placeholder="Masukan JENIS">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<strong>Bansos BPNT :</strong>
						<input class="form-control" name="Bansos_Bpnt" placeholder="Masukan JENIS">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<strong>Bansos PKH :</strong>
						<input class="form-control" name="Bansos_Pkh" placeholder="Masukan JENIS">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<strong>Bansos BNPNT PPKM :</strong>
						<input class="form-control" name="Bansos_Bnpnt_Ppkm" placeholder="Masukan JENIS">
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Pbi_Jni:</strong>
					<input class="form-control" name="Pbi_Jni" placeholder="Masukan JENIS">
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>


<p class="text-center text-primary"><small>Dinas sosial</small></p>
@endsection