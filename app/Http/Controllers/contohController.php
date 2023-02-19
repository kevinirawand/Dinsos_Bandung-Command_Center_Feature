<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dtks;
use App\Models\Product;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\searchpane;
use Illuminate\Support\Facades\DB;
class contohController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kecamatan = DB::table('master_kecamatan')->get();
        $kelurahan = DB::table('master_kelurahan')->get();
        // $minyak = DB::table('blt_minyak_gorengs')->get();
        // $kecamatan->nama_kecamatan = $request->Nama_Kecamatan;
       $dataDTKS = null;
        // where('Nama','LIKE','%Nunung%')
        // ->Where('Kecamatan','LIKE','%Batununggal%')
        // ->Where('Desa_Kelurahan','LIKE','%Binong%')
        //->paginate(request()->input('limit', 20));
        //dd($dataDTKS);
        return view('dtksajax',compact('kecamatan','kelurahan','dataDTKS'));
    }
       
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productId = $request->id;
        
         dtks::updateOrCreate([
                    'id' => $productId
                ],
                [
                    'Nama' => $request->Nama, 
                    'Id_DTKS' => $request->Id_DTKS,
                    'Provinsi' => $request->Provinsi,
                    'Kabupaten_Kota' => $request->Kabupaten_Kota,
                    'Kecamatan' => $request->Kecamatan,
                    'Desa_Kelurahan' => $request->Desa_Kelurahan,
                    'RT' => $request->RT,
                    'RW' => $request->RW,
                    'Alamat' => $request->Alamat,
                    'Nokk' => $request->Nokk,
                    'Nik' => $request->Nik,
                    'Alamat' => $request->Alamat,
                    'Dusun' => $request->Dusun,
                    'Tanggal_Lahir' => $request->Tanggal_Lahir,
                    'Tempat_Lahir' => $request->Tempat_Lahir,
                    'Jenis_Kelamin' => $request->Jenis_Kelamin,
                    'Nama_Ibu_Kandung' => $request->Nama_Ibu_Kandung,
                    'Keterangan_padan' => $request->Keterangan_padan,
                    'Hub_Keluarga' => $request->Hub_Keluarga,
                    'Bansos_Bpnt' => $request->Bansos_Bpnt,
                    'Bansos_Pkh' => $request->Bansos_Pkh,
                    'Bansos_Bnpnt_Ppkm' => $request->Bansos_Bnpnt_Ppkm,
                    'Pbi_Jni' => $request->Pbi_Jni,
                ]);        
     
        return response()->json(['success'=>'DTKS saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $dtks = Dtks::find($id);
        $nik =  $dtks->Nik; 
        $product = DB::table('dtks')->select(
                'dtks.id',
                'dtks.Nik',
                'dtks.Nama',
                'dtks.Alamat',
                'data_umkm.BLT_BBM',
                'data_umkm.KPM_Bansos',
                'data_bpnt.Nama_Penerima',
                'pkh.Data_Bansos_Pkh',
                'bltbbm.Bansos_BLT_BBM',
                'pbi.Ps_Noka',
                'minyak.Sk_Dtks',
                )
        ->leftJoin('data_bpnt', 'dtks.Nik', '=', 'data_bpnt.Nik')
        ->leftJoin('data_umkm', 'dtks.Nik', '=', 'data_umkm.Nik')
        ->leftjoin('data_pkh as pkh', 'pkh.Nik', '=', 'dtks.Nik')
        ->leftjoin('data_blt_bbm as bltbbm', 'bltbbm.Nik', '=', 'dtks.Nik')
        ->leftjoin('data_pbi_daerah as pbi', 'pbi.Nik', '=', 'dtks.Nik')
        ->leftjoin('blt_minyak_gorengs as minyak', 'minyak.Nik', '=', 'dtks.Nik')
        ->where('dtks.Nik','like',"%".$nik."%")
        ->groupBy('Nik')
        ->get();
      
        $data = json_decode($product, true);
        return $data;
        // return json_encode($product);
    }

       public function show($dataDTKS){
     //   $details = Dtks::find($id);
        // $dtks = Dtks::find($id);
        // $nik =  $dtks->Nik; 
        $dataDTKS = DB::table('dtks')->select(
                'dtks.id',
                'dtks.Nik',
                'dtks.Nama',
                'dtks.Alamat',
                'data_umkm.BLT_BBM',
                'data_umkm.KPM_Bansos',
                'penerima.Nama_Penerima',
                'pkh.Data_Bansos_Pkh',
                'bltbbm.Bansos_BLT_BBM',
                'pbi.Ps_Noka',
                'minyak.Sk_Dtks',
                )
        ->leftJoin('data_bpnt as penerima', 'penerima.Nik', '=', 'dtks.Nik')
        ->leftJoin('data_umkm', 'dtks.Nik', '=', 'data_umkm.Nik')
        ->leftjoin('data_pkh as pkh', 'pkh.Nik', '=', 'dtks.Nik')
        ->leftjoin('data_blt_bbm as bltbbm', 'bltbbm.Nik', '=', 'dtks.Nik')
        ->leftjoin('data_pbi_daerah as pbi', 'pbi.Nik', '=', 'dtks.Nik')
        ->leftjoin('blt_minyak_gorengs as minyak', 'minyak.Nik', '=', 'dtks.Nik')
         ->where('dtks.id',$dataDTKS)
        ->groupBy('Nik')
        ->first();
      //dd($dataDTKS);
        //$dataDTKS = json_decode($product, true);
        return view('search.views',compact('dataDTKS'));
    }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dtks::find($id)->delete();
      
        return response()->json(['success'=>'DTKS deleted successfully.']);
    }

    public function filter(Request $request){
        // dd($request->all());
        $kecamatan = DB::table('master_kecamatan')->get();
        $kelurahan = DB::table('master_kelurahan')->get();

        if($request -> nama_kecamatan || $request -> nama_kelurahan || $request -> nama || $request -> nik || $request -> nokk  ){
            // $dataDTKS = Dtks::latest();
            $auto_search = DB::table('dtks')->select(
            'dtks.id',
            'dtks.Nik',
            'dtks.Nama',
            'dtks.Alamat',
            'dtks.Kecamatan',
            'dtks.Desa_Kelurahan',
            'minyak.Sk_Dtks',
            'bansos.Bansos_BLT_BBM',
            'penerima.Nama_Penerima',
            'psnoka.Ps_Noka',
            'pkh.Data_Bansos_Pkh',
            'umkm.KPM_Bansos',
            'umkm.BLT_BBM',
        )
        ->leftJoin('blt_minyak_gorengs as minyak','minyak.Nik','=','dtks.Nik')
        ->leftJoin('data_blt_bbm as bansos','bansos.Nik','=','dtks.Nik')
        ->leftJoin('data_bpnt as penerima','penerima.Nik','=','dtks.Nik')
        ->leftJoin('data_pbi_daerah as psnoka','psnoka.Nik','=','dtks.Nik')
        ->leftJoin('data_pkh as pkh','pkh.Nik','=','dtks.Nik')
        ->leftJoin('data_umkm as umkm','umkm.Nik','=','dtks.Nik')
        ;

       // dd($request->all);
        $auto_search->where('dtks.Kecamatan', 'like', '%' . @$request->nama_kecamatan . '%')
                    ->where('dtks.Desa_Kelurahan','like','%'.  @$request->nama_kelurahan .'%')
                    ->where('dtks.Nama','like','%'.  @$request->nama .'%')
                    ->where('dtks.Nik','like','%'.  @$request->nik .'%')
                    ->where('dtks.Nokk','like','%'.  @$request->nokk .'%')
                    ->groupBy('Nik')
                    ;

            $dataDTKS = $auto_search
                     ->paginate(request()->input('limit', 20));
                    //  dd($dataDTKS);
        }else{
            $dataDTKS = Dtks::latest()->paginate(request()->input('limit', 20));
        }
        // $kecamatan->nama_kecamatan = $request->Nama_Kecamatan;


        return view('dtksajax',compact('dataDTKS','kecamatan','kelurahan'));
    }

    public function getEmployees(Request $request){

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
  
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
  
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
  
        // Custom search filter 
        $searchCity = $request->get('searchCity');
        $searchGender = $request->get('searchGender');
        $searchName = $request->get('searchName');
  
        // Total records
        $records = dtks::select('count(*) as allcount');
  
        ## Add custom filter conditions
        if(!empty($searchCity)){
            $records->where('Desa_Kelurahan',$searchCity);
        }
        if(!empty($searchGender)){
            $records->where('Kecamatan',$searchGender);
        }
        if(!empty($searchName)){
            $records->where('Nik','like','%'.$searchName.'%');
        }
        $totalRecords = $records->count();
  
        // Total records with filter
        $records = dtks::select('count(*) as allcount')->where('Nik', 'like', '%' .$searchValue . '%');
  
        ## Add custom filter conditions
        if(!empty($searchCity)){
           $records->where('Desa_Kelurahan',$searchCity);
        }
        if(!empty($searchGender)){
           $records->where('Kecamatan',$searchGender);
        }
        if(!empty($searchName)){
           $records->where('Nik','like','%'.$searchName.'%');
        }
        $totalRecordswithFilter = $records->count();
  
        // Fetch records
        $records = dtks::orderBy($columnName,$columnSortOrder)
                   ->select('dtks.*')
                   ->where('dtks.Nik', 'like', '%' .$searchValue . '%');
        ## Add custom filter conditions
        if(!empty($searchCity)){
           $records->where('Desa_Kelurahan',$searchCity);
        }
        if(!empty($searchGender)){
           $records->where('Kecamatan',$searchGender);
        }
        if(!empty($searchName)){
           $records->where('Nik','like','%'.$searchName.'%');
        }
        $employees = $records->skip($start)
                     ->take($rowperpage)
                     ->get();
  
        $data_arr = array();
        foreach($employees as $employee){
  
           $username = $employee->Nama;
           $name = $employee->Nik;
           $email = $employee->Desa_Kelurahan;
           $gender = $employee->Kecamatan;
           $city = $employee->Nokk;
  
           $data_arr[] = array(
               "Nama" => $username,
               "Nik" => $name,
               "Desa_Kelurahan" => $email,
               "Kecamatan" => $gender,
               "Nokk" => $city,
           );
        }
        
  
        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr
        );

        return response()->json($response);
        $data = DB::table('dtks')->orderBy('id');
        
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                       $btn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                       $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                        return $btn;
                })
                ->rawColumns(['action'])
                ->response()
                ->json($response);
     }
}