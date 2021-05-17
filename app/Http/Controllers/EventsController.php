<?php

namespace App\Http\Controllers;

use App\Event;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$events = Event::all();

        //$events = Event::simplePaginate(10);      // a pagination
        //$events = Event::withoutGlobalScopes()->get();    // without a global scope
        //$events = Event::enabled()->get();          // with a local scope
        //$events = Event::idRange(25, 34)->enabled()->get();      // with a dynamic local scope
        //$events = Event::findBySlugOrFail('assumenda-tenetur');
        $events = Event::enabled()->get();

        return view('events.index')->with('events', $events);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        dd($event);

        //$event = Event::findOrFail($id);
        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $event->name = $request->name;
        $event->city = $request->city;
        $event->street = $request->street;
        $event->enabled = $request->enabled;
        $event->activated = (bool)($request->activated);
        $event->description = $request->description;
        $event->max_attendees = $request->max_attendees;

        $event->save();

        flash('Event created!')->success();

        return redirect()->route('events.show', ['event' => $event->slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
