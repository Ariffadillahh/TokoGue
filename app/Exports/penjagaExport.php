<?php

namespace App\Exports;

use App\Models\penjagaperpus;
use Maatwebsite\Excel\Concerns\FromCollection;

class penjagaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return penjagaperpus::all();
    }
}
