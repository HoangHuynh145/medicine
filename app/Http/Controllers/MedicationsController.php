<?php

namespace App\Http\Controllers;

use App\Models\medications;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoremedicationsRequest;
use App\Http\Requests\UpdatemedicationsRequest;
use App\Repositories\Medication\MedicationRepositoryInterface;

class MedicationsController extends Controller
{
    protected MedicationRepositoryInterface $medicationRepository;

    public function __construct(
        MedicationRepositoryInterface $medicationRepository,
    ) {
        $this->medicationRepository = $medicationRepository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('medication');
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
    public function store(StoremedicationsRequest $request)
    {
        //
        $data = $request->all();
        $this->medicationRepository->create($data);
        return redirect()->route('homePage')->with('success', 'Thuốc ' . $data['medicationName'] . ' đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(medications $medications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(medications $medications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemedicationsRequest $request, medications $medications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(medications $medications)
    {
        //
    }
}
