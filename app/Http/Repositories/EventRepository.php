<?php

namespace App\Http\Repositories;

use App\Models\Event;

class EventRepository
{
    public function index()
    {
       return Event::all();
    }

    public function store($data)
    {
       $event = Event::create($data->all());
       return response()->json($event, 201);
    }

    public function show($id)
    {
       return Event::findOrFail($id);
    }

    public function update($data, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($data->all());
        return response()->json($event, 200);

    }

    public function destroy($id)
    {
       return Event::destroy($id);
    }

}
