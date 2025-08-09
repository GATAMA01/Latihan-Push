<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stock_fisik',
        'stock_sistem',
        'selisih',
        'unit',
        'kategori',
        'lokasi',
        'keterangan',
        'user_id',
        'opname_session_id',
    ];

    /**
     * Relasi: stock opname dimiliki oleh user (petugas).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: stock opname termasuk dalam satu sesi opname.
     */
    public function opnameSession()
    {
        return $this->belongsTo(OpnameSession::class, 'opname_session_id');
    }
}
