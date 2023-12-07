<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medications extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicationName',
        'unit',
        'doseMin',
        'doseMax',
        'frequencyMax',
    ];
}
