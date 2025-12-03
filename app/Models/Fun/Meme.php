<?php

namespace App\Models\Fun;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Meme extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'user_id',
    ];

    protected $hidden = [
        'created_at',
    ];

    /**
     * Relasi dengan User - setiap meme dimiliki oleh satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
