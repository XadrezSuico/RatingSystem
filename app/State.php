<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'state';

    public function country(){
      return $this->belongsTo("App\Country","country_id");
    }
}
