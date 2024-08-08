<?php

namespace App\Models;

use App\Models\CarStore;
use App\Models\CarService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreService extends Model
{
    use HasFactory;

    protected $table = 'store_services';

    protected $fillable = [
        'car_service_id',
        'car_store_id',
    ];

    public function car_service(): BelongsTo {
        return $this->belongsTo(CarService::class, 'car_service_id');
    }

    public function car_store(): BelongsTo {
        return $this->belongsTo(CarStore::class, 'car_store_id');
    }
}