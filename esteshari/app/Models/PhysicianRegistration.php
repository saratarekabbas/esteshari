<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicianRegistration extends Model
{
    use HasFactory;

    protected $table = 'physician_registrations';
    protected $fillable = [
        'full_name',
        'phone_number',
        'job_title',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
