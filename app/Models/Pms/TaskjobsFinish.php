<?php

namespace App\Models\Pms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskjobsFinish extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'taskjobs_history';
    protected $fillable = [
        'ship_id',
        'uuid',
        'unit_uuid',
        'component_uuid',
        'part_uuid',
        'nama',
        'deskripsi',
        'running_hour',
        'life_time',
        'left_hour',
        'freq_interval_type',
        'freq_interval',
        'interval_hour',
        'est_biaya',
        'kritikal',
        'start_job',
        'end_job',
        'due_date',
        'id_user',
        'type_maintenance',
        'workgroup_id',
        'reminder',
        'approval_id',
        'maintenance_status',
        'pms_status',
    ];

    public static $validator = [
        'ship_id' => 'required',
        'uuid' => 'required',
        'unit_uuid' => 'nullable',
        'component_uuid' => 'nullable',
        'part_uuid' => 'nullable',
        'nama' => 'required',
        'deskripsi' => 'required',
        'running_hour' => 'required',
        'life_time' => 'required',
        'left_hour' => 'required',
        'freq_interval_type' => 'required',
        'freq_interval' => 'required',
        'interval_hour' => 'required',
        'est_biaya' => 'required',
        'kritikal' => 'required',
        'start_job' => 'nullable',
        'end_job' => 'nullable',
        'due_date' => 'nullable',
        'id_user' => 'nullable',
        'type_maintenance' => 'nullable',
        'reminder' => 'nullable',
        'approval_id' => 'nullable',
        'workgroup_id' => 'nullable',
        'maintenance_status' => 'nullable',

    ];
    
    public function approve_taskjobs(): HasMany
    {
        return $this->hasMany(MaintenanceApprovalHistory::class, 'taskjob_id');
    }
    
    public function taskjobs_items(): HasMany
    {
        return $this->hasMany(TaskjobsItemsHistory::class, 'taskjob_id');
    }
    public function ship(): BelongsTo
        {
            return $this->belongsTo(Ship::class);
        }
        public function reminderst()
        {
            return $this->belongsTo(Reminder::class, 'reminder', 'id');
        }
    
    public function komen(): HasMany
    {
        return $this->hasMany(TaskjobsDetailHistory::class, 'taskjob_id');
    }
    public function user()
        {
            return $this->belongsTo(User::class, 'id_user');
        }
    
    
    public function work_group(): BelongsTo
    {
        return $this->belongsTo(Workgroup::class, 'workgroup_id', 'id');
    }
    
    public function template_approval(): BelongsTo
    {
        return $this->belongsTo(TemplateApproval::class, 'approval_id', 'kode_template');
    }
    public function templateapproval(): BelongsTo
    {
        return $this->belongsTo(TemplateApproval::class, 'approval_id', 'kode_template');
    }
    
    
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_uuid', 'uuid');
    }
    public function part(): BelongsTo
    {
        return $this->belongsTo(Part::class, 'part_uuid', 'uuid');
    }
    public function component(): BelongsTo
    {
    return $this->belongsTo(Component::class, 'component_uuid', 'uuid');
    }
}
