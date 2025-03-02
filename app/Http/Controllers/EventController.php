<?php

namespace App\Http\Controllers;

use App\Http\Repositories\EventRepository;
use Illuminate\Http\Request;

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

    // TODO handle request verification
    public function store(Request $request)
    {
        return $this->eventRepository->store($request);
    }

    public function show($id)
    {
        return $this->eventRepository->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->eventRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->eventRepository->destroy($id);
    }
}
