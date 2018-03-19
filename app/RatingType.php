<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingType extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'ratingType';
}
