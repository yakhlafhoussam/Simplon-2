<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'title',
        'desc'
    ];

    public function briefs(){
        return $this->hasMany(Brief::class, 'sprint_id');
    }
}
