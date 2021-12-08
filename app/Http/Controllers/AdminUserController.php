<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTrait;


class AdminUserController extends Controller
{
    use DeleteModelTrait;

    private $user;
    private $role;
    public function __construct(User $user,Role $role)
    {
           $this->user=$user;
           $this->role=$role;

    }
    public function index()
    {
          $users=$this->user->paginate(5);
          return view('admin.user.index',compact('users')); 
    }
    public function create()    
    {
        $role=$this->role->all();
        return view('admin.user.add',compact('role'));
    }
    public function store(Request $request)
    {
       
      
        try {
            DB::beginTransaction();

            $user=$this->user->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);
            $roleIds=$request->role_id;
            $user->roles()->attach($roleIds);
            DB::commit();
            return redirect()->route('users.index');
             
        }  catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 
    
        
    }
    public function edit($id)
    {
        $role=$this->role->all();
        $user=$this->user->find($id);
        $rolesOfUser=$user->roles;
       return view('admin.user.edit',compact('role','user','rolesOfUser'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $this->user->find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);
            $user=$this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
            

        }  catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 
    }
    public function delete($id)
    {
    
               return $this->deleteModelTraits($id,$this->user);
    
    }


        
    
}
