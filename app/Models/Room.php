<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected  $table = 'g51_rooms';
    protected $fillable = ['name', 'description'];

}
