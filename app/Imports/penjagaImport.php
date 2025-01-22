<?php

namespace App\Imports;

use App\Models\penjagaperpus;
use Maatwebsite\Excel\Concerns\ToModel;

class penjagaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new penjagaperpus([
            'nama_penjaga' => $row[1],
            'no_hp' => $row[2],
        ]);
    }
}
