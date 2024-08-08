<?php

namespace App\Models;

use App\Models\CarStore;
use App\Models\CarService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingTransaction extends Model
{
    use HasFactory;

    protected $table = 'booking_transactions';

    protected $fillable = [
        'name',
        'trx_id',
        'phone_number',
        'is_paid',
        'total_amount',
        'car_service_id',
        'car_store_id',
        'started_at',
        'time_at',
    ];

    public function car_service(): BelongsTo {
        return $this->belongsTo(CarService::class, 'car_service_id');
    }

    public function car_store(): BelongsTo {
        return $this->belongsTo(CarStore::class, 'car_store_id');
    }
}