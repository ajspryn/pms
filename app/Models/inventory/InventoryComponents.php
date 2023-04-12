<?php

namespace App\Models\inventory;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
Use App\Models\inventory\InventoryUnits;

class InventoryComponents extends Model
{
    protected $table = 'inventory_components';
    public $incrementing = false;
    protected $primaryKey = 'id'; 
    protected $fillable = [
      'unit_id',
      'code_component',
      // 'd_cc',
      'uuid',
      'name',
      'item_code',
      'list_no',
      'drawing_no',
      'vendor',
      'type',
      'serial',
      'issue_by',
      'interval',
      'start_job',
        'end_job',
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


  public function unit(): BelongsTo
  {
      return $this->belongsTo(InventoryUnits::class, 'unit_id', 'uuid');
  }

  public function part(): HasMany
  {
      return $this->hasMany(InventoryParts::class, 'uuid', 'component_id');
  }
}
