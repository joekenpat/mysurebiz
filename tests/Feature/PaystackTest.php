<?php

namespace Tests\Feature;

//use Faker\Provider\Payment;
use App\General\Payment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaystackTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
//        (new Payment)->PaystackInit()
//        ->assertJson("ok");
        (new Payment)->PaystackConfirmation()
            ->assertJson("ok");
    }
}
