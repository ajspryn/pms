<?php

namespace App\Models\inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InventorySubGroups extends Model
{
    use HasFactory;

    protected $table = 'inventory_sub_groups';
    public $incrementing = false;
    protected $primaryKey = 'id'; 
    protected $fillable = [
      'group_id',
      'uuid',
      'code_sub_group',
      'name'
  ];

  public function group(): BelongsTo
  {
      return $this->belongsTo(InventoryGroups::class, 'group_id', 'uuid');
  }

  public function unit(): HasMany
  {
      return $this->hasMany(InventoryUnits::class, 'uuid', 'sub_group_id');
  }
}
