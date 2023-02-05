<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use InventoryDestinations;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use  HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'unit_id',
        'phone_number',
        'nickname',
        'isHead',
        'isActive',
        'inventory_group_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function destination_creator($destination){
        return $this->id == $destination->created_by_id;
    }

    public function isUnitHead($destination){
        return $this->unti_id == $destination->unit_id;
    }

    public function destinations(){
        return $this->belongsToMany(InventoryDestination::class, 'task_users', 'user_id');
    }

    public function isCreator($task){
        return $this->id == $task->created_by_id;
    }

    public function isHead($user){
        return $user->isHead;
    }

    public function isActive(User $user){
        return $user->isActive;
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function inventory_group(){
        return $this->belongsTo(InventoryGroup::class, 'inventory_group_id');
    }

    public function unitHead(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function destination(){
        return $this->hasMany(InventoryDestinations::class);
    }

    public function destination_approval(){
        return $this->hasOne(InventoryDestination::class);
    }
}
