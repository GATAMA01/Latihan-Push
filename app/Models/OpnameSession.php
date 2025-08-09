<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpnameSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'keterangan',
        'session_id', // Tambahkan kolom session_id
    ];

    /**
     * Relasi: satu sesi memiliki banyak stock opname.
     */
    public function stockOpnames()
    {
        return $this->hasMany(StockOpname::class, 'opname_session_id');
    }
}
