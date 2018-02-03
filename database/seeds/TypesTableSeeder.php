<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=App\User::all();
        foreach( $users as $user ){
        factory(App\Type::class,20)->make()
          ->each(function ($type) use ($user){
              $user->types()->save($type);
          });
        }
    }
}
