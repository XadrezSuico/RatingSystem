<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'person';

    public function federation(){
      return $this->belongsTo("App\Federation","federation_id");
    }
}
