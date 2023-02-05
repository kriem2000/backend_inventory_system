<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    use HasFactory;

    protected $table = 'task_users';

    protected $fillable = [
        'user_id', 'inventory_destination_id', 'inventory_group_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
