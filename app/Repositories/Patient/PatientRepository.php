<?php

namespace App\Repositories\Patient;

use App\Models\patients;
use App\Repositories\BaseRepository;

class PatientRepository extends BaseRepository implements PatientRepositoryInterface {
    public function __construct(patients $model) {
        parent::__construct($model);
    }
}
