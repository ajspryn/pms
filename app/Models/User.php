<?php

namespace App\Models;

use App\Models\Crew\Health;
use App\Models\Crew\History;
use App\Models\Crew\Position;
use App\Models\Crew\Education;
use App\Models\Crew\Experience;
use App\Models\Crew\Certificate;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function certificate()
    {
        return $this->hasMany(Certificate::class);
    }
    public function education()
    {
        return $this->hasMany(Education::class);
    }
    public function experience()
    {
        return $this->hasMany(Experience::class);
    }
    public function health()
    {
        return $this->hasMany(Health::class);
    }
    public function history()
    {
        return $this->hasMany(History::class);
    }
    public function potition()
    {
        return $this->hasMany(Position::class);
    }
}
