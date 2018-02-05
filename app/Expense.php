<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $fillable=['amount','description'];

    public function types(){
      return $this->belongsToMany('App\Type');
    }

}
