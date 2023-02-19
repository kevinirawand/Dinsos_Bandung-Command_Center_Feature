<?php

namespace App\Http\Controllers;

use App\Models\Data_Pkh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DataPkhController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:PKH-List|PKH-Create|PKH-Edit|PKH-Delete', ['only' => ['index','store']]);
         $this->middleware('permission:PKH-Create', ['only' => ['create','store']]);
         $this->middleware('permission:PKH-Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:PKH-Delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
        $products = Data_Pkh::orderBy('created_at', 'DESC')->paginate(500);
        return view('Data_Pkh.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 500);
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
                        'Nama_Penerima'    => $value[1],
                        'Alamat'    => $value[2],
                        'Nomer_Rekening'    => $value[3],
                        'penyalur'    => $value[4],
                        'Status'    => $value[5],
                        'Data_Bansos_Pkh'    => $value[6],
                        'Periode'    => $value[7],
                        'created_at'    => now(),
                        'CreatedBy'    => Auth::user()->name,
                        
                    ];
                    Data_Pkh::insert($simpan);
                   
                }
                
            }
            return redirect()->route('Data-Pkh.index')->with('masuk','Role deleted successfully');
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
        // request()->validate([
        //     'Nik' => 'required',
        //     'Nama_Penerima' => 'required',
        //     'Alamat' => 'required',
        //     'Nomer_Rekening' => 'required',
        //     'penyalur' => 'required',
        //     'Bansos' => 'required',
        //     'Status' => 'required',
        //     'Periode' => 'required',
        //     // 'CreatedBy' => 'required',
        // ]);
        $update = new Data_Pkh;
        $update['Nik'] = $request->get('Nik');
        $update['Nama_Penerima'] = $request->get('Nama_Penerima');
        $update['Alamat'] = $request->get('Alamat');
        $update['Nomer_Rekening'] = $request->get('Nomer_Rekening');
        $update['Status'] = $request->get('Status');
        $update['Data_Bansos_Pkh'] = $request->get('Data_Bansos_Pkh');
        $update['Periode'] = $request->get('Periode');
        $update['penyalur'] = $request->get('penyalur');
        $update['CreatedBy'] = Auth::user()->name;
        $update->save();
        return redirect()->route('Data-Pkh.index')
                        ->with('masuk','data PKH created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data_Pkh  $data_Pkh
     * @return \Illuminate\Http\Response
     */
    public function show(Data_Pkh $data_Pkh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data_Pkh  $data_Pkh
     * @return \Illuminate\Http\Response
     */
    public function edit(Data_Pkh $data_Pkh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data_Pkh  $data_Pkh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update['Nik'] = $request->get('Nik');
            $update['Nama_Penerima'] = $request->get('Nama_Penerima');
            $update['Alamat'] = $request->get('Alamat');
            $update['Nomer_Rekening'] = $request->get('Nomer_Rekening');
            $update['penyalur'] = $request->get('penyalur');
            $update['Data_Bansos_Pkh'] = $request->get('Data_Bansos_Pkh');
            $update['Status'] = $request->get('Status');
            $update['Periode'] = $request->get('Periode');
            $update['UpdateBy'] = $request->get('UpdateBy');
     
        data_pkh::where('id',$id)->update($update);
        // dd($update);
        return redirect()->route('Data-Pkh.index')
                        ->with('masuk','data PKH updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data_Pkh  $data_Pkh
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("data_pkh")->where('id',$id)->delete();
        return redirect()->route('Data-Pkh.index')
                        ->with('deleted','data PKH deleted successfully');
    }
}
