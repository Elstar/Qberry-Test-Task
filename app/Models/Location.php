<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

/**
 * @mixin Eloquent
 * @mixin IdeHelperLocation
 */
class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'time_zone'
    ];
}
