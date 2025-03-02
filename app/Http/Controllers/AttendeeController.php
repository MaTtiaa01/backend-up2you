<?php

namespace App\Http\Controllers;

use App\Http\Repositories\AttendeeRepository;
use App\Http\Requests\AttendeeRequest;
use App\Http\Requests\RegistrationRequest;

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

    public function store(AttendeeRequest $request)
    {
        $data = $request->validated();
        return $this->attendeeRepository->store($data);
    }

    public function show($id)
    {
        return $this->attendeeRepository->show($id);
    }

    public function update(AttendeeRequest $request, $id)
    {
        $data = $request->validated();
        return $this->attendeeRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->attendeeRepository->destroy($id);
    }

    public function register(RegistrationRequest $request)
    {
        $data = $request->validated();
        return $this->attendeeRepository->register($data);
    }
}
