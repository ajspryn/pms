<?php

namespace App\Models\Pms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskjobsFiles extends Model
{
    use HasFactory;

    protected $table = 'taskjobs_files';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'taskjob_id',
        'file',
    ];

    public static $validator = [
        'taskjob_id' => 'required|exists:taskjobs,uuid',
        'file' => 'required',
        
];

    public function taskjobs()
{
    return $this->belongsTo(Taskjobs::class,'taskjob_id', 'uuid');
}
}
