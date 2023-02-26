<?php

namespace App\Exports;

use App\Models\permohonan;
use Maatwebsite\Excel\Concerns\FromCollection;

class permohonanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return permohonan::all();
    }
}
