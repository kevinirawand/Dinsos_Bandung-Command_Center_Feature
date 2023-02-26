@extends('adminlte::page')

@section('content')

<div class="container mt-3 pd-3">

    <h2>Ajax Live Search Page</h2>
    <hr>

    <div class="row justify-content-center">
        <div class="col-md-4">
         {{-- <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control" aria-label="Default select example" name="nama_kecamatan" id='Search' aria-placeholder="Cari">
                            <option class="text-left" value=''>Kecamatan</option>
                            @foreach ($kecamatan as $item)
                                <option value="{{ $item->Nama_Kecamatan }}" {{ @$dataFilter['nama_kecamatan'] == $item->Nama_Kecamatan ? 'selected' : '' }} >{{ $item->Nama_Kecamatan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control" aria-label="Default select example" name="nama_kelurahan" id='search2' aria-placeholder="Cari">
                            <option class="text-left" value=''>Kelurahan/Desa</option>
                            @foreach ($kelurahan as $item)
                                <option value="{{ $item->nama_kelurahan}}">{{ $item->nama_kelurahan}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div> --}}
            <div class="input-group">
                <input type="" id="search" name="search" class="form-control rounded" placeholder="Search" />
            </div>
            <div class="input-group">
               <input type="search" id="search2" name="search" class="form-control rounded" placeholder="Search" />
           </div>
        </div>
    </div>
        
        <div class="col-md-8">
            <table class="text-center mt-3"  id="data-tabe" width='100%' border="1" style='border-collapse: collapse;'>
                <thead class="text-center">
                    <tr>
                        {{-- <th>No</th> --}}
                        <th>Nama</th>
                        <th>Nik</th>
                        {{-- <th>BPNT</th>
                        <th>PKH</th>
                        <th>UMKM</th>
                        <th>BLT BBM</th>
                        <th>PBI</th>
                        <th>blt minyak goreng</th> --}}
                        {{-- <th>Alamat</th> --}}
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
                        {{-- <th>action</th> --}}
                    </tr>
                </thead>
                <tbody class="mycard">
                 
                </tbody>
                {{-- {!! $products->links() !!} --}}
            </table>
        </div>
    </div>

</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>


<script>

    $(document).ready(function () {
        $('#search').on('keyup', function(){
            var value = $(this).val();
            $.ajax({
                type: "get",
                url: "/search",
                data: {'search':value},
                success: function (data) {
                    $('.mycard').html(data);
                }
            });

        });
    });
    $(document).ready(function () {
        $('#search2').on('keyup', function(){
            var value = $(this).val();
            $.ajax({
                type: "get",
                url: "/search",
                data: {'search2':value},
                success: function (data) {
                    $('.mycard').html(data);
                }
            });

        });
    });

</script>
@endsection
