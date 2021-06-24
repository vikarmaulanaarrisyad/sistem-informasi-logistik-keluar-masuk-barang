<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;

    protected $fillable = ['kodebarang','namabarang','stockbarang'];
    protected $table = "tb_barang";
    protected $primaryKey = 'idbarang';

}
