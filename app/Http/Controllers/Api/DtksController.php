<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dtks;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;
class DtksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = DB::table('dtks')
        ->select('dtks.Nik','data_umkm.DTKS','data_bpnt.Bansos')
        ->leftJoin('data_bpnt', 'dtks.Nik', '=', 'data_bpnt.Nik')
        ->leftJoin('data_umkm', 'dtks.Nik', '=', 'data_umkm.Nik')
        ->where('dtks.Nik', 'like', '%3273010209820002%')
        ->get()
        ->toArray();
        return response()->json([
            $products
        ]);
     
    }
    public function search($cari)
    {
        $find = $cari;
      
        $products = DB::table('dtks')
        ->select('dtks.Nik','data_umkm.BLT_BBM','data_bpnt.Bansos')
        ->leftJoin('data_bpnt', 'dtks.Nik', '=', 'data_bpnt.Nik')
        ->leftJoin('data_umkm', 'dtks.Nik', '=', 'data_umkm.Nik')
       	->where('dtks.Nik','like',"%".$find."%")
        ->get()
        ->toArray();
        return Response()->json($products);
        
          
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'Nama' => 'required',
            'Id_DTKS' => 'required',
            'Provinsi' => 'required',
            'Kabupaten_Kota' => 'required',
            'Kecamatan' => 'required',
            'Desa_Kelurahan' => 'required',
            'Alamat' => 'required',
            'Dusun' => 'required',
            'RT' => 'required',
            'RW' => 'required',
            'Nokk' => 'required',
            'Nik' => 'required',
            'Tanggal_Lahir' => 'required',
            'Tempat_Lahir' => 'required',
            'Jenis_Kelamin' => 'required',
            'Pekerjaan' => 'required',
            'Nama_Ibu_Kandung' => 'required',
            'Keterangan_padan' => 'required',
            'Hub_Keluarga' => 'required',
            'Bansos_Bpnt' => 'required',
            'Bansos_Pkh' => 'required',
            'Bansos_Bnpnt_Ppkm' => 'required',
            'Pbi_Jni' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $insert  = Dtks::create($request->all());
        return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $insert);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
