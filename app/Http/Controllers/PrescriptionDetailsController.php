<?php

namespace App\Http\Controllers;

use App\Models\PrescriptionDetails;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrescriptionDetailsRequest;
use App\Http\Requests\UpdatePrescriptionDetailsRequest;

class PrescriptionDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePrescriptionDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PrescriptionDetails $prescriptionDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrescriptionDetails $prescriptionDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrescriptionDetailsRequest $request, PrescriptionDetails $prescriptionDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrescriptionDetails $prescriptionDetails)
    {
        //
    }
}
