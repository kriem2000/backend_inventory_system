<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryTask extends Model
{
    use HasFactory;

    protected $table = "inventory_tasks";

    protected $fillable = [
        'task_status_id',
        'unit_id',
        'created_by_id',
        'inventory_destination_id',
        'sub_unit_name',
        'sub_unit_desc',
        'inventory_group_id',
    ];

    public function destination(){
        return $this->belongsTo(InventoryDestination::class, 'inventory_destination_id');
    }

    public function task_status(){
        return $this->belongsTo(TaskStatus::class);
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function created_by(){
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function inventory_group(){
        return $this->belongsTo(InventoryGroup::class);
    }

    public function isFinished(){
        return $this->task_status_id == 1;
    }
}
