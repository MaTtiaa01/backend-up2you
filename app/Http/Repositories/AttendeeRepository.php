<?php

namespace App\Http\Repositories;

use App\Models\Attendee;

class AttendeeRepository
{
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
}
