<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescriptionId',
        'medicationId',
        'singleDose',
        'frequency',
        'quantity'
    ];
}
