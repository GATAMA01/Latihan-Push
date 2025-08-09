<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ItemsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Item([
            'name'          => $row['name'],
            'unit'          => $row['unit'],
            'stock_sistem'  => $row['stock_sistem'],
            'kategori'      => $row['kategori'],
            'lokasi'        => $row['lokasi'],
            'supplier'      => $row['supplier'],
        ]);
    }
}
