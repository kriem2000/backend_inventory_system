<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';

    protected $fillable = [
        'unit_name'
    ];

    public function building(){
        return $this->belongsTo(Building::class);
    }

    public function unitHead(){
        return $this->hasOne(User::class)->where('isHead', true);
    }

    public function inventory_destination(){
        return $this->hasOne(InventoryDestination::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
