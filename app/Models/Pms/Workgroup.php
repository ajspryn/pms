<?php

namespace App\Models\Pms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workgroup extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'taskjobs_workgroup';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'uuid',
        'ship_id',
        'workgroup_name',
    ];

    public static $validator = [
        'uuid' => 'required',
        'ship_id' => 'required',
        'workgroup_name' => 'required',

    ];
    
    public function taskjobs(): HasMany
    {
        return $this->hasMany(Taskjobs::class);
    }
}
