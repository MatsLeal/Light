<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    public $fillable=['amount','description'];

    public function types(){
      return $this->belongsToMany('App\Type');
    }
}
