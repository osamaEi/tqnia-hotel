<?php

namespace App\Models;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomType extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function rooms() {

        return $this->hasMany(Room::class);
    }
}
