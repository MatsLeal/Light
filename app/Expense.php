<?php

namespace App;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $fillable=['amount','description'];
     public $hidden=[ 'types', 'id','user_id'];

    public function types(){
      return $this->belongsToMany('App\Type');
    }

    public static function  getUserMonthExpenses($month){
        if ($month==0){
            $month= (new Carbon())->month;
        }
	return Auth::user()->expenses->filter( function ($expense) use ($month) {
            return Carbon::parse( $expense->created_at)->month==$month;
        });
    }

    public static function setWeekOfMonth($expenses){

        foreach ($expenses as $expense){
            $expense->weekOfMonth= Carbon::parse($expense->created_at)->weekOfMonth;
        }

        return $expenses;
    }


    public static function setWeekDays($expenses){

        foreach ($expenses as $expense){
            $expense->weekOfMonth= Carbon::parse($expense->created_at)->weekOfMonth;
            $expense->day= Carbon::parse($expense->created_at)->day;
            $expense->dayOfWeek= Carbon::parse($expense->created_at)->dayOfWeek;
        }
    	return $expenses;
    }



}
