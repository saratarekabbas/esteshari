<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalQualification extends Model
{
    use HasFactory;

    protected $table = 'educational_qualifications';

    protected $fillable = [
        'degree_level',
        'degree_title',
        'institute',
        'institute_location',
        'year_of_graduation',
        'medical_degree_files',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function honorAwards()
    {
        return $this->hasMany(HonorAward::class, 'award_id');
    }
}
