<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $full_name
 * @property string $contacts
 * @property string $brand
 * @property string $model
 * @property integer $year
 * @property string $engine_type
 * @property string $engine_capacity
 * @property string $transmission
 * @property string $drive
 * @property string $horse_power
 * @property string $car_body
 * @property string $wheel
 * @property string $quality
 * @method static create(array $validated)
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'contacts',
        'brand',
        'model',
        'year',
        'engine_type',
        'engine_capacity',
        'transmission',
        'drive',
        'horse_power',
        'car_body',
        'wheel',
        'quality',
    ];
}
