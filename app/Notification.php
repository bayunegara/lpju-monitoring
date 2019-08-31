<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table    = 'table_notifications';

    protected $fillable = [
        'ID_HARDWARE',
        'NOTIF',
        'STATUS',
    ];

    public function table_hardwares(){
        return $this->belongsTo("App\Hardware");
    }
}
