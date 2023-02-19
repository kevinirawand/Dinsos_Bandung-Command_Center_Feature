<?php

namespace App\Http\Controllers;

use App\Models\data_pbi_daerah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DataPbiDaerahController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:PBI-Daerah-List|PBI-Daerah-Create|PBI-Daerah-Edit|PBI-Daerah-Delete', ['only' => ['index','store']]);
         $this->middleware('permission:PBI-Daerah-Create', ['only' => ['create','store']]);
         $this->middleware('permission:PBI-Daerah-Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:PBI-Daerah-Delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = data_pbi_daerah::orderBy('created_at', 'DESC')->paginate(500);
        // dd($products);
        return view('Data_Pbi_Daerah.index',compact('products'))
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
                        'Ps_Noka'     => $value[1],
                        'Noka'    => $value[2],
                        'Nama'    => $value[3],
                        'Nik'    => $value[4],
                        'Pisat'    => $value[5],
                        'Tgl_lahir'    => $value[6],
                        'Jenkel'    => $value[7],
                        'Kd_Status_Pst'    => $value[8],
                        'Premi'    => $value[9],
                        'Kelas'     => $value[10],
                        'Tmt'    => $value[11],
                        'No_Pkk'    => $value[12],
                        'NmPkk'    => $value[13],
                        'Alamat'    => $value[14],
                        'Rt'    => $value[15],
                        'Rw'    => $value[16],
                        'Kd_Desa'    => $value[17],
                        'NmDesa'    => $value[18],
                        'Kd_Kec'    => $value[19],
                        'Nm_Kec'    => $value[20],
                        'No_KK'    => $value[21],
                        'Jn_Stag'    => $value[22],
                        'Ts_input'    => $value[23],
                        'created_at'    => now(),
                        'CreateBy'=> Auth::user()->name,
                    ];
                    data_pbi_daerah::insert($simpan);
                   
                }
                
            }
            return redirect()->route('Data-Pbi-Daerah.index')->with('masuk','Data PBI Berhasil di Import');
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
        
        request()->validate([
            'Ps_Noka' => 'required',
            'Noka' => 'required',
            'Nama' => 'required',
            'Nik' => 'required',
            'Pisat' => 'required',
            'Tgl_lahir' => 'required',
            'Jenkel' => 'required',
            'Kd_Status_Pst' => 'required',
            'Premi' => 'required',
            'Kelas' => 'required',
            'Tmt' => 'required',
            'No_Pkk' => 'required',
            'NmPkk' => 'required',
            'Alamat' => 'required',
            'Rt' => 'required',
            'Rw' => 'required',
            'Kd_Desa' => 'required',
            'NmDesa' => 'required',
            'Kd_Kec' => 'required',
            'Nm_Kec' => 'required',
            'No_KK' => 'required',
            'Jn_Stag' => 'required',
            'Ts_input' => 'required',
            // 'CreateBy' => 'required',
        ]);
        $update = new data_pbi_daerah();
        $update['Ps_Noka'] = $request->get('Ps_Noka');
        $update['Noka'] = $request->get('Noka');
        $update['Nama'] = $request->get('Nama');
        $update['Nik'] = $request->get('Nik');
        $update['Pisat'] = $request->get('Pisat');
        $update['Tgl_lahir'] = $request->get('Tgl_lahir');
        $update['Jenkel'] = $request->get('Jenkel');
        $update['Kd_Status_Pst'] = $request->get('Kd_Status_Pst');
        $update['Premi'] = $request->get('Premi');
        $update['Kelas'] = $request->get('Kelas');
        $update['Tmt'] = $request->get('Tmt');
        $update['No_Pkk'] = $request->get('No_Pkk');
        $update['NmPkk'] = $request->get('NmPkk');
        $update['Alamat'] = $request->get('Alamat');
        $update['Rt'] = $request->get('Rt');
        $update['Rw'] = $request->get('Rw');
        $update['Kd_Desa'] = $request->get('Kd_Desa');
        $update['NmDesa'] = $request->get('NmDesa');
        $update['Kd_Kec'] = $request->get('Kd_Kec');
        $update['Nm_Kec'] = $request->get('Nm_Kec');
        $update['No_KK'] = $request->get('No_KK');
        $update['Jn_Stag'] = $request->get('Jn_Stag');
        $update['Ts_Input'] = $request->get('Ts_Input');
        $update['CreateBy'] = Auth::user()->name;
        $update->save();
    // dd($request);
        return redirect()->route('Data-Pbi-Daerah.index')
                        ->with('masuk','data PBI Daerah created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\data_pbi_daerah  $data_pbi_daerah
     * @return \Illuminate\Http\Response
     */
    public function show(data_pbi_daerah $data_pbi_daerah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\data_pbi_daerah  $data_pbi_daerah
     * @return \Illuminate\Http\Response
     */
    public function edit(data_pbi_daerah $data_pbi_daerah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\data_pbi_daerah  $data_pbi_daerah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $update['Ps_Noka'] = $request->get('Ps_Noka');
            $update['Noka'] = $request->get('Noka');
            $update['Nama'] = $request->get('Nama');
            $update['Alamat'] = $request->get('Alamat');
            $update['Nik'] = $request->get('Nik');
            $update['Tgl_lahir'] = $request->get('Tgl_lahir');
            $update['Jenkel'] = $request->get('Jenkel');
            $update['Kd_Status_Pst'] = $request->get('Kd_Status_Pst');
            $update['Premi'] = $request->get('Premi');
            $update['Kelas'] = $request->get('Kelas');
            // $update['Nik'] = $request->get('Nik');
            $update['Tmt'] = $request->get('Tmt');
            $update['No_Pkk'] = $request->get('No_Pkk');
            $update['Rt'] = $request->get('Rt');
            $update['Rw'] = $request->get('Rw');
            $update['Kd_Desa'] = $request->get('Kd_Desa');
            $update['Nmdesa'] = $request->get('Nmdesa');
            $update['Kd_Kec'] = $request->get('Kd_Kec');
            $update['Nm_Kec'] = $request->get('Nm_Kec');
            $update['No_KK'] = $request->get('No_KK');
            $update['Jn_Stag'] = $request->get('Jn_Stag');
            $update['Ts_Input'] = $request->get('Ts_Input');
            $update['UpdateBy'] = $request->get('UpdateBy');
     
        data_pbi_daerah::where('id',$id)->update($update);
        // dd($update);
        return redirect()->route('Data-Pbi-Daerah.index')
                        ->with('masuk','data PBI Daerah updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\data_pbi_daerah  $data_pbi_daerah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("data_pbi_daerah")->where('id',$id)->delete();
        return redirect()->route('Data-Pbi-Daerah.index')
                        ->with('deleted','data PBI Daerah deleted successfully');
    }
}
