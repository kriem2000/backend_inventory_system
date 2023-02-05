<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategories extends Model
{
    use HasFactory;

    protected $table = "item_categories";

    protected $fillable = [
        'category_name',
        'category_desc'
    ];

    public function item(){
        return $this->hasMany(InventoryTask::class);
    }
}
