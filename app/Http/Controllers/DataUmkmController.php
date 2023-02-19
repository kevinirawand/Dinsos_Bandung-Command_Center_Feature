<?php

namespace App\Http\Controllers;

use App\Models\Data_Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DataUmkmController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:UMKM-List|UMKM-Create|UMKM-Edit|UMKM-Delete', ['only' => ['index','store']]);
         $this->middleware('permission:UMKM-Create', ['only' => ['create','store']]);
         $this->middleware('permission:UMKM-Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:UMKM-Delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Data_Umkm::orderBy('created_at', 'DESC')->paginate(500);
        // dd($products);
        return view('Data_Umkm.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 500);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importcsv()
    {
        // dd($request);
        // request()->validate([
        //     'Nik' => 'required',
        //     'Nama_Depan' => 'required',
        //     'Alamat' => 'required',
        //     'Rt' => 'required',
        //     'Rw' => 'required',
        //     'Kelurahan' => 'required',
        //     'Kecamatan' => 'required',
        //     'Nama_Usaha' => 'required',
        //     'Jenis_Usaha' => 'required',
        //     'Bentuk_Usaha' => 'required',
        //     'Produk_1' => 'required',
        //     'Jenis_Aset' => 'required',
        //     'Jenis_Omset' => 'required',
        //     'Jumlah_Omset' => 'required',
        //     'Nama_DTKS' => 'required',
        //     'DTKS' => 'required',
        //     'KPM_Bansos' => 'required',
        //     'BLT_BBM' => 'required',
        //     'CreatedBy' => 'required',
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        
        if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);
            if('csv' == $extension){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            }elseif('xls' == $extension){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            foreach ($sheetData as $key => $value) {
                if ($key != 0 ) {
                    $simpan = [
                        'Nik'     => $value[0],
                        'Nama_Depan'    => $value[1],
                        'Alamat'    => $value[2],
                        'Rt'    => $value[3],
                        'Rw'    => $value[4],
                        'Kelurahan'    => $value[5],
                        'Kecamatan'    => $value[6],
                        'Nama_Usaha'    => $value[7],
                        'Jenis_Usaha'    => $value[8],
                        'Bentuk_Usaha'    => $value[9],
                        'Produk_1'    => $value[10],
                        'Jenis_Aset'    => $value[11],
                        'Jumlah_Aset'    => $value[12],
                        'Jenis_Omset'    => $value[13],
                        'Jumlah_Omset'    => $value[14],
                        'Nama_DTKS'    => $value[15],
                        'DTKS'    => $value[16],
                        'KPM_Bansos'    => $value[17],
                        'BLT_BBM'    => $value[18],
                        'created_at'    => now(),
                        'CreatedBy'    => Auth::user()->name,
                    ];
                    Data_Umkm::insert($simpan);
                   
                }
                
            }
            return redirect()->route('Dtks.index')->with('masuk','Data UMKM Berhasil DiImport');
        }    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // request()->validate([
        //     'Nik' => 'required',
        //     'Nama_Depan' => 'required',
        //     'Alamat' => 'required',
        //     'Rt' => 'required',
        //     'Rw' => 'required',
        //     'Kelurahan' => 'required',
        //     'Kecamatan' => 'required',
        //     'Nama_Usaha' => 'required',
        //     'Jenis_Usaha' => 'required',
        //     'Bentuk_Usaha' => 'required',
        //     'Produk_1' => 'required',
        //     'Jenis_Aset' => 'required',
        //     'Jenis_Omset' => 'required',
        //     'Jumlah_Omset' => 'required',
        //     'Nama_DTKS' => 'required',
        //     'DTKS' => 'required',
        //     'KPM_Bansos' => 'required',
        //     'BLT_BBM' => 'required',
        //     'CreatedBy' => 'required',
        // ]);
        $update = new Data_Umkm;
        $update['Nik'] = $request->get('Nik');
        $update['Nama_Depan'] = $request->get('Nama_Depan');
        $update['Alamat'] = $request->get('Alamat');
        $update['Rt'] = $request->get('Rt');
        $update['Rw'] = $request->get('Rw');
        $update['Kelurahan'] = $request->get('Kelurahan');
        $update['Kecamatan'] = $request->get('Kecamatan');
        $update['Nama_Usaha'] = $request->get('Nama_Usaha');
        $update['Jenis_Usaha'] = $request->get('Jenis_Usaha');
        $update['Bentuk_Usaha'] = $request->get('Bentuk_Usaha');
        $update['Produk_1'] = $request->get('Produk_1');
        $update['Jenis_aset'] = $request->get('Jenis_aset');
        $update['jumlah_aset'] = $request->get('jumlah_aset');
        $update['Jenis_Omset'] = $request->get('Jenis_Omset');
        $update['Jumlah_Omset'] = $request->get('Jumlah_Omset');
        $update['Nama_DTKS'] = $request->get('Nama_DTKS');
        $update['DTKS'] = $request->get('DTKS');
        $update['KPM_Bansos'] = $request->get('KPM_Bansos');
        $update['BLT_BBM'] = $request->get('BLT_BBM');
        $update['CreatedBy'] = Auth::user()->name;
        $update->save();
    // dd($request);
        Data_Umkm::create($request->all());
        return redirect()->route('Data-Umkm.index')
                        ->with('masuk','data UMKM created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data_Umkm  $data_Umkm
     * @return \Illuminate\Http\Response
     */
    public function show(Data_Umkm $data_Umkm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data_Umkm  $data_Umkm
     * @return \Illuminate\Http\Response
     */
    public function edit(Data_Umkm $data_Umkm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data_Umkm  $data_Umkm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update['Nik'] = $request->get('Nik');
        $update['Nama_Depan'] = $request->get('Nama_Depan');
        $update['Alamat'] = $request->get('Alamat');
        $update['Rt'] = $request->get('Rt');
        $update['Rw'] = $request->get('Rw');
        $update['Kelurahan'] = $request->get('Kelurahan');
        $update['Kecamatan'] = $request->get('Kecamatan');
        $update['Nama_Usaha'] = $request->get('Nama_Usaha');
        $update['Jenis_Usaha'] = $request->get('Jenis_Usaha');
        $update['Bentuk_Usaha'] = $request->get('Bentuk_Usaha');
        $update['Produk_1'] = $request->get('Produk_1');
        $update['Jenis_aset'] = $request->get('Jenis_aset');
        $update['jumlah_aset'] = $request->get('jumlah_aset');
        $update['Jenis_Omset'] = $request->get('Jenis_Omset');
        $update['Jumlah_Omset'] = $request->get('Jumlah_Omset');
        $update['Nama_DTKS'] = $request->get('Nama_DTKS');
        $update['DTKS'] = $request->get('DTKS');
        $update['KPM_Bansos'] = $request->get('KPM_Bansos');
        $update['BLT_BBM'] = $request->get('BLT_BBM');
        $update['UpdateBy'] = Auth::user()->name;
 
        Data_Umkm::where('id',$id)->update($update);
    // dd($update);
    return redirect()->route('Data-Umkm.index')
                    ->with('masuk','data UMKM updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data_Umkm  $data_Umkm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("data_umkm")->where('id',$id)->delete();
        return redirect()->route('Data-Umkm.index')
                        ->with('deleted','data UMKM deleted successfully');
    }
    
}
