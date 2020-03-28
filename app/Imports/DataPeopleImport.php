<?php

namespace App\Imports;

use App\Models\DataPeople;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class DataPeopleImport implements ToCollection, WithChunkReading, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
 
    public function collection(Collection $rows)
    {
        /*
         Validator::make($rows->toArray(), [
             'fullname' => 'required',
         ])->validate();
        */

        foreach ($rows as $row) {

            if(!empty($row['phone']))
            {
                $phone = getPhoneNumber($row['phone']);
                if(!empty($phone))
                {
                    $check = DataPeople::where("phone", $phone)->first();
                    if(!$check)
                    {
                        $dt = new DataPeople;
                        $dt->fullname       = str_replace("-", "", $row['fullname']);
                        $dt->address        = $row['address'];
                        $dt->phone          = $phone;
                        $dt->email          = $row['email'];
                        $dt->dob            = !empty($row['dob']) ? $this->transformDate($row['dob']) : NULL;
                        $dt->gender         = intval($row['gender']);
                        $dt->id_no          = $row['id_no'];
                        $dt->province_id    = intval($row['province_id']);
                        $dt->district_id    = intval($row['district_id']);
                        $dt->ward_id        = intval($row['ward_id']);
                        $dt->street_id      = intval($row['street_id']);
                        $dt->save();
                    }
                }
            }
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    /**
     * Transform a date value into a Carbon object.
     *
     * @return \Carbon\Carbon|null
     */
    public function transformDate($value, $format = 'Y-m-d')
    {
        return date("Y-m-d", strtotime($value));
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
}
