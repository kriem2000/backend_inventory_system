<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use InventoryDestinations;

class Building extends Model
{
    use HasFactory;

    protected $table = "buildings";

    protected $fillable = [
        'building_name',
        'building_desc'
    ];

    public function units(){
        return $this->hasMany(Unit::class);
    }
    
    public function inventory_destinations(){
        return $this->hasMany(InventoryDestinations::class);
    }
}
