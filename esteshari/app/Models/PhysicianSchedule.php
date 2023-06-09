<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicianSchedule extends Model
{
    use HasFactory;

    protected $table = 'physician_schedule';

    protected $fillable = ['slot_date', 'slot_time'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
