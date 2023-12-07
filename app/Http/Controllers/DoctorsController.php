<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoredoctorsRequest;
use App\Http\Requests\UpdatedoctorsRequest;
use App\Repositories\Doctor\DoctorRepositoryInterface;

class DoctorsController extends Controller
{
    protected DoctorRepositoryInterface $doctorRepository;

    public function __construct(
        DoctorRepositoryInterface $doctorRepository,
    ) {
        $this->doctorRepository = $doctorRepository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('doctor');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredoctorsRequest $request)
    {
        //
        $data = $request->all();
        $this->doctorRepository->create($data);
        return redirect()->route('homePage')->with('success', 'Bác sĩ ' . $data['fullName'] . ' đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(doctors $doctors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(doctors $doctors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedoctorsRequest $request, doctors $doctors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(doctors $doctors)
    {
        //
    }
}
