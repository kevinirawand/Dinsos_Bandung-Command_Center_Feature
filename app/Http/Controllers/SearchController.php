<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dtks;
use Yajra\Datatables\Datatables;
class SearchController extends Controller
{
   public function index()
    {
      $kecamatan = DB::table('master_kecamatan')->get();
      $kelurahan = DB::table('master_kelurahan')->get();
        return view('search.index',compact('kecamatan','kelurahan'));
    }
    public function CCTV()
    {
        return view('search.CCTV');
    }
    
      public function getUsers(){
   
        $employees = Dtks::orderby('id','asc')->select('*')->get(); 
        
        // Fetch all records
        $response['data'] = $employees;
   
        return response()->json($response);
      }
      public function getUserbyid(Request $request)
      {
        $kecamatan = DB::table('master_kecamatan')->get();
        $kelurahan = DB::table('master_kelurahan')->get();
          if($request->ajax()) {
              $output = '';
              if($request->search){
                $products = Dtks::where('Nik', 'LIKE', '%'.$request->search.'%')
                  ->orWhere('Desa_Kelurahan', 'LIKE', '%'.$request->search.'%')
                  // ->orWhere('price', 'LIKE', '%'.$request->search.'%')
                  ->paginate(request()
                  ->input('limit', 20));
              }elseif($request->search2){
                $products = Dtks::where('Nik', 'LIKE', '%'.$request->search2.'%')
                    ->orWhere('Kecamatan', 'LIKE', '%'.$request->search2.'%')
                    // ->orWhere('price', 'LIKE', '%'.$request->search.'%')
                    ->paginate(request()
                    ->input('limit', 20));
              }
       
            
              if($products) {
  
                  foreach($products as $product) {
  
                      $output .=
                      '
           
                          <tr>
                              <td>'.$product->Nik.'</td>
                              <td>'.$product->Nama.'</td>
                              <td>'.$product->Kecamatan.'</td>
                              <td>'.$product->Desa_Kelurahan.'</td>
                          </tr>
                    ';
  
                  }
  
                  return response()->json($output);
  
              }
          }
  
          return view('search.index',compact('kecamatan','kelurahan'));
  
      }
}