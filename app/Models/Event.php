<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    protected  $table = 'events';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'start_time', 'end_time', 'description', 'room_id'];
    
    use HasFactory;

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}    

