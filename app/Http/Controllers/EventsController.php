<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use App\State;

use App\Http\Requests\EventStoreRequest;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        $user = User::firstWhere('id', 2);
        $user->profile()->delete();

        //$events = Event::all();

        //$events = Event::simplePaginate(10);      // a pagination
        //$events = Event::withoutGlobalScopes()->get();    // without a global scope
        //$events = Event::enabled()->get();          // with a local scope
        //$events = Event::idRange(25, 34)->enabled()->get();      // with a dynamic local scope
        //$events = Event::findBySlugOrFail('assumenda-tenetur');
        $events = Event::simplePaginate(10);

        // A flash-message
        $messageAboutSuccessfulDeleting = $request->session()->get('messageEventWasDeleted');
        ($messageAboutSuccessfulDeleting) ? flash($messageAboutSuccessfulDeleting)->success() : null;

        return view('events.index')
                ->with('events', $events)
                ->with('messageAboutSuccessfulDeleting');
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
     * @param  EventStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    //public function store(EventStoreRequest $request)
    public function store(EventStoreRequest $request)
    {
        //$this->storeEventValidator($request);

        $state = State::where('id', $request->state_id)->first();      // here we confirm the ID does in fact belong to a record in the states table
        if ($state == null) {                           // if there is no such a state with this id
            flash("You cannot create an event with such a state!")->error();
            return redirect()->route('events.create');
        }

        $event = Event::updateOrCreate(
            ['name' => $request->name],
            [
                'city'          => $request->city,
                'street'        => $request->street,
                'enabled'       => (bool)$request->enabled,
                'activated'     => (bool)($request->activated),
                'description'   => $request->description,
                'max_attendees' => $request->max_attendees,
                'state_id'      => $state->id,
            ]
        );

        //$event->save();

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
        $messageAboutSuccessfulEditing = $request->session()->get('messageEventWasEdited');
        ($messageAboutSuccessfulEditing) ? flash($messageAboutSuccessfulEditing)->success() : null;

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
                ->with('messageEventWasEdited', 'The event was successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()
                ->route('events.index')
                ->with('messageEventWasDeleted', 'The events has been deleted!');
    }




    private function storeEventValidator(Request $request)
    {
        $rules = [
            'name'          => 'required|string|min:10|max:50',
            'city'          => 'required|string|min:3|max:50',
            'street'        => 'required|string|min:3|max:50',
            'max_attendees' => 'required|numeric|min:2|max:5',
            'description'   => 'required|string',
        ];

        $messages = [
            'required'      => 'Please provide an event :attribute',
            'max_attendees.required'    => 'What is the maximum number of
                attendees allowed to attend your event?',
            'name.min'      => 'Event names must consist of at least 10 characters',
            'name.max'      => 'Event names cannot be longer that 50 characters',
            'max_attendees.digits_between'  => 'We try to keep event cozy,
                consisting of between 2 and 5 attendees, including you.'
        ];

        $inputFormData = $request->input();
        //$inputFormData['max_attendees'] = (int)$inputFormData['max_attendees'];
        //$inputFormData['state_id'] = (int)$inputFormData['state_id'];

        Validator::make($inputFormData, $rules, $messages)->validate();
    }
}
