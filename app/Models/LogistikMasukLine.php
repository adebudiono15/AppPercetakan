<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogistikMasukLine extends Model
{
    use HasFactory;
    protected $table = 'logistik_masuk_line';
    protected $guard = [];

    public function nama(){
        return $this->belongsTo(Logistik::class,'nama_id');
    }
}
