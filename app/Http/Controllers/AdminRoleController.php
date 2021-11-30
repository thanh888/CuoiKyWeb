<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Traits\DeleteModelTrait;

class AdminRoleController extends Controller
{
      use DeleteModelTrait;

    private $role;
    private $permission;
    public function __construct(Role $role,Permission $permission)
    {
      $this->role=$role;
      $this->permission=$permission;
    }
    public function index()
    {
      $role=$this->role->paginate(5);
        return view('admin.role.index',compact('role'));
    }
    public function create()
    {
      $permissionParent=$this->permission->where('parent_id',0)->get();
      
        return view('admin.role.add',compact('permissionParent'));
    }
    public function store(Request $request)
    {
      
      $role=$this->role->create([
        'name'=>$request->name,
        'display_name'=>$request->display_name,
      ]);
      $role->permissions()->attach($request->permission_id);
       return redirect()->route('roles.index');
    }  
    public function edit($id)
    {
      $permissionParent=$this->permission->where('parent_id',0)->get();
      $role=$this->role->find($id);
      $permissionChecked=$role->permissions;
        return view('admin.role.edit',compact('permissionParent','role','permissionChecked'));
    } 
    public function update(Request $request, $id)
    {
      $role=$this->role->find($id);
      $role->update([
        'name'=>$request->name,
        'display_name'=>$request->display_name,
      ]);
      $role->permissions()->sync($request->permission_id);
       return redirect()->route('roles.index');

    }
    public function delete($id)
    {
      
       return $this->deleteModelTraits($id,$this->role);
    }
   

}
