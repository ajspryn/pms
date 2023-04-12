<?php

namespace App\Models\Pms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApprovalMaintenanceHistory extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'approval_maintenance_history';
    public $timestamps = false;
    protected $fillable = [
        'taskjob_id',
        'user_id',
        'is_approved',
        'type_approve',
    ];

    public static $validator = [
        'taskjob_id' => 'required',
        'user_id' => 'required',
        'is_approved' => 'required',
        'type_approve' => 'required',
    ];
    
    public function taskjobs(): BelongsTo
    {
        return $this->belongsTo(TaskjobsHistory::class, 'taskjob_id', 'id');
    }
    public function crew(): BelongsTo
    {
        return $this->belongsTo(Crew::class, 'user_id', 'crew_id');
    }
}
