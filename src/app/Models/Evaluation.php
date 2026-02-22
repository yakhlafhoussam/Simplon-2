<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';

    protected $casts = [
        'level' => 'array',
    ];

    protected $fillable = [
        'user_id',
        'brief_id',
        'comment',
        'level',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function brief()
    {
        return $this->belongsTo(Brief::class, 'brief_id');
    }
}
