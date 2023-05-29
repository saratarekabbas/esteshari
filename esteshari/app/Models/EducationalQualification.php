<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalQualification extends Model
{
    use HasFactory;

    protected $table = 'educational_qualifications';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
