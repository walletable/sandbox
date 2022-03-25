<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        $response = $this->actingAs(User::find(1))->get('/login');

        $response->assertStatus(302);

        $response->assertLocation('/');

        //$response->dumpHeaders();
    }
}
