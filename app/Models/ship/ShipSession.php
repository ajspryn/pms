<?php

namespace App\Models\ship;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipSession extends Model
{
    use HasFactory;

    protected $table = 'user_ship_session';

    protected $fillable = [
        'user_id',
        'ship_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }
}
