<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'name',
        'school_year',
        'created_at'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function student()
    {
        return $this->hasMany(User::class, 'class_id')->where('role', 'student');
    }

    public function teacher()
    {
        return $this->hasOne(User::class, 'class_id')->where('role', 'teacher');
    }
}
