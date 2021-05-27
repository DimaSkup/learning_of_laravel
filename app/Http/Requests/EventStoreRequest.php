<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string|min:10|max:50',
            'city'          => 'required|string|min:3|max:50',
            'street'        => 'required|string|min:3|max:50',
            'max_attendees' => 'required|integer|min:2|max:5',
            'description'   => 'required|string',
            'state_id'      => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'required'      => 'Please provide an event :attribute',
            'max_attendees.required'    => 'What is the maximum number of
                attendees allowed to attend your event?',
            'name.min'      => 'Event names must consist of at least 10 characters',
            'name.max'      => 'Event names cannot be longer that 50 characters',
            'max_attendees.digits_between'  => 'We try to keep event cozy,
                consisting of between 2 and 5 attendees, including you.',
        ];
    }
}
