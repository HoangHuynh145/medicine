<?php

namespace App\Repositories\Doctor;

use App\Models\doctors;
use App\Repositories\BaseRepository;

class DoctorRepository extends BaseRepository implements DoctorRepositoryInterface {
    public function __construct(doctors $model) {
        parent::__construct($model);
    }
}
