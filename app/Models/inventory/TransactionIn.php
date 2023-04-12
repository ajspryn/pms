<?php

namespace App\Models\inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransactionIn extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';
    protected $table = 'transaction_in';
    protected $fillable = [
        'order_id',
        'no_order',
        'transaction_date',
        'transaction_code',
        'ship_id',
        'created_by',
        'note',
        'detail',
        'status'
    ];


public function ship(): BelongsTo
{
    return $this->belongsTo(Ship::class,'ship_id');
}

public function transaction_in_detail(): HasMany
{
     return $this->hasMany(TransactionInDetail::class,'no_order','no_order');   
}
}
