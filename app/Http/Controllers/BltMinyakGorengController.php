<?php

namespace App\Http\Controllers;

use App\Models\Blt_Minyak_Goreng;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\Blt_Minyak_GorengsImport;
use App\Exports\Blt_Minyak_GorengExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class BltMinyakGorengController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:BLT-Minyak-Gorengs-List|BLT-Minyak-Gorengs-Create|BLT-Minyak-Gorengs-Edit|BLT-Minyak-Gorengs-Delete', ['only' => ['index','store']]);
         $this->middleware('permission:BLT-Minyak-Gorengs-Create', ['only' => ['create','store']]);
         $this->middleware('permission:BLT-Minyak-Gorengs-Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:BLT-Minyak-Gorengs-Delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // $products = Blt_Minyak_Goreng::paginate(10);
        $products = Blt_Minyak_Goreng::orderBy('created_at', 'DESC')->paginate(400);
        // dd($products);
        return view('Blt_Minyak_Goreng.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 10);

        // return view('Blt_Minyak_Goreng.index');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Blt_Minyak_Goreng.create');
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
        request()->validate([
            'Nokk' => 'required',
            'Nik' => 'required',
            'Nama' => 'required',
            'Alamat' => 'required',
            'Sk_Dtks' => 'required',
            'Terakhir_Padan_Capil' => 'required',
            'Bpnt' => 'required',
            'Bst' => 'required',
            'Pkh' => 'required',
            'Pbi' => 'required',
            'Bpnt_Ppkm' => 'required',
            'Blt' => 'required',
            'Blt_Bbm' => 'required',
            'Rutilahu' => 'required',
            'Keterangan_Meninggal' => 'required',
            'Keterangan_Disabilitas' => 'required',
            'Kelurahan' => 'required',
            'Kecamatan' => 'required',
            // 'CreateBy' => 'required',
        ]);
        $update = new Blt_Minyak_Goreng;
        $update['Nokk'] = $request->get('Nokk');
        $update['Nik'] = $request->get('Nik');
        $update['Nama'] = $request->get('Nama');
        $update['Alamat'] = $request->get('Alamat');
        $update['Sk_Dtks'] = $request->get('Sk_Dtks');
        $update['Terakhir_Padan_Capil'] = $request->get('Terakhir_Padan_Capil');
        $update['Bpnt'] = $request->get('Bpnt');
        $update['Bst'] = $request->get('Bst');
        $update['Pkh'] = $request->get('Pkh');
        $update['Pbi'] = $request->get('Pbi');
        $update['Bpnt_Ppkm'] = $request->get('Bpnt_Ppkm');
        // $update['Nik'] = $request->get('Nik');
        $update['Blt'] = $request->get('Blt');
        $update['Blt_Bbm'] = $request->get('Blt_Bbm');
        $update['Rutilahu'] = $request->get('Rutilahu');
        $update['Keterangan_Meninggal'] = $request->get('Keterangan_Meninggal');
        $update['Keterangan_Disabilitas'] = $request->get('Keterangan_Disabilitas');
        $update['Kelurahan'] = $request->get('Kelurahan');
        $update['Kecamatan'] = $request->get('Kecamatan');
        $update['CreateBy'] = Auth::user()->name;
        $update->save();
        return redirect()->route('Bansos.index')
                        ->with('masuk','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blt_Minyak_Goreng  $Blt_Minyak_Goreng
     * @return \Illuminate\Http\Response
     */
    public function show(Blt_Minyak_Goreng $Blt_Minyak_Goreng)
    {
        return view('Blt_Minyak_Goreng.show',compact('Blt_Minyak_Goreng'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blt_Minyak_Goreng  $Blt_Minyak_Goreng
     * @return \Illuminate\Http\Response
     */
    public function edit(Blt_Minyak_Goreng $Blt_Minyak_Goreng)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blt_Minyak_Goreng  $Blt_Minyak_Goreng
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
            $update['Nokk'] = $request->get('Nokk');
            $update['Nik'] = $request->get('Nik');
            $update['Nama'] = $request->get('Nama');
            $update['Alamat'] = $request->get('Alamat');
            $update['Sk_Dtks'] = $request->get('Sk_Dtks');
            $update['Terakhir_Padan_Capil'] = $request->get('Terakhir_Padan_Capil');
            $update['Bpnt'] = $request->get('Bpnt');
            $update['Pkh'] = $request->get('Pkh');
            $update['Pbi'] = $request->get('Pbi');
            $update['Bpnt_Ppkm'] = $request->get('Bpnt_Ppkm');
            // $update['Nik'] = $request->get('Nik');
            $update['Blt'] = $request->get('Blt');
            $update['Blt_Bbm'] = $request->get('Blt_Bbm');
            $update['Rutilahu'] = $request->get('Rutilahu');
            $update['Keterangan_Meninggal'] = $request->get('Keterangan_Meninggal');
            $update['Keterangan_Disabilitas'] = $request->get('Keterangan_Disabilitas');
            $update['Kelurahan'] = $request->get('Kelurahan');
            $update['Kecamatan'] = $request->get('Kecamatan');
            $update['UpdateBy'] = Auth::user()->name;
         
        Blt_Minyak_Goreng::where('id',$id)->update($update);
        // dd($update);
        return redirect()->route('Bansos.index')
                        ->with('masuk','Data Blt_Minyak_Goreng updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blt_Minyak_Goreng  $Blt_Minyak_Goreng
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        DB::table("blt_minyak_gorengs")->where('id',$id)->delete();
        return redirect()->route('Bansos.index')
                        ->with('deleted','Data BLT Minyak Telah Dihapus');
    }
    public function importcsv()
    {
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
                        'Nokk'     => $value[0],
                        'Nik'    => $value[1],
                        'Nama'    => $value[2],
                        'Alamat'    => $value[3],
                        'Sk_Dtks'    => $value[4],
                        'Terakhir_Padan_Capil'    => $value[5],
                        'Bpnt'    => $value[6],
                        'Bst'    => $value[7],
                        'Pkh'    => $value[8],
                        'Pbi'    => $value[9],
                        'Bpnt_Ppkm'    => $value[10],
                        'Blt'    => $value[11],
                        'Blt_Bbm'    => $value[12],
                        'Rutilahu'    => $value[13],
                        'Keterangan_Meninggal'    => $value[14],
                        'Keterangan_Disabilitas'    => $value[15],
                        'Kelurahan'    => $value[16],
                        'Kecamatan'    => $value[17],
                        'created_at'    => now(),
                        
                    ];
                    Blt_Minyak_Goreng::insert($simpan);
                   
                }
                
            }
            return redirect()->route('Blt-Minyak-Goreng.index')->with('success','Role deleted successfully');
        }    
    }
    public function ImportMaatwebsite(Request $request) 
    {
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
                        'Nokk'     => $value[0],
                        'Nik'    => $value[1],
                        'Nama'    => $value[2],
                        'Alamat'    => $value[3],
                        'Sk_Dtks'    => $value[4],
                        'Terakhir_Padan_Capil'    => $value[5],
                        'Bpnt'    => $value[6],
                        'Pkh'    => $value[7],
                        'Pbi'    => $value[8],
                        'Bpnt_Ppkm'    => $value[9],
                        'Blt'    => $value[10],
                        'Nama'    => $value[11],
                        'Blt_Bbm'    => $value[12],
                        'Rutilahu'    => $value[13],
                        'Keterangan_Meninggal'    => $value[14],
                        'Keterangan_Disabilitas'    => $value[15],
                        'Kelurahan'    => $value[16],
                        'Kecamatan'    => $value[17],
                        'UpdateBy'    => $value[18],
                        'created_at'    => now(),
                    ];
                    Blt_Minyak_Goreng::insert($simpan);
                   
                }
                
            }
            return redirect()->route('Bansos.index')->with('success','Role deleted successfully');
        }    
        
    }
    // public function ExportData() 
    // {
    //     $filename = urlencode(date("Y-m-d")."-0959-DataBlt_Minyak_Goreng.csv");
    //     return Excel::download(new Blt_Minyak_GorengExport, $filename);
    // }
}
