<?php

namespace App\Repositories\PrescriptionDetails;

use App\Models\PrescriptionDetails;
use App\Repositories\BaseRepository;

class PrescriptionDetailsRepository extends BaseRepository implements PrescriptionDetailsRepositoryInterface {
    public function __construct(PrescriptionDetails $model) {
        parent::__construct($model);
    }
}
