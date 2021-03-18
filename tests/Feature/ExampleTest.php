<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/contact');

        $response->assertSeeText(404);
    }

    public function testHomepageContainsProjectName()
    {
        $response = $this->get('/');

        $response->assertSeeText('Laravel');
    }
}
