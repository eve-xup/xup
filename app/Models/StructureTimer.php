<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class StructureTimer extends Model
{

    protected $casts = [
        'timer' => 'datetime',
    ];

    protected $fillable = [
        'system_id',    //Solar System ID
        'type_id',      //Structure Type ID,
        'name',         // Structure Name',
        'timer_type',   //Armour / Hull,
        'timer'         //Datetime it comes out
    ];



    public function getLocalTime($timezone = 'Europe/Lisbon'){
        return Carbon::now()->shiftTimezone($timezone)->diffForHumans(
            Carbon::parse($this->timer)->shiftTimezone($timezone)
        );
    }

}
