<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'role'
    ];

    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function personalInformation() //section1
    {
        return $this->hasOne(PersonalInformation::class, 'user_id');
    }

    public function educationalQualification() //section2
    {
        return $this->hasMany(EducationalQualification::class, 'user_id');
    }

    public function workExperience() //section3
    {
        return $this->hasOne(WorkExperience::class, 'user_id');
    }

    public function boardCertification() //section4
    {
        return $this->hasOne(BoardCertification::class, 'user_id');
    }

    public function professionalRegistration() //section5
    {
        return $this->hasOne(ProfessionalRegistration::class, 'user_id');
    }

    public function physicianReference() //section6
    {
        return $this->hasOne(PhysicianReference::class, 'user_id');
    }

    public function langaugeQualification() //section7
    {
        return $this->hasOne(LanguageQualification::class, 'user_id');
    }

    public function insurance() //section8
    {
        return $this->hasOne(Insurance::class, 'user_id');
    }

    public function physicianSchedule() //schedule
    {
        return $this->hasMany(PhysicianSchedule::class, 'user_id');
    }

    public function patientSchedule()
    {
        return $this->hasMany(PhysicianSchedule::class, 'patient_id');
    }

}
