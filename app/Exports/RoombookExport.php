<?php
namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;

class RoombookExport implements FromCollection
{
    public function collection()
    {
        return Booking::all(); 
    }
}
