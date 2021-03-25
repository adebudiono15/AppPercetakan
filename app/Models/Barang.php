<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = ['id','kode','nama','stok','kategori','harga_beli','harga_jual'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
}
