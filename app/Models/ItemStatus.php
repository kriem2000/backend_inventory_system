<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStatus extends Model
{
    use HasFactory;

    protected $table = "item_status";

    protected $fillable = [
        'status_name' , 'status_desc'
    ];

    public function item(){
        return $this->hasMany(Item::class);
    } 
}
