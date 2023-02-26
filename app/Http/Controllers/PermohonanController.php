<?php

namespace App\Http\Controllers;

use App\Models\permohonan;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\permohonanExport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PermohonanController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
         $this->middleware('permission:Permohonan-list|Permohonan-Create|Permohonan-Edit|Permohonan-Delete', ['only' => ['index','store']]);
         $this->middleware('permission:Permohonan-Create', ['only' => ['create','store']]);
         $this->middleware('permission:Permohonan-Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:Permohonan-Delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = permohonan::orderBy('created_at', 'DESC')->get();
        foreach($products as $post){
            $data = $post->Id_User;
        
            if ( Auth::user()->id == '1') {
                $products = permohonan::orderBy('created_at', 'DESC')->paginate(10);
            
            }else{
                $products =  permohonan::where('Id_User', Auth::user()->id)->paginate(10);
            }
        };

        // dd($products);
        return view('permohonan.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
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
        
        
        $input['Id_User'] = Auth::user()->id;
        $input['Nik'] = $request->get('Nik');
        $input['Nama'] =$request->get('Nama');
        $input['Jenis_Permohonan'] = $request->get('Jenis_Permohonan');
        $input['Kelurahan'] = Auth::user()->name; 
        $input['CreateBy'] = Auth::user()->name;
        // dd($input);
        permohonan::create($input);
        return redirect()->back()->with('masuk', 'pengaduan berhasil dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function show(permohonan $permohonan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function edit(permohonan $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $request->validate([
        'File_Permohonan' => 'mimes:jpg,png,jpeg,gif,svg,pdf|max:2048',
    ]);

    if ($image = $request->file('File_Permohonan')) {
        $destinationPath = 'File_Permohonan/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $update['File_Permohonan'] = "$profileImage";
    }
        // $update['Id_User'] = Auth::user()->id;
        $update['Nik'] = $request->get('Nik');
        $update['Nama'] =$request->get('Nama');
        // $update['Jenis_Permohonan'] = $request->get('Jenis_Permohonan');
        // $update['Kelurahan'] = Auth::user()->name;
        // $update['CreateBy'] = Auth::user()->name;
        permohonan::where('id',$id)->update($update);
        return redirect()->back()->with('masuk','data pengaduan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("permohonan")->where('id',$id)->delete();
        return redirect()->route('permohonan.index')
                        ->with('deleted','Data Pengaduan Berhasil Dihapus');

    }
    public function export_excel_permohonan()
	{
        $users = DB::table('permohonan')->get();
        // dd($users);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Add column headings
        $sheet->setCellValue('A1', 'idi');
        $sheet->setCellValue('B1', 'Id_User');
        $sheet->setCellValue('C1', 'Nik');
        $sheet->setCellValue('D1', 'Nama');
        $sheet->setCellValue('E1', 'Jenis_Permohonan');
        $sheet->setCellValue('F1', 'Kelurahan');
        $sheet->setCellValue('G1', 'Jenis_Permohonan');
        $sheet->setCellValue('H1', 'CreateBy');
        // Add data to the spreadsheet
        $row = 2;
        foreach ($users as $user) {
            $sheet->setCellValue('A' . $row, $user->id);
            $sheet->setCellValue('B' . $row, $user->Id_User);
            $sheet->setCellValue('C' . $row, $user->Nik);
            $sheet->setCellValue('D' . $row, $user->Nama);
            $sheet->setCellValue('E' . $row, $user->Jenis_Permohonan);
            $sheet->setCellValue('F' . $row, $user->Kelurahan);
            $sheet->setCellValue('G' . $row, $user->Jenis_Permohonan);
            $sheet->setCellValue('H' . $row, $user->CreateBy);
            $row++;
        }
        
        // Create a new XLSX writer
        $writer = new Xlsx($spreadsheet);
        
        // Save the spreadsheet to a file
        $writer->save('users.xlsx');
        return response()->download('users.xlsx');
	}
    public function import()
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
                        'Nama'    => $value[1],
                        'Jenis_Permohonan'    => $value[2],
                        // 'Deskrpisi'    => $value[3],
                        // 'upload_media'    => $value[4],
                        // 'Status'    => $value[5],
                        'CreateBy'    => Auth::user()->name,
                    ];
                    Permohonan::insert($simpan);
                   
                }
                
            }
            return redirect()->back()->with('masuk','data pengaduan berhasil di impport');
        }  
    }
}
