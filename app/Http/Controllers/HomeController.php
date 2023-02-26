<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dtks;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = DB::table('data_pbi_daerah')->count();
        $data_pkh = DB::table('data_pkh')->count();
        $data_bpnt = DB::table('data_bpnt')->count();
        $data_blt_bbm = DB::table('data_blt_bbm')->count();
        $blt_minyak_gorengs = DB::table('blt_minyak_gorengs')->count();
        $data_umkm = DB::table('data_umkm')->count();
        $Binong = DB::table('dtks')->where('Desa_Kelurahan','LIKE','%'.'Binong'.'%')
        ->count();
       
        return view('home', compact('count','data_pkh','data_bpnt','data_blt_bbm','blt_minyak_gorengs','data_umkm','Binong'));
    }
}
