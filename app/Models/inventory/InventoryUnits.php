<?php

namespace App\Models\inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InventoryUnits extends Model
{
    protected $table = 'inventory_units';
      public $incrementing = false;
  protected $primaryKey = 'id'; 
    protected $fillable = [
        'sub_group_id',
        'code_units',
        // 'd_cu',
        'uuid',
        'name',
        'item_code',
        'list_no',
        'drawing_no',
        'vendor',
        'type',
        'serial',
        'interval',
        'start_job',
        'end_job',
        'issue_by',
        'certificate_no',
        'specification_detail',
        'maintenance_detail',
        'number_approval',
        'date_approval',
        'pnd_place',
        'pnd_date',
        'validity',
        'maker',
        'image',
    ];

    public static $validator = [
        'sub_group_id' => 'required',
        'code_units' => 'required|regex:/\d\d\d$\b/',
        'name' => 'required',
        'uuid' => 'required',
        'item_code' => 'required',
        // 'd_cu' => 'nullable',
        'list_no' => 'nullable',
        'drawing_no' => 'nullable',
        'vendor' => 'nullable',
        'type' => 'nullable',
        'serial' => 'nullable',
        'issue_by' => 'nullable',
        'certificate_no' => 'nullable',
        'specification_detail' => 'nullable',
        'maintenance_detail' => 'nullable',
        'number_approval' => 'nullable',
        'date_approval' => 'nullable',
        'pnd_place' => 'nullable',
        'pnd_date' => 'nullable',
        'validity' => 'nullable',
        'maker' => 'nullable',
        'image' => 'nullable',
];

    public function sub_group(): BelongsTo
    {
        return $this->belongsTo(InventorySubGroups::class, 'sub_group_id', 'uuid');
    }

    public function component()
    {
        return $this->hasMany(InventoryComponents::class, 'uuid', 'unit_id');
    }
}
