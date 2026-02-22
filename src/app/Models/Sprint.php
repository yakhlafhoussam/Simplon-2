<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $table = 'sprints';

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'created_at'
    ];

    public function briefs(){
        return $this->hasMany(Brief::class, 'sprint_id');
    }
}
