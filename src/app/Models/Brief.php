<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    protected $table = 'briefs';

    protected $fillable = [
        'title',
        'desc',
        'date_remise',
        'type',
        'sprint_id',
        'created_at'
    ];

    public function sprint()
    {
        return $this->belongsTo(Sprint::class, 'sprint_id');
    }

    public function livrables(){
        return $this->hasMany(Livrable::class, 'brief_id');
    }

    public function evaluations(){
        return $this->hasMany(Evaluation::class, 'brief_id');
    }

    public function skill(){
        return $this->hasMany(Skill::class, 'sprint_id');
    }
}
