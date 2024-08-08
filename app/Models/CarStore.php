<?php

namespace App\Models;

use App\Models\City;
use App\Models\StorePhoto;
use Illuminate\Support\Str;
use App\Models\StoreService;
use App\Models\BookingTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarStore extends Model
{
    use HasFactory;

    protected $table = 'car_stores';

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'is_open',
        'is_full',
        'address',
        'phone_number',
        'cs_name',
        'city_id',
    ];

    public function setNameAttributes($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value).'-'.mt_rand('00000', '99999');
    }

    public function booking_transactions(): HasMany {
        return $this->hasMany(BookingTransaction::class);
    }

    public function city(): BelongsTo {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function store_photos(): HasMany {
        return $this->hasMany(StorePhoto::class);
    }

    public function store_services(): HasMany {
        return $this->hasMany(StoreService::class);
    }
}