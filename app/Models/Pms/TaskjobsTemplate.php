<?php

namespace App\Models\Pms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskjobsTemplate extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'approval_template';
    protected $fillable = [
        'uuid',
        'kode_template',
        'posisi_approval',
        'id_jabatan',
        'nama_template',
    ];

    public static $validator = [
        'uuid' => 'required',
        'kode_template' => 'required',
        'posisi_approval' => 'required',
        'id_jabatan' => 'required',
        'nama_template' => 'required',
    ];
}
