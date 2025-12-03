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
        'image_path',
        'caption',
    ];

    protected $hidden = [
        'created_at',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = self::generateUniqueId();
            }
        });
    }

    /**
     * Generate unique meme ID
     */
    public static function generateUniqueId()
    {
        do {
            $id = strtoupper(substr(bin2hex(random_bytes(3)), 0, 5));
        } while (self::where('id', $id)->exists());

        return $id;
    }

    /**
     * Relasi dengan User - setiap meme dimiliki oleh satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
