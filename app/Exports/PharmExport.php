<?php

namespace App\Exports;

use App\Models\Pharm;
use Maatwebsite\Excel\Concerns\FromCollection;

class PharmExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pharm::all();
    }
}
