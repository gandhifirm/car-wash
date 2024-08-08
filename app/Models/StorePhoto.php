<?php

namespace App\Models;

use App\Models\CarStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StorePhoto extends Model
{
    use HasFactory;

    protected $table = 'store_photos';

    protected $fillable = [
        'photo',
        'car_store_id',
    ];

    public function car_store(): BelongsTo {
        return $this->belongsTo(CarStore::class, 'car_store_id');
    }
}