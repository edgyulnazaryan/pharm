<?php

namespace App\Imports;

use App\Models\Producer;
use Maatwebsite\Excel\Concerns\ToModel;

class ProducerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Producer(
        [
            'name' => $row[1],
        ]);
    }
}
