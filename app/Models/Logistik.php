<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistik extends Model
{
    use HasFactory;
    protected $table = 'logistik';
    protected $guard = ['id','kode','nama','stok','kategori','harga_beli','harga_jual'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
}
