<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Person extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'person';

    public function federation(){
      return $this->belongsTo("App\Federation","federation_id");
    }

    public function setBirthday($birthday){
      $datetime = DateTime::createFromFormat('d/m/Y', $birthday);
      if($datetime){
          $this->birthday = $datetime->format("Y-m-d");
      }else
          return false;
    }

    public function getBirthday(){
      $datetime = DateTime::createFromFormat('Y-m-d', $this->birthday);
      if($datetime){
          return $datetime->format("d/m/Y");
      }else
          return false;
    }
}
