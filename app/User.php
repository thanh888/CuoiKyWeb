<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
    }
    public function message() {
        return $this->hasMany("App\Models\Message");
    }
    public function checkPermissionAccess($permissionCheck)
    {
        //B1 lấy được tất cả các quền của user đang được login trong hệ thống
        $roles=auth()->user()->roles;
        foreach($roles as $role){
            
            $permissions=$role->permissions;
            if ($permissions->contains('key_code',$permissionCheck)) {
                return true;
            }
        }

        //B2 so sánh giá trị đưa vào của router hiện tại xem có tồn tại trong các quền mà mk lấy được hay không
        return false;
    }

}