<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'control_number',
        'student_name',
        'lastname',
        'email',
        'password',
        'telephone',
        'birthdate',
        'gender',
        'street',
        'exterior_number',
        'interior_number',
        'suburb',
        'status',
        'semester',
        'town_id',
        'role_id',
        'career_id',
    ];

    public function town () {
        return $this->belongsTo(Town::class, 'town_id');
    }

    public function role () {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function career () {
        return $this->belongsTo(Career::class, 'career_id');
    }
}
