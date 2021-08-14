<?php

namespace App\Imports;

use App\Models\Pharm;
use Maatwebsite\Excel\Concerns\ToModel;

class PharmImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pharm([
            'name' => $row[1],
            'city' => $row[2],
            'address' => $row[3],
            'phone' => $row[4],
            'start_work_time' => $row[5],
            'finish_work_time' => $row[6],
        ]);
    }
}
