<?php

namespace App\Models;

use Database\Factories\WhFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Eloquent
 * @mixin IdeHelperWh
 */
class Wh extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'temperature',
        'max_blocks'
    ];

    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class, 'wh_id');
    }

    protected static function newFactory(): WhFactory
    {
        return WhFactory::new();
    }
}
