<?php

namespace App\Imports;

use App\Models\pasien;
use Maatwebsite\Excel\Concerns\ToModel;

class pasienImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new pasien([
            //
            'nama' => $row[0],
            'alamat' => $row[1],
        ]);
    }


}
