<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model {

	//

//    protected $fillable = ['role_id', 'user_id'];     // To protect attributes


    protected $table = 'role_user';




//    public function role(){
////        return $this->belongsTo('App\Models\Role');
//        return $this->belongsTo(Role::class);
//
//    }
//
//    public function user(){
////        return $this->belongsTo('App\Models\User');
//        return $this->belongsTo(User::class);
//
//    }

}
