<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $table = 'work_experiences';

    protected $fillable = [
        'job_title',
        'employer_name',
        'employment_type',
        'start_date_of_employment',
        'end_date_of_employment',
        'current_role',
        'job_location_city',
        'job_location_country',
        'location_type',
        'job_description',
        'job_experience_files',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
