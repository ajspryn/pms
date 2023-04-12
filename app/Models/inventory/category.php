<?php

namespace App\Models\inventory;

use App\Models\Pms\TaskjobsItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'id',
        'ship_id',
        'uuid',
        'code_category',
        'name_category',
        'stock',
        'used_stock',
        'minqty',
    ];
    public function taskjobs_items()
    {
        return $this->hasMany(TaskjobsItem::class,'uuid','inv_stock_id');
    }
}
