<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\StoreService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarService extends Model
{
    use HasFactory;

    protected $table = 'car_services';

    protected $fillable = [
        'name',
        'slug',
        'price',
        'about',
        'photo',
        'duration_in_hour',
    ];

    public function setNameAttributes($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value).'-'.mt_rand('00000', '99999');
    }

    public function booking_transactions(): HasMany {
        return $this->hasMany(BookingTransaction::class);
    }

    public function store_services(): HasMany {
        return $this->hasMany(StoreService::class);
    }
}