<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'country';

    public function states(){
      return $this->hasMany("App\State","country_id","id");
    }
}
