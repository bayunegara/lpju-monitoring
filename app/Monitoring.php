<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    protected $table    = 'table_monitorings';

    protected $fillable = [
        'ID_HARDWARE',
        'TANGGAL',
        'WAKTU',
        'TOTAL_DAYA',
    ];

    public function table_hardwares(){
        return $this->belongsTo("App\Hardware");
    }
}
