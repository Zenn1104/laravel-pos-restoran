<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "table_transaction";
    protected $fillable = [
        'customer_id', 'items', 'description', 'price', 'done'
    ];

    protected function casts()
    {
        return  [
            'items' => 'array'
            ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'menu_id', 'id');
    }
}