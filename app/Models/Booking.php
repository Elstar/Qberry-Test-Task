<?php

namespace App\Models;

use App\Services\UniqueCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Eloquent
 * @mixin IdeHelperBooking
 */
class Booking extends Model
{
    use HasFactory;

    public const BOOKING_STATUS_RESERVED = 'reserved';
    public const BOOKING_STATUS_ACTIVE = 'active';
    public const BOOKING_STATUS_FINISHED = 'finished';

    protected $fillable = [
        'user_id',
        'location_id',
        'temperature',
        'booked_from',
        'booked_to',
        'price',
        'status',
        'volume'
    ];

    protected $casts = [
        'booked_from' => 'datetime:H:i d.m.Y',
        'booked_to' => 'datetime:H:i d.m.Y',
    ];

    public $attributes = [
        'volume' => 0,
        'price' => 0
    ];

    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class, 'booking_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function booted()
    {
        static::creating(function (Booking $booking) {
            $now = now();
            $booking->attributes['code'] = UniqueCode::getFreeCode();
            if ($booking->booked_from > $now) {
                $booking->status = self::BOOKING_STATUS_RESERVED;
            } elseif ($booking->booked_from < $now && $booking->booked_to > $now) {
                $booking->status = self::BOOKING_STATUS_ACTIVE;
            }
        });

        static::updated(function (Booking $booking) {
            if ($booking->wasChanged('status') && $booking->status == self::BOOKING_STATUS_FINISHED) {
                $booking->blocks()->each(function (Block $block) {
                    $block->update(['empty' => true, 'booking_id' => null]);
                });
                $booking->user->billing_sum += $booking->price;
            }
        });
    }
}
