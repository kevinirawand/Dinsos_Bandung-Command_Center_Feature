<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_Ppks;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DataPpksController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:PPKS-List|PPKS-Create|PPKS-Edit|PPKS-Delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:PPKS-Create', ['only' => ['create','store']]);
    //      $this->middleware('permission:PPKS-Edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:PPKS-Delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Data_Ppks::orderBy('created_at', 'DESC')->paginate(400);
        // dd($products);
        return view('data_ppks.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 400);
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
        $update = new Data_Ppks;
        $update['Kategori_Ppks'] = $request->get('Kategori_Ppks');
        $update['Kondisi_Kedisabilitasan'] = $request->get('Kondisi_Kedisabilitasan');
        $update['Ragam_Disabilitas'] = $request->get('Ragam_Disabilitas');
        $update['No_KK'] = $request->get('No_KK');
        $update['Nik'] = $request->get('Nik');
        $update['Nama_Lengkap'] = $request->get('Nama_Lengkap');
        $update['Jenkel'] = $request->get('Jenkel');
        $update['Tempat_Lahir'] = $request->get('Tempat_Lahir');
        $update['Tanggal_Lahir'] = $request->get('Tanggal_Lahir');
        $update['Agama'] = $request->get('Agama');
        $update['Pendidikan_Terakhir'] = $request->get('Pendidikan_Terakhir');
        $update['Pekerjaan'] = $request->get('Pekerjaan');
        $update['Status_Kawin'] = $request->get('Status_Kawin');
        $update['Shdk_Duk'] = $request->get('Shdk_Duk');
        $update['Nama_Ibu_Kandung'] = $request->get('Nama_Ibu_Kandung');
        $update['Kecamatan'] = $request->get('Kecamatan');
        $update['Kelurahaan'] = $request->get('Kelurahaan');
        $update['Alamat'] = $request->get('Alamat');
        $update['Rt'] = $request->get('Rt');
        $update['Rw'] = $request->get('Rw');
        $update['Ppks_Tinggal'] = $request->get('Ppks_Tinggal');
        $update['Status_Dtks'] = $request->get('Status_Dtks');
        $update['BPNT'] = $request->get('BPNT');
        $update['PKH'] = $request->get('PKH');
        $update['Pbi_Jkn'] = $request->get('Pbi_Jkn');
        $update['Jenis_Bansos'] = $request->get('Jenis_Bansos');
        $update['Status_Bansos'] = $request->get('Status_Bansos');
        $update['Hubungan_Keluarga'] = $request->get('Hubungan_Keluarga');
        $update['Status_Duk'] = $request->get('Status_Duk');
        $update['CreatedBy'] = Auth::user()->name;
        $update->save();
    // dd($request);
    Data_Ppks::create($request->all());
        return redirect()->route('Data-PPKS.index')
                        ->with('masuk','Data Ppks created successfully.');
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
        $update['Kategori_Ppks'] = $request->get('Kategori_Ppks');
        $update['Kondisi_Kedisabilitasan'] = $request->get('Kondisi_Kedisabilitasan');
        $update['Ragam_Disabilitas'] = $request->get('Ragam_Disabilitas');
        $update['No_KK'] = $request->get('No_KK');
        $update['Nik'] = $request->get('Nik');
        $update['Nama_Lengkap'] = $request->get('Nama_Lengkap');
        $update['Jenkel'] = $request->get('Jenkel');
        $update['Tempat_Lahir'] = $request->get('Tempat_Lahir');
        $update['Tanggal_Lahir'] = $request->get('Tanggal_Lahir');
        $update['Agama'] = $request->get('Agama');
        $update['Pendidikan_Terakhir'] = $request->get('Pendidikan_Terakhir');
        $update['Pekerjaan'] = $request->get('Pekerjaan');
        $update['Status_Kawin'] = $request->get('Status_Kawin');
        $update['Shdk_Duk'] = $request->get('Shdk_Duk');
        $update['Nama_Ibu_Kandung'] = $request->get('Nama_Ibu_Kandung');
        $update['Kecamatan'] = $request->get('Kecamatan');
        $update['Kelurahaan'] = $request->get('Kelurahaan');
        $update['Alamat'] = $request->get('Alamat');
        $update['Rt'] = $request->get('Rt');
        $update['Rw'] = $request->get('Rw');
        $update['Ppks_Tinggal'] = $request->get('Ppks_Tinggal');
        $update['Status_Dtks'] = $request->get('Status_Dtks');
        $update['BPNT'] = $request->get('BPNT');
        $update['PKH'] = $request->get('PKH');
        $update['Pbi_Jkn'] = $request->get('Pbi_Jkn');
        $update['Jenis_Bansos'] = $request->get('Jenis_Bansos');
        $update['Status_Bansos'] = $request->get('Status_Bansos');
        $update['Hubungan_Keluarga'] = $request->get('Hubungan_Keluarga');
        $update['Status_Duk'] = $request->get('Status_Duk');
        $update['UpdateBy'] = Auth::user()->name;
 
        Data_Ppks::where('id',$id)->update($update);
    // dd($update);
    return redirect()->route('Data-PPKS.index')
                    ->with('masuk','Data Ppks updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("data_Ppks")->where('id',$id)->delete();
        return redirect()->route('Data-PPKS.index')
                        ->with('deleted','Data Ppks deleted successfully');
    }
}
