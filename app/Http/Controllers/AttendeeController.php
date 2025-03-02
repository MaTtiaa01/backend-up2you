<?php

namespace App\Http\Controllers;

use App\Http\Repositories\AttendeeRepository;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{

    protected $attendeeRepository;

    public function __construct(AttendeeRepository $attendeeRepository)
    {
        $this->attendeeRepository = $attendeeRepository;
    }

    public function index()
    {
        return $this->attendeeRepository->index();
    }

    // TODO handle request verification
    public function store(Request $request)
    {
        return $this->attendeeRepository->store($request);
    }

    public function show($id)
    {
        return $this->attendeeRepository->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->attendeeRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->attendeeRepository->destroy($id);
    }
}
