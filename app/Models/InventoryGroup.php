<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name', 'group_desc', 'isActive'
    ];

    protected $table = 'inventory_group';

    public function user(){
        return $this->hasMany(User::class);
    }

    public function destination(){
        return $this->hasMany(InventoryDestination::class);
    }
}
