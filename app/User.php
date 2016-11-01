<?php namespace App;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


//    public static $rules = array(
//
//        'name'             => 'required',                        // just a normal required validation
//        'email'            => 'required|email|unique:users',     // required and must be unique in the table
//        'role_title' => 'required',
//        'permission_title' => 'required',
//        'image' => 'required',
//        'password' => 'required|min:6|alpha_dash',
//        'confirm_password' => 'same:password|required'
//    );

    /*
    |--------------------------------------------------------------------------
    | ACL Methods  For Permission
    |--------------------------------------------------------------------------
    */


    /*
   |--------------------------------------------------------------------------
   |  To override all permissions
   |--------------------------------------------------------------------------
   */


    public function isAdmin()

    {

        foreach ($this->roles as $role) {

            if ($role->role_slug == 'root') return true;
//            if ($role->role_slug == 'root' || $role->role_slug == 'root' ) return true;

        }

        return false;

    }

    /*
      |--------------------------------------------------------------------------
      | End To override all permissions
      |--------------------------------------------------------------------------
      */


    /**
     * Checks a Permission and if root
     *
     * @param  String permission Slug of a permission (i.e: manage_user)
     * @return Boolean true if has permission, otherwise false
     */
    public function can($permission = null)
    {
//        return !is_null($permission) && $this->checkPermission($permission);
        return !is_null($permission) && $this->checkPermission($permission)|| $this->isAdmin();
    }

    /**
     * Check if the permission matches with any permission user has
     *
     * @param  String permission slug of a permission
     * @return Boolean true if permission exists, otherwise false
     */
    protected function checkPermission($perm)
    {
        $permissions = $this->getAllPermissionsFormAllRoles();

        $permissionArray = is_array($perm) ? $perm : [$perm];

        return count(array_intersect($permissions, $permissionArray));
    }

    /**
     * Get all permission slugs from all permissions of all roles
     *
     * @return Array of permission slugs
     */
    protected function getAllPermissionsFormAllRoles()
    {
        $permissionArray = [];

        $permissions = $this->roles->load('permissions')->pluck ('permissions')->toArray();

        return array_map('strtolower', array_unique(array_flatten(array_map(function ($permission) {

            return array_pluck ($permission, 'permission_slug');

        }, $permissions))));
    }


    /*
      |--------------------------------------------------------------------------
      | ACL Methods  For Roles
      |--------------------------------------------------------------------------
      */

    /**
     * Checks a role
     *
     * @param  String role Slug of a permission (i.e: root)
     * @return Boolean true if has role, otherwise false
     */
    public function hasrole($userrole = null){

        return !is_null($userrole) && $this->checkUserRole($userrole);

    }

    /**
     * Check if User Role match the given role_slug...
     *
     * @param String role slug of a role
     * @return Boolean true if role exists, otherwise false
     */
    protected function checkUserRole($givenrole){
        $getrole= $this->roles->toArray();
        foreach ($getrole as $key){
            if(array_key_exists('role_slug',$key) && $key['role_slug'] == $givenrole){
                return true;
            }
        }
        return false;
    }

    /*
    |--------------------------------------------------------------------------
    | Relationship Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Many-To-Many Relationship Method for accessing the User->roles
     *
     * @return QueryBuilder Object
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);

    }


}