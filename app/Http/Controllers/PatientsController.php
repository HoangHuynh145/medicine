<?php

namespace App\Http\Controllers;

use App\Models\patients;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorepatientsRequest;
use App\Http\Requests\UpdatepatientsRequest;
use App\Repositories\Patient\PatientRepositoryInterface;

class PatientsController extends Controller
{

    protected PatientRepositoryInterface $patientRepository;

    public function __construct(
        PatientRepositoryInterface $patientRepository,
    ) {
        $this->patientRepository = $patientRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('patient');
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
    public function store(StorepatientsRequest $request)
    {
        //
        $data = $request->all();
        $this->patientRepository->create($data);
        return redirect()->route('homePage')->with('success', 'Bệnh nhân ' . $data['fullName'] . ' đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(patients $patients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(patients $patients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepatientsRequest $request, patients $patients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(patients $patients)
    {
        //
    }
}
