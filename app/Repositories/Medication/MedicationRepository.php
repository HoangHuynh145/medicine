<?php

namespace App\Repositories\Medication;

use App\Models\medications;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class MedicationRepository extends BaseRepository implements MedicationRepositoryInterface {
    public function __construct(medications $model) {
        parent::__construct($model);
    }
}
