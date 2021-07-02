<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoLine extends Model
{
    use HasFactory;
    protected $table = 'po_line';
    protected $guard = [];

    public function nama(){
        return $this->belongsTo(Barang::class,'nama_id');
    }
}
