<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $table    = 'table_hardwares';

    protected $fillable = [
        'GSM_NUMBER',
        'LABEL_HARDWARE',
        'CHAR_HARDWARE',
        'MAP_ADDRESS',
        'MAP_LATITUDE',
        'MAP_LONGITUDE'
    ];

    public function table_monitorings(){
        return $this->hasMany("App\Monitoring");
    }

    public function table_notifications(){
        return $this->hasMany("App\Notification");
    }

}
