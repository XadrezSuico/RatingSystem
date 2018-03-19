<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'type';
}
