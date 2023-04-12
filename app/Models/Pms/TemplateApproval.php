<?php

namespace App\Models\Pms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TemplateApproval extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'approval_template';
    public $timestamps = false;
    protected $fillable = [
        'uuid',
        'kode_template',
        'nama_template',
    ];

    public function taskjobs(): HasMany
    {
        return $this->hasMany(TaskJobs::class, 'kode_template', 'approval_id');
    }
    
    public function templateuser(): HasMany
    {
        return $this->hasMany(TemplateApprovalUser::class, 'kode_template', 'kode_template');
    }
}
