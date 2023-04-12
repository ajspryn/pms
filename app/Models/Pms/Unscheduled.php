<?php

namespace App\Models\Pms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unscheduled extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'taskjobs';
    protected $fillable = [
        'ship_id',
        'uuid',
        'unit_uuid',
        'component_uuid',
        'part_uuid',
        'nama',
        'deskripsi',
        'id_user',
        'type_maintenance',
        'approval_id',
        'is_unscheduled',
    ];

    public static $validator = [
        'ship_id' => 'required',
        'uuid' => 'required',
        'unit_uuid' => 'nullable',
        'component_uuid' => 'nullable',
        'part_uuid' => 'nullable',
        'nama' => 'required',
        'deskripsi' => 'required',
        'id_user' => 'nullable',
        'type_maintenance' => 'nullable',
        'approval_id' => 'nullable',
        'is_unscheduled' => 'required',

    ];

    public function approve_taskjobs(): HasMany
    {
        return $this->hasMany(MaintenanceApproval::class, 'taskjob_id');
    }

    public function taskjobs_items(): HasMany
    {
        return $this->hasMany(TaskjobsItems::class, 'taskjob_id');
    }


    public function work_group(): BelongsTo
    {
        return $this->belongsTo(Workgroup::class, 'workgroup_id', 'id');
    }

    public function template_approval(): BelongsTo
    {
        return $this->belongsTo(TemplateApproval::class, 'approval_id', 'kode_template');
    }
}
