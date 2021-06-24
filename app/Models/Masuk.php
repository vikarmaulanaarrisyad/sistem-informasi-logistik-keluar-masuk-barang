<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masuk extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['kodebarang','tglmasuk','qtymasuk'];
    protected $table = 'tb_masuk';
    protected $primaryKey = 'idmasuk';
}
