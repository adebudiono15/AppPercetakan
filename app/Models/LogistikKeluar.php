<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogistikKeluar extends Model
{
    use HasFactory;
    protected $table="logistik_keluar";
    protected $fillable=['kode', 'supplier_id','nama','tanggal'];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function nama()
    {
        return $this->belongsTo(Logistik::class,'nama_id');
    }
    
    public function lines(){
        return $this->hasMany(LogistikKeluarLine::class,'log_keluar_id');
     }
}
