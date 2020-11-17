<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Outbox extends Model
{
   // use SoftDeletes;

    protected $table = "outbox";
    protected $fillable = ['letter_number','date','from','title','file','created_by','trash'];
    //protected $dates = ['deleted_at'];
}
