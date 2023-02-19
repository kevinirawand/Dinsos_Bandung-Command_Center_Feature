<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Datatables;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $roles = Role::orderBy('id','DESC')->paginate(5);
        $permission = Permission::get();
        $role = 'role';
        $users = 'users';
        $dtks = 'dtks';
        $command = 'command';
        $Minyak = 'blt-minyak-gorengs';
        $BltBbm = 'BLT-BBM';
        $data_pkh = 'PKH';
        $Pbi = 'PBI';
        $Umkm = 'UMKM';
        $pengaduan = 'Pengaduan';
        $akses_role = DB::table('permissions')->where('name','LIKE','%'.$role.'%')
                      ->get();
        $akses_user = DB::table('permissions')->where('name','LIKE','%'.$users.'%')
                      ->get();
        $akses_dtks = DB::table('permissions')->where('name','LIKE','%'.$dtks.'%')
                      ->get();
        $akses_command = DB::table('permissions')->where('name','LIKE','%'.$command.'%')
                      ->get();
        $MinyakGorengs = DB::table('permissions')->where('name','LIKE','%'.$Minyak.'%')
                      ->get();
        $Blt_Bbm = DB::table('permissions')->where('name','LIKE','%'.$BltBbm.'%')
                      ->get();
        $Pkh = DB::table('permissions')->where('name','LIKE','%'.$data_pkh.'%')
                      ->get();
        $Pbi_Daerah = DB::table('permissions')->where('name','LIKE','%'.$Pbi.'%')
                      ->get();
        $Data_Umkm = DB::table('permissions')->where('name','LIKE','%'.$Umkm.'%')
                      ->get();
        $role_pengaduan = DB::table('permissions')->where('name','LIKE','%'.$pengaduan.'%')
                      ->get();
        // dd($role_pengaduan);
        if ($request->ajax()) {
        $data = Role::select('name')->get();
        return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        // dd($akses_command);
                      
        // dd($filterData);
        // $permission = DB::table('roles')->lists('name', 'role');
        // dd($permission);
        return view('roles.index',compact('roles','permission','akses_user','akses_role','akses_dtks','akses_command','MinyakGorengs','Blt_Bbm','Pkh','Pbi_Daerah','Data_Umkm','role_pengaduan'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        
        return view('roles.create',compact('permission'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
    
        return view('roles.show',compact('role','rolePermissions'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('roles.edit',compact('role','permission','rolePermissions'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}