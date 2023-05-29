<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageQualification extends Model
{
    use HasFactory;

    protected $table = 'language_qualifications';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
