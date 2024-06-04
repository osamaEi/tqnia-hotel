<?php

namespace App\Models;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;


    protected $fillable = [
        'room_name',
        'room_type_id',
        'image', 
        'description',
        'room_number',
        'status', 
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }


}
