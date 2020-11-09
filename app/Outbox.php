<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DataTables;

class Outbox extends Model
{
    use SoftDeletes;
    protected $table ="outbox";
    protected $fillable =['letter_number','date','from','title','file','created_by'];
    protected $dates = ['deleted_at'];
}
