<?php

namespace App\Models\crew;

use App\Models\Crew\Certificate;
use App\Models\Crew\Education;
use App\Models\Crew\Experience;
use App\Models\Crew\Health;
use App\Models\Crew\History;
use App\Models\Crew\Position;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Crew extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
