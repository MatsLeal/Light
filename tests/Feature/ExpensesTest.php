<?php

// namespace Tests\Feature;
use App\User;
use App\Type;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExpensesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
    	$user = App\User::find(2);
      $type= $user->types->first();

        $this->actingAs($user)->get('/home')
        	->assertSee($type->description);

    }
}
