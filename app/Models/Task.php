<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected  $table = 'g51_tasks';
    protected $fillable = ['name']; // Allow mass assignment for the 'name' attribute

    // Disable timestamps if your table does not have 'created_at' and 'updated_at' columns
    public $timestamps = false;

    public function events()
    {
        return $this->belongsToMany(Event::class, 'g51_event_task', 'event_id');
    }
}
