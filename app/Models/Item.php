<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    protected $fillable = [
        'name',
        'stock_sistem',
        'unit',
        'kategori',
        'lokasi',
    ];

    public function stockOpnames()
{
    return $this->hasMany(StockOpname::class);
}

}

