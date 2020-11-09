<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $table = "inbox";
    protected $fillable = ['letter_number','date','from','title','file'];
    protected $dates = ['date'];
    protected $casts = ['date'  => 'date:Y-m-d'];
}
