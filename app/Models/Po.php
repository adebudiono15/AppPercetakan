<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Po extends Model
{
    use HasFactory;
    protected $table = 'po';

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function lines(){
        return $this->hasMany(PoLine::class,'po_id');
     }

     public function nama()
     {
         return $this->belongsTo(Logistik::class,'nama_id');
     }
 
}
