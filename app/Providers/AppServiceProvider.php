<?php

namespace App\Providers;

use App\Repositories\Doctor\DoctorRepository;
use App\Repositories\Doctor\DoctorRepositoryInterface;
use App\Repositories\Medication\MedicationRepository;
use App\Repositories\Medication\MedicationRepositoryInterface;
use App\Repositories\Patient\PatientRepository;
use App\Repositories\Patient\PatientRepositoryInterface;
use App\Repositories\Prescription\PrescriptionRepository;
use App\Repositories\Prescription\PrescriptionRepositoryInterface;
use App\Repositories\PrescriptionDetails\PrescriptionDetailsRepository;
use App\Repositories\PrescriptionDetails\PrescriptionDetailsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(MedicationRepositoryInterface::class, MedicationRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(PrescriptionRepositoryInterface::class, PrescriptionRepository::class);
        $this->app->bind(PrescriptionDetailsRepositoryInterface::class, PrescriptionDetailsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
