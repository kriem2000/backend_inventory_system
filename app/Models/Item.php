<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id' ,'user_id', 'status_id', 'inventory_group_id', 'inventory_task_id',
        'item_name', 'quantity','item_note', 'item_owner'
    ];

    public function category(){
        return $this->belongsTo(ItemCategories::class, 'category_id');
    }

    public function item_status(){
        return $this->belongsTo(ItemStatus::class ,'status_id');
    }

    public function assigned_by(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function inventory_group(){
        return $this->belongsTo(InventoryGroup::class);
    }

    public function task(){
        return $this->belongsTo(InventoryTask::class, 'inventory_task_id');
    }
}
