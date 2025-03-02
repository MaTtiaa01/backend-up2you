<?php

namespace App\Http\Repositories;

use App\Mail\AttendeeRegistered;
use App\Models\Attendee;
use Illuminate\Support\Facades\Mail;

class AttendeeRepository
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index()
    {
        return Attendee::all();
    }

    public function store($data)
    {
        $attendee = Attendee::create($data->all());
        return response()->json($attendee, 201);
    }

    public function show($id)
    {
        return Attendee::findOrFail($id);
    }

    public function update($data, $id)
    {
        $attendee = Attendee::findOrFail($id);
        $attendee->update($data->all());
        return response()->json($attendee, 200);
    }

    public function destroy($id)
    {
        return Attendee::destroy($id);
    }

    public function register($data)
    {
        $eventID = $data['event_id'];
        $attendeeEmail = $data['email'];
        $event = $this->eventRepository->show($eventID);

         // Check if the maximum number of attendees has been reached
         if ($event->attendees()->count() >= $event->max_attendees) {
            return response()->json(['message' => 'Maximum number of attendees reached'], 400);
        }

        // Check if the attendee has already registered for the event
        $attendee = Attendee::where('email', $attendeeEmail)->first();
        if ($attendee && $event->attendees()->where('attendee_id', $attendee->id)->exists()) {
            return response()->json(['message' => 'Attendee already registered for this event'], 400);
        }

        // Register the attendee
        if (!$attendee) {
            $attendee = new Attendee();
            $attendee->email = $attendeeEmail;
            $attendee->save();
        }

        $event->attendees()->attach($attendee->id);

        Mail::to($attendeeEmail)->send(new AttendeeRegistered($event));

       return response()->json(null, 204);

    }
}
