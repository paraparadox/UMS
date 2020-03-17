<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SomeUnbelievableTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_This_Test_Surely_Will_Crash_Your_App()
    {
        $response = $this->get('/');
        //I want your app to crash !! :AAA
        $response->assertStatus('Wanked');
    }
}
