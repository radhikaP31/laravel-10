<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'quantity',
        'price',
        'user_id',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
