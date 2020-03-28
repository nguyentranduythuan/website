<?php

namespace App\Exports;

use App\Models\DataPeople;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataPeopleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataPeople::all();
    }
}
