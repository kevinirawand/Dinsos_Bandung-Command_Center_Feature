<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\pengaduanExport;
use App\Models\permohonan;

class PengaduanController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
         $this->middleware('permission:Pengaduan-List|Pengaduan-Create|Pengaduan-Edit|Pengaduan-Delete', ['only' => ['index','store']]);
         $this->middleware('permission:Pengaduan-Create', ['only' => ['create','store']]);
         $this->middleware('permission:Pengaduan-Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:Pengaduan-Delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $products = Pengaduan::orderBy('created_at', 'DESC')->get();
        $nama_admin = DB::table('roles')->where('name','LIKE','%'.'Admin'.'%')->get();
        foreach ($nama_admin as $value) {
            $nama = $value->name;
        }
        foreach($products as $post){
            $data = $post->Id_User;
        
            if ( Auth::user()->id == '1') {
                $products = Pengaduan::orderBy('created_at', 'DESC')->paginate(10);
            
            }else{
                $products =  Pengaduan::orderBy('created_at', 'DESC')->where('Id_User', Auth::user()->id)->paginate(10);
            }
        };
        return view('Pengaduan.index',compact('products','nama'))
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
        $request->validate([
            'upload_media' => 'mimes:jpg,png,jpeg,gif,svg,pdf|max:2048',
        ]);
        // dd($request);

        if ($image = $request->file('upload_media')) {
            $destinationPath = 'upload_media/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['upload_media'] = "$profileImage";
        }
        $input['Nik'] = $request->get('Nik');
        $input['Nama'] = $request->get('Nama');
        $input['Deskrpisi'] = $request->get('Deskrpisi');
        // $input['Status'] = $request->get('Status');
        $input['Createtby'] = Auth::user()->name;
        $input['Id_User'] = Auth::user()->id;
        // dd($input);
        Pengaduan::create($input);
        return redirect()->back()->with('masuk', 'pengaduan berhasil dikirim');
       
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_pengaduan)
    {
       $request->validate([
            'Upload_Media' => 'mimes:jpg,png,jpeg,gif,svg,pdf|max:2048',
           ]);
        if ($image = $request->file('Upload_Media')) {
            $destinationPath = 'upload_media/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update['Upload_Media'] = "$profileImage";
        }
            $update['Nik'] = $request->get('Nik');
            $update['Nama'] = $request->get('Nama');
            $update['Deskrpisi'] = $request->get('Deskrpisi');
            $update['Status'] = $request->get('Status');
            $update['UpdateBy'] = Auth::user()->name;
            Pengaduan::where('Id_pengaduan',$Id_pengaduan)->update($update);
            return redirect()->back()->with('masuk','data pengaduan berhasil diupdate');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id_pengaduan)
    {
        DB::table("Pengaduan")->where('Id_pengaduan',$Id_pengaduan)->delete();
        return redirect()->route('pengaduan-Menu.index')
                        ->with('deleted','Data Pengaduan Berhasil Dihapus');

    }
    public function export_excel()
	{
		return Excel::download(new pengaduanExport, 'Pengaduan.xlsx');
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
                        // 'Id_User'    => $value[2],
                        // 'Deskrpisi'    => $value[3],
                        // 'upload_media'    => $value[4],
                        // 'Status'    => $value[5],
                        'CreateBy'    => Auth::user()->name,
                    ];
                    Pengaduan::insert($simpan);
                   
                }
                
            }
            return redirect()->back()->with('masuk','data pengaduan berhasil di impport');
        }  
    }
    
    
}
