<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMeet extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'scheduled_at',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
