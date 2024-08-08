<?php

namespace App\Models;

use App\Models\CarStore;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function setNameAttributes($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value).'-'.mt_rand('00000', '99999');
    }

    public function car_stores(): HasMany {
        return $this->hasMany(CarStore::class);
    }
}