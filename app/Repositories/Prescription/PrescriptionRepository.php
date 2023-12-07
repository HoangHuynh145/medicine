<?php

namespace App\Repositories\Prescription;

use App\Models\prescriptions;
use App\Repositories\BaseRepository;

class PrescriptionRepository extends BaseRepository implements PrescriptionRepositoryInterface {
    public function __construct(prescriptions $model) {
        parent::__construct($model);
    }
}
