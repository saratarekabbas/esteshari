<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HonorAward extends Model
{
    use HasFactory;

    protected $table = 'honors_awards';


    public function educationalQualification()
    {
        return $this->belongsTo(EducationalQualification::class, 'award_id');
    }
}
