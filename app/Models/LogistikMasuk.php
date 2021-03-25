<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogistikMasuk extends Model
{
    use HasFactory;
    protected $table="logistik_masuk";
    protected $fillable=['kode', 'supplier_id','nama','tanggal'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
    public function nama()
    {
        return $this->belongsTo(Logistik::class,'nama_id');
    }
    
    public function lines(){
        return $this->hasMany(LogistikMasukLine::class,'log_masuk_id');
     }
}
