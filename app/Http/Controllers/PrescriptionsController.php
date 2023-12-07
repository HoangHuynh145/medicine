<?php

namespace App\Http\Controllers;

use App\Models\prescriptions;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateprescriptionsRequest;
use App\Repositories\Doctor\DoctorRepositoryInterface;
use App\Repositories\Medication\MedicationRepositoryInterface;
use App\Repositories\Patient\PatientRepositoryInterface;
use App\Repositories\Prescription\PrescriptionRepositoryInterface;
use App\Repositories\PrescriptionDetails\PrescriptionDetailsRepositoryInterface;
use Illuminate\Http\Request;

class PrescriptionsController extends Controller
{
    protected PrescriptionRepositoryInterface $prescriptionRepository;
    protected PrescriptionDetailsRepositoryInterface $prescriptionDetailsRepository;
    protected DoctorRepositoryInterface $doctorRepository;
    protected PatientRepositoryInterface $patientRepository;
    protected MedicationRepositoryInterface $medicationRepository;

    public function __construct(
        PrescriptionRepositoryInterface $prescriptionRepository,
        PrescriptionDetailsRepositoryInterface $prescriptionDetailsRepository,
        DoctorRepositoryInterface $doctorRepository,
        PatientRepositoryInterface $patientRepository,
        MedicationRepositoryInterface $medicationRepository
    ) {
        $this->prescriptionRepository = $prescriptionRepository;
        $this->doctorRepository = $doctorRepository;
        $this->patientRepository = $patientRepository;
        $this->medicationRepository = $medicationRepository;
        $this->prescriptionDetailsRepository = $prescriptionDetailsRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //::paginate(10)
        $prescriptionsResponse = $this->prescriptionRepository->all(2);
        $prescriptions = [];
        $prescriptionsPagging = prescriptions::paginate(2);
        $medications = [];
        foreach ($prescriptionsResponse as $key => $value) {
            $doctor = $this->doctorRepository->find($value->doctorID, 'fullName');
            $patient = $this->patientRepository->findAttributes('phone', $value->patientsPhone, ['fullName', 'phone', 'created_at'])->first();
            $prescriptionsResponse = $this->prescriptionDetailsRepository->findAttributes('prescriptionId', $value->id)->get();
            foreach ($prescriptionsResponse as $key => $medication) {
                $medicationInfo = $this->medicationRepository->find($medication['medicationId'], ['medicationName', 'unit']);
                $mergedArray = $medicationInfo->toArray() + $medication->toArray();
                $medications[] = $mergedArray;
            }
            
            $prescriptions[] = [
                'id' => $value->id,
                'doctor' => $doctor->fullName,
                'patientPhone' => $patient->phone,
                'patientName' => $patient->fullName,
                'createdAt' => $value->created_at,
                'medications' => $medications
            ];

            $medications = [];
        }


        return view('welcome', compact(['prescriptions', 'prescriptionsPagging']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $doctors = $this->doctorRepository->all(100, ['id', 'fullName'])->toArray()['data'];
        $medications = $this->medicationRepository->all(100)->toArray()['data'];
        $patients = $this->patientRepository->all(100, ['id', 'fullName', 'phone'])->toArray()['data'];
        return view('prescription', compact(['doctors', 'medications', 'patients']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dataPrescription = [
            'patientsPhone' => $request->patientsPhone,
            'doctorID' => $request->doctorID
        ];
        $responsePrescription = $this->prescriptionRepository->create($dataPrescription);

        foreach ($request->medicationId as $index => $medicationId) {
            $this->prescriptionDetailsRepository->create([
                'prescriptionId' => $responsePrescription->id,
                'medicationId' => $medicationId,
                'singleDose' => $request->singleDose[$index],
                'frequency' => $request->frequency[$index],
                'quantity' => $request->quantity[$index],
            ]);
        };
        return redirect()->route('homePage')->with('success', 'Tạo đơn thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(prescriptions $prescriptions)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prescriptions $prescriptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprescriptionsRequest $request, prescriptions $prescriptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prescriptions $prescriptions)
    {
        //
    }
}
