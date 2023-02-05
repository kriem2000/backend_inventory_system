<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryDestination extends Model
{
    use HasFactory;

    protected $table = "inventory_destinations";

    protected $fillable = [
        'destination_status_id',
        'unit_id',
        'building_id',
        'created_by_id',
        'inventory_group_id',
        'approved_by_id',
        'approved'
    ];

    public function isFinished(){
        return $this->destination_status_id == 1;
    }

    public function isApproved(){
        return $this->approved;
    }

    public function destination_status(){
        return $this->belongsTo(TaskStatus::class, 'destination_status_id');
    }

    public function destination_users(){
        return $this->belongsToMany(TaskUser::class);
    }

    public function assigned_users(){
        return $this->belongsToMany(User::class, 'task_users', 'inventory_destination_id');
    }

    public function created_by(){
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function building(){
        return $this->belongsTo(Building::class);
    }

    public function items(){
        return $this->hasManyThrough(Item::class, InventoryTask::class);
    }

    public function inventory_group(){
        return $this->belongsTo(InventoryGroup::class);
    }

    public function tasks(){
        return $this->hasMany(InventoryTask::class);
    }

    public function approvedBy(){
        return $this->belongsTo(User::class, 'approved_by_id');
    }


}
