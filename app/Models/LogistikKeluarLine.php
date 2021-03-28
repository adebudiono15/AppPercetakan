<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogistikKeluarLine extends Model
{
    use HasFactory;
    protected $table = 'logistik_keluar_line';
    protected $guard = [];

    public function nama(){
        return $this->belongsTo(Logistik::class,'nama_id');
    }
}
