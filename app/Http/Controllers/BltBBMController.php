<?php

namespace App\Http\Controllers;

use App\Models\Blt_BBM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class BltBBMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:BLT-BBM-List|BLT-BBM-Create|BLT-BBM-Edit|BLT-BBM-Delete', ['only' => ['index','store']]);
         $this->middleware('permission:BLT-BBM-Create', ['only' => ['create','store']]);
         $this->middleware('permission:BLT-BBM-Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:BLT-BBM-Delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $products = Blt_BBM::orderBy('created_at', 'DESC')->paginate(400);
        return view('Data_Blt_BBM.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 400);

        // return view('Blt_Minyak_Goreng.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                        'Nik'     => $value[0],
                        'Nokk'    => $value[1],
                        'Nama_Penerima'    => $value[2],
                        'Alamat'    => $value[3],
                        'Nomer_Rekening'    => $value[4],
                        'Penyalur'    => $value[5],
                        'status'    => $value[6],
                        'Bansos'    => $value[6],
                        'periode'    => $value[7],
                        'Kelurahan'    => $value[8],
                        'Kecamatan'    => $value[9],
                        'created_at'    => now(),
                        'CreateBy'    =>  Auth::user()->name,
                    ];
                    Blt_BBM::insert($simpan);
                   
                }
                
            }
            return redirect()->route('Blt-BBM.index')->with('success','Role deleted successfully');
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
      
        $update = new Blt_BBM;
        $update['Nokk'] = $request->get('Nokk');
        $update['Nik'] = $request->get('Nik');
        $update['Nama_Penerima'] = $request->get('Nama_Penerima');
        $update['Alamat'] = $request->get('Alamat');
        $update['Nomer_Rekening'] = $request->get('Nomer_Rekening');
        $update['status'] = $request->get('status');
        $update['Bansos_BLT_BBM'] = $request->get('Bansos_BLT_BBM');
        $update['periode'] = $request->get('periode');
        $update['Penyalur'] = $request->get('Penyalur');
        $update['Kelurahan'] = $request->get('Kelurahan');
        $update['Kecamatan'] = $request->get('Kecamatan');
        $update['CreateBy'] = Auth::user()->name;
        $update->save();
        
        return redirect()->route('Data-Blt-BBM.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blt_BBM  $blt_BBM
     * @return \Illuminate\Http\Response
     */
    public function show(Blt_BBM $blt_BBM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blt_BBM  $blt_BBM
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blt_BBM  $blt_BBM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update['Nokk'] = $request->get('Nokk');
        $update['Nik'] = $request->get('Nik');
        $update['Alamat'] = $request->get('Alamat');
        $update['Nama_Penerima'] = $request->get('Nama_Penerima');
        $update['Nomer_Rekening'] = $request->get('Nomer_Rekening');
        $update['Status'] = $request->get('Status');
        $update['Bansos_BLT_BBM'] = $request->get('Bansos_BLT_BBM');
        $update['Periode'] = $request->get('Periode');
        $update['Kelurahan'] = $request->get('Kelurahan');
        $update['Kecamatan'] = $request->get('Kecamatan');
        $update['UpdateBy'] = Auth::user()->name;

        Blt_BBM::where('id',$id)->update($update);
    // dd($update);
    return redirect()->route('Data-Blt-BBM.index')
                    ->with('masuk','Data BLT BBM updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blt_BBM  $blt_BBM
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("data_blt_bbm")->where('id',$id)->delete();
        return redirect()->route('Data-Blt-BBM.index')
                        ->with('deleted','Data BLT BBM deleted successfully');
    }
}
