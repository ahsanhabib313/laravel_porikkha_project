<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table='notices';
    protected $primaryKey='notice_id';
    public $timestamps = false;
    protected $fillable = [
        'notice_id','title', 'content','date'
    ];
}
