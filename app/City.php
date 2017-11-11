<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'city';

    public function state(){
      return $this->belongsTo("App\State","state_id");
    }
}
