<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livrable extends Model
{
    protected $table = 'livrables';

    protected $fillable = [
        'url',
        'comment',
        'user_id',
        'brief_id',
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
