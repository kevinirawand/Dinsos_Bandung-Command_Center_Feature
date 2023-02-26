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
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permission = Permission::get();
        $role = 'role';
        $users = 'users';
        $dtks = 'dtks';
        $command = 'command';
        $akses_role = DB::table('permissions')->where('name','LIKE','%'.$role.'%')
                      ->get();
        $akses_user = DB::table('permissions')->where('name','LIKE','%'.$users.'%')
                      ->get();
        $akses_dtks = DB::table('permissions')->where('name','LIKE','%'.$dtks.'%')
                      ->get();
        $akses_command = DB::table('permissions')->where('name','LIKE','%'.$command.'%')
                      ->get();
        if($request->ajax()) {
  
            $data = role::latest()->get();
  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                         
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            
        }
        
        return view('roles.index',compact('permission','akses_user','akses_role','akses_dtks','akses_command'));
        // $roles = Role::orderBy('id','DESC')->paginate(5);
        // $permission = Permission::get();
 
        // if ($request->ajax()) {
        // $data = Role::select('name')->get();
        // return Datatables::of($data)->addIndexColumn()
        //     ->addColumn('action', function($row){
        //         $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
        //         return $btn;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
        // }
        // return view('roles.index',compact('roles','permission','akses_user','akses_role','akses_dtks','akses_command'))
        //     ->with('i', ($request->input('page', 1) - 1) * 5);
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
        // $this->validate($request, [
        //     'name' => 'required|unique:roles,name',
        //     'permission' => 'required',
        // ]);
    
        // $role = Role::create(['name' => $request->input('name')]);
        // $role->syncPermissions($request->input('permission'));
    
        // return redirect()->route('roles.index')
        //                 ->with('success','Role created successfully');
        Role::updateOrCreate([
            'id' => $request->id
        ],
        [
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
        // $permission = Permission::get();
        // $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)->get();
        // foreach ($rolePermissions as $key => $value) {
        //     $value->akses =  DB::table("permissions")->where("permissions.id",$value->permission_id)->pluck('permissions.name','permissions.name');
        // }
        // dd($rolePermissions->role_id);
        $RoleHasPermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)->get();
            
        // dd($RoleHasPermissions);
        // select role_has_permissions where role_id(roles.id)
        foreach ($RoleHasPermissions  as $value) {
            // DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)->get();
            $value->akses =  DB::table("permissions")->where("id",$value->permission_id)->pluck('permissions.name');
            // dd($value);
        }
        //    dd($RoleHasPermissions);
        return response()->json([
            'role' => $role,
            // 'permission' => $permission,
            'rolePermissions' => $RoleHasPermissions,
        ]);
        // return view('roles.edit',compact('role','permission','rolePermissions'));
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