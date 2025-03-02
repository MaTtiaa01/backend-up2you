<?php

namespace App\Http\Controllers;

use App\Http\Repositories\EventRepository;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }


    public function index()
    {
        return $this->eventRepository->index();
    }

    public function store(EventRequest $request)
    {
        $data = $request->validated();
        return $this->eventRepository->store($data);
    }

    public function show($id)
    {
        return $this->eventRepository->show($id);
    }

    public function update(EventRequest $request, $id)
    {
        $data = $request->validated();
        return $this->eventRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->eventRepository->destroy($id);
    }

}
