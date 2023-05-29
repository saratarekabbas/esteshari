<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalRegistration extends Model
{
    use HasFactory;

    protected $table = 'professional_registrations';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
