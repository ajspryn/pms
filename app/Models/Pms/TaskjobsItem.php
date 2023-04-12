<?php

namespace App\Models\Pms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskjobsItem extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'taskjob_items';
    protected $fillable = [
        'taskjob_id',
        'inv_stock_id',
        'qty',
    ];

    public static $validator = [
        'taskjob_id' => 'required',
        'inv_stock_id' => 'required',
        'qty' => 'required',
    ];

    public function taskjobs(): BelongsTo
    {
        return $this->belongsTo(Taskjobs::class, 'taskjob_id', 'id');
    }
    public function stock(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'inv_stock_id', 'uuid');
    }
}
