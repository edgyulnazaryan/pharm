<?php

namespace App\Imports;

use App\Models\Drug;
use Maatwebsite\Excel\Concerns\ToModel;

class DrugImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Drug(
            [
            'name' => $row[1],
            'state' => $row[2],
            'license' => $row[3],
            'date' => $row[4],
            'marker' => $row[5],
            'pharm_id' => $row[6],
            'producer_id' => $row[7],
            'material_id' => $row[8],
        ]);
    }
}
