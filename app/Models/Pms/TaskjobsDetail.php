<?php

namespace App\Models\Pms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskjobsDetail extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $table = 'taskjobs_detail';
    protected $fillable = [
        'taskjob_id',
        'uraian_kerja',
        'gambar_bukti_kerja',
        'id_user',
    ];

    public static $validator = [
        'taskjob_id' => 'required',
        'uraian_kerja' => 'required',
        'gambar_bukti_kerja' => 'nullable',
        'id_user' => 'required',
        
    ];

    public function taskjobs_detail() : BelongsTo
    {
        return $this->belongsTo(Taskjobs::class,'taskjob_id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(Crew::class, 'id_user', 'crew_id');
    }
}
