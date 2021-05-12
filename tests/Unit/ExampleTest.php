<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        $this->assertTrue(true);
    }


    /*

    public function testUserFullNameIsJasonGilmore()
    {
        $fullName = "Jason Gilmore";
        $this->assertEquals("Jason Gilmore", $fullName);
    }

    public function testUserHasFavouritedFiveEvents()
    {
        $favourites = [45, 12, 676, 88, 15];
        $this->assertCount(5, $favourites);
    }
    */
}
