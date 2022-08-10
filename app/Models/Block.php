<?php

namespace App\Models;

use Database\Factories\BlockFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperBlock
 */
class Block extends Model
{
    use HasFactory;
    protected $fillable = [
        'wh_id',
        'booking_id',
        'empty',
        'length',
        'width',
        'height',
        'price',
        'volume'
    ];

    protected $casts = [
        'empty' => 'bool'
    ];

    public $attributes = [
        'empty' => true,
        'length' => 2,
        'width' => 1,
        'height' => 1,
        'price' => 10,
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function wh(): BelongsTo
    {
        return $this->belongsTo(Wh::class, 'wh_id');
    }

    protected static function booted()
    {
        static::creating(function (Block $block) {
            $block->attributes['volume'] =
                $block->attributes['length'] * $block->attributes['width'] * $block->attributes['height'];
        });
    }

    protected static function newFactory(): BlockFactory
    {
        return BlockFactory::new();
    }
}
