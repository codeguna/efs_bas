<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inbox extends Model
{
    use SoftDeletes;
    protected $table = "inbox";
    protected $fillable =['letter_number','date','from','title','file','created_by'];
    protected $dates = ['deleted_at'];
}
