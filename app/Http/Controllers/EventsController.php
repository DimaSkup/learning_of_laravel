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
        $events = Event::simplePaginate(10);

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
        //dd($request->input(), $request->description);
        $event = Event::updateOrCreate(
            ['name' => $request->name],
            [
                'city'          => $request->city,
                'street'        => $request->street,
                'enabled'       => (bool)$request->enabled,
                'activated'     => (bool)($request->activated),
                'description'   => $request->description,
                'max_attendees' => $request->max_attendees,
            ]
        );

        $event->save();

        flash('Event created!')->success();

        return redirect()->route('events.show', ['event' => $event->slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @param string $message
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Event $event, Request $request)
    {
        $messageAboutSuccessfulEditing = $request->session()->get('message');
        ($messageAboutSuccessfulEditing) ? flash($messageAboutSuccessfulEditing)->success() : "";

        return view('events.edit')
             ->with('event', $event)
             ->with('messageAboutSuccessfulEditing', $messageAboutSuccessfulEditing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Event $event)
    {
        $event->update(
            $request->input()
        );

        return redirect()
                ->route('events.edit', $event)
                ->with('message', 'The event was successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {

    }
}
