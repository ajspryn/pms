<?php

namespace App\Models\inventory;

use App\Models\ship\ship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InventoryMainGroups extends Model
{
    use HasFactory;
    // public $timestamps = false;
    // protected $primaryKey = 'id'; 
    //   protected $table = 'inventory_main_groups';
      protected $guarded = [
        'id'
      ];
  
    //   public static $validator = [
    //       'code_main_group' => 'required|integer|between:0,9',
    //       'uuid' => 'required',
    //       'name' => 'required',
    //       'ship_id' => 'required|exists:ship,id',
    //   ];
  
      public function ship(): BelongsTo
      {
          return $this->belongsTo(Ship::class);
      }
  
      public function group(): HasMany
      {
          return $this->hasMany(InventoryGroups::class, 'uuid', 'main_group_id');
      }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
