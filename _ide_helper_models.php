<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Block
 *
 * @property int $id
 * @property int $wh_id
 * @property int|null $booking_id
 * @property bool $empty
 * @property float $length
 * @property float $width
 * @property float $height
 * @property float $volume
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Booking|null $booking
 * @property-read \App\Models\Wh $wh
 * @method static \Database\Factories\BlockFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Block newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Block newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Block query()
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereBookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereEmpty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereWhId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereWidth($value)
 */
	class IdeHelperBlock {}
}

namespace App\Models{
/**
 * App\Models\Booking
 *
 * @mixin Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $location_id
 * @property int $temperature
 * @property string $code
 * @property \Illuminate\Support\Carbon $booked_from
 * @property \Illuminate\Support\Carbon $booked_to
 * @property float $volume
 * @property string $status
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Block[] $blocks
 * @property-read int|null $blocks_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereBookedFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereBookedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereVolume($value)
 */
	class IdeHelperBooking {}
}

namespace App\Models{
/**
 * App\Models\Location
 *
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property string $time_zone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereTimeZone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUpdatedAt($value)
 */
	class IdeHelperLocation {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $billing_sum
 * @property string|null $api_token
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBillingSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * App\Models\Wh
 *
 * @mixin Eloquent
 * @property int $id
 * @property int $location_id
 * @property int $temperature
 * @property int $max_blocks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Block[] $blocks
 * @property-read int|null $blocks_count
 * @method static \Database\Factories\WhFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Wh newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wh newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wh query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wh whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wh whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wh whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wh whereMaxBlocks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wh whereTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wh whereUpdatedAt($value)
 */
	class IdeHelperWh {}
}

