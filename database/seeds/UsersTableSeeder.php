<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\User::class,50)->create()
    		->each(function ($user){
    			factory(App\Expense::class,20)->make()
    			->each( function ($expense) use ($user){
    				$user->expenses()->save($expense);
    			});
    		});
    	;
    }
}
