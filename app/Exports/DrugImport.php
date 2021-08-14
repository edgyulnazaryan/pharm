<?php

namespace App\Exports;

use App\Models\Drug;
use Maatwebsite\Excel\Concerns\FromCollection;

class DrugImport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Drug::all();
    }
}
