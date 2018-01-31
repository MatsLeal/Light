<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $fillable=['amount','description'];
}
