<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keluar extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'tb_keluar';
    protected $primaryKey = 'idkeluar';
    protected $fillable = [
        'kodebarang',
        'qtykeluar',
        'tglkeluar'
    ];
}
