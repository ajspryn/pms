<?php

namespace App\Models\Pms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemplateApprovalUser extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'approval_template_user';
    public $timestamps = false;
    protected $fillable = [
        'kode_template',
        'posisi_approval',
        'nama_jabatan',
    ];

    public static $validator = [
        'kode_template' => 'required',
        'posisi_approval' => 'required',
        'nama_jabatan' => 'required',
        
    ];
    
    public function taskjobs(): BelongsTo
    {
        return $this->belongsTo(TemplateApproval::class, 'kode_template', 'kode_template');
    }
}
