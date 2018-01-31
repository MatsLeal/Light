<?php

// namespace Tests\Feature;
use App\User;

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
    	$user = App\User::first();
    	$expense=$user->expenses->first();

        $this->actingAs($user)->get('/expenses')
        	->assertSeeText($expense->description)
        ;
    }
}
