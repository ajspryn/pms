<?php

namespace App\Models\Pms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalTaskjobs extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'approval_taskjobs';
    protected $fillable = [
        'id',
        'taskjob_id',
        'status_approval',
        'orang_ke',
        'alasan',
        'tgl_approval',
        'id_user_approval',
    ];

    public static $validator = [
        'taskjob_id' => 'required|max:15',
        'status_approval' => 'required',
        'orang_ke' => 'required',
        'id_user_approval' => 'required',
];
}
