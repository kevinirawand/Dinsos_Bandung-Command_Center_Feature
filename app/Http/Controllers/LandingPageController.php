<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datacetak;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::table('data_cetak as u')->select(
                'u.id',
                'u.Nik',
                'u.Nama',
                'u.Bansos',
                'u.Kecamatan',
                'u.Uhc',
                'u.Dapodik',
            )->orderBy('id', 'DESC');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('Nik'))) {
                            $instance->where(function($w) use($request){
                            $search = $request->get('Nik');
                            $kecamatan = $request->get('carikecamatan');
                            $w->Where($kecamatan, 'LIKE', "%$search%");
                            // ->orWhere($kecamatan, 'LIKE', "%$search%");
                        });
                    }
                        if (!empty($request->get('filter'))) {
                                $instance->where(function($w) use($request){
                                $search = $request->get('filter');
                                $kecamatan = $request->get('cari');
                                $w->Where($kecamatan, 'LIKE', "%$search%");
                                // ->orWhere($kecamatan, 'LIKE', "%$search%");
                            });
                        }
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            
        }
        return view('landing-page.index');       
    }
    public function allPosts(Request $request)
    {
        
        $columns = array( 
                            0 =>'id', 
                            1 =>'Nik',
                            2=> 'Nama',
                        );
  
        $totalData = datacetak::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $posts = datacetak::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $posts =  datacetak::where('Nik','LIKE',"%{$search}%")
                            ->orWhere('Nama', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = datacetak::where('Nik','LIKE',"%{$search}%")
                             ->orWhere('Nama', 'LIKE',"%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                // $show =  route('posts.show',$post->id);
                // $edit =  route('posts.edit',$post->id);

                $nestedData['id'] = $post->id;
                $nestedData['Nik'] = $post->Nik;
                $nestedData['Nama'] = $post->Nama;
                // $nestedData['body'] = substr(strip_tags($post->body),0,50)."...";
                // $nestedData['created_at'] = date('j M Y h:i a',strtotime($post->created_at));
                // $nestedData['options'] = "&emsp;<a href='{$show}' title='SHOW' ><span class='glyphicon glyphicon-list'></span></a>
                //                           &emsp;<a href='{$edit}' title='EDIT' ><span class='glyphicon glyphicon-edit'></span></a>";
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 
        
    }
}
