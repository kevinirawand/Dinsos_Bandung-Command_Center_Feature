<?php

namespace App\Http\Controllers;

use App\Models\Dtks;
use Illuminate\Http\Request;
// use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Imports\DtkssImport;
use App\Exports\DtksExport;
use Maatwebsite\Excel\Facades\Excel;
class DtksController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Dtks-List|Dtks-Create|Dtks-Edit|Dtks-Delete', ['only' => ['index','show']]);
         $this->middleware('permission:Dtks-Create', ['only' => ['create','store']]);
         $this->middleware('permission:Dtks-Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:Dtks-Delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        
        $products = dtks::orderBy('created_at', 'DESC')->paginate(400);
        
        return view('Dtks.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 400);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dtks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate([
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
    
        Dtks::create($request->all());
    
        return redirect()->route('Dtks.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dtks  $dtks
     * @return \Illuminate\Http\Response
     */
    public function show(Dtks $dtks)
    {
        return view('dtks.show',compact('dtks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dtks  $dtks
     * @return \Illuminate\Http\Response
     */
    public function edit(Dtks $dtks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dtks  $dtks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
            $update['Nama'] = $request->get('Nama');
            $update['Id_DTKS'] = $request->get('Id_DTKS');
            $update['Provinsi'] = $request->get('Provinsi');
            $update['Kabupaten_Kota'] = $request->get('Kabupaten_Kota');
            $update['Kecamatan'] = $request->get('Kecamatan');
            $update['Desa_Kelurahan'] = $request->get('Desa_Kelurahan');
            $update['RT'] = $request->get('RT');
            $update['RW'] = $request->get('RW');
            $update['Alamat'] = $request->get('Alamat');
            $update['Nokk'] = $request->get('Nokk');
            $update['Nik'] = $request->get('Nik');
            $update['Alamat'] = $request->get('Alamat');
            $update['Dusun'] = $request->get('Dusun');
            $update['Tanggal_Lahir'] = $request->get('Tanggal_Lahir');
            $update['Tempat_Lahir'] = $request->get('Tempat_Lahir');
            $update['Jenis_Kelamin'] = $request->get('Jenis_Kelamin');
            $update['Nama_Ibu_Kandung'] = $request->get('Nama_Ibu_Kandung');
            $update['Keterangan_padan'] = $request->get('Keterangan_padan');
            $update['Hub_Keluarga'] = $request->get('Hub_Keluarga');
            $update['Bansos_Bpnt'] = $request->get('Bansos_Bpnt');
            $update['Bansos_Pkh'] = $request->get('Bansos_Pkh');
            $update['Bansos_Bnpnt_Ppkm'] = $request->get('Bansos_Bnpnt_Ppkm');
            $update['Pbi_Jni'] = $request->get('Pbi_Jni');
         
        Dtks::where('id',$id)->update($update);
        // dd($update);
        return redirect()->route('Dtks.index')
                        ->with('success','Data Dtks updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dtks  $dtks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("dtks")->where('id',$id)->delete();
        return redirect()->route('Dtks.index')
                        ->with('success','Role deleted successfully');
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
                        'Id_DTKS'     => $value[0],
                        'Provinsi'    => $value[1],
                        'Kabupaten_Kota'    => $value[2],
                        'Kecamatan'    => $value[3],
                        'Desa_Kelurahan'    => $value[4],
                        'Alamat'    => $value[5],
                        'Dusun'    => $value[6],
                        'RT'    => $value[7],
                        'RW'    => $value[8],
                        'Nokk'    => $value[9],
                        'Nik'    => $value[10],
                        'Nama'    => $value[11],
                        'Tanggal_Lahir'    => $value[12],
                        'Tempat_Lahir'    => $value[13],
                        'Jenis_Kelamin'    => $value[14],
                        'Pekerjaan'    => $value[15],
                        'Nama_Ibu_Kandung'    => $value[16],
                        'Hub_Keluarga'    => $value[17],
                        'Keterangan_padan'    => $value[18],
                        'Bansos_Bpnt'    => $value[19],
                        'Bansos_Pkh'    => $value[20],
                        'Bansos_Bnpnt_Ppkm'    => $value[21],
                        'Pbi_Jni'    => $value[22],
                        'created_at'    => now(),
                        
                    ];
                    dtks::insert($simpan);
                   
                }
                
            }
            return redirect()->route('Dtks.index')->with('success','Role deleted successfully');
        }    
    }
    public function ImportMaatwebsite(Request $request) 
    {
        if ($request->file('file')) {
            $data = Excel::import(new DtkssImport(), request()->file('file'));
            // dd($data);
            return redirect()->route('Dtks.index')->with('masuk','add Data Dtks successfully');
        }
        
    }
    public function ExportData() 
    {
        $filename = urlencode(date("Y-m-d")."-0959-DataDTKS.xlsx");
        return Excel::download(new DtksExport, $filename);
    }
    
}
