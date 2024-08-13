<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    protected  $table = 'g51_events';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'start_time', 'end_time', 'description', 'room_id','status' ];
    
    use HasFactory;

    public function room()
{
    return $this->belongsTo(Room::class, 'room_id', 'id')->withDefault();
}

    public function items()
    {
        return $this->belongsToMany(Item::class, 'g51_event_item', 'event_id', 'item_id');
    }

    public function tasks()
    {
        return $this->belongsToMany(Event::class, 'g51_event_task', 'event_id');
    }
    public function budget()
{
    return $this->belongsTo(Budget::class, 'budget_id');
}
}    

