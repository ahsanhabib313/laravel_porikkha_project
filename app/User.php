<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $table = "users";
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $fillable = [
      'user_id','user_name', 'email', 'password', 'role','semester','remember-token'
    ];


    public function student(){

        return $this->hasOne('App\Student');
    }

}
