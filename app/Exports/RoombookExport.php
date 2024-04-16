<?php

namespace App\Exports;

use App\Models\Roombook;
use Maatwebsite\Excel\Concerns\FromCollection;

class RoombookExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Roombook::all();
    }
}
