<?php

namespace App\Models\inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionInDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'transaction_in_detail';
    protected $fillable = [
        'no_order',
        'stock_id',
        'qty',
        'harga'
    ];

    public static $validator = [
        'no_order' => 'required',
        'stock_id' => 'required',
        'qty' => 'required',
];

public function transaction_in()
{
    return $this->belongsTo(TransactionIn::class,'no_order','no_order');   
}

public function stock()
{
    return $this->belongsTo(Category::class,'stock_id', 'uuid');   
}
}
