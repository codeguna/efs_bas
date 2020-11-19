<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Inbox extends Model
{
    //use SoftDeletes;
    protected $table = "inbox";
    protected $fillable =['letter_number','date','from','title','type','file','created_by','trash'];
    //protected $dates = ['deleted_at'];
}
