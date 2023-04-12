<?php

namespace App\Models\Pms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TaskJobsHistory extends Model
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
        return $this->hasMany(ApprovalTaskjobs::class);
    }
    
    public function taskjobs_items(): HasMany
    {
        return $this->hasMany(TaskjobsItemsHistory::class, 'taskjob_id');
    }
    
    
    public function work_group(): BelongsTo
    {
        return $this->belongsTo(Workgroup::class, 'workgroup_id', 'id');
    }
    
    public function template_approval(): HasOne
    {
        return $this->hasOne(TemplateApproval::class);
    }
}
