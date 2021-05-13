<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class EventTest extends TestCase
{
    use RefreshDatabase;

    public function testEventDateTimeFieldIsACarbonObject()
    {
        $event = factory(\App\Event::class)->make();

        $this->assertTrue(is_a($event->started_at, 'Illuminate\Support\Carbon'));
    }

    public function testEventNameCapitalizationIsCorrect()
    {
        /*
        $event = factory(\App\Event::class)->make([
                'name'      => "have fun WITH the Raspberry Pi"
        ]);
        */

        //$event = factory(\App\Event::class)->states('incorrect_capitalization')->make();
        //echo "\na capitalization is correct";

        $event = factory(\App\Event::class)->states('incorrect_capitalization')->create();
        factory(\App\Event::class)->states('incorrect_capitalization')->create();
        factory(\App\Event::class)->states('incorrect_capitalization')->create();


        $this->assertEquals($event->name, "Have Fun with the Raspberry Pi");
        $events = [];
        $events[] = \App\Event::find(1);
        $events[] = \App\Event::find(2);
        $events[] = \App\Event::find(3);
        dd($events);
    }
}
