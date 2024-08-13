<?php

// app/Models/Item.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'g51_items';
    protected $fillable = ['name'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'g51_event_item', 'item_id', 'event_id');
    }
}
