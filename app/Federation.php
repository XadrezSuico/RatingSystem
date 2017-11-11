<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Federation extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'federation';
}
