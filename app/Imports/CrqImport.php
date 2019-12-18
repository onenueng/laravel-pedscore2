<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Crq;  //use class model ของ crq 
// use Illuminate\Support\Facades\Validator;


class CrqImport implements ToCollection, WithHeadingRow
{
    use Importable;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // validator::make($collection->toArray(),[
        //     '*.sap_id'=> 'required'
        // ]->validate();

        foreach($collection as $row)//วน loop เพื่อ create ขัอมูล
        {
            Crq::create([
            'sap_id'=> $row['sap_id'],
            'full_name' => $row['full_name'],
            'subject'=> $row['subject'],
            'academic_year'=> $row['academic_year'],
            'class' => $row['class'],
            'no1' => $row ['no1'],
            'no2' => $row ['no2'],
            'no3' => $row ['no3'],
            'no4' => $row ['no4'],
            'no5' => $row ['no5'],
            'no6' => $row ['no6'],
            'no7' => $row ['no7'],
            'no8' => $row ['no8'],
            'no9' => $row ['no9'],
            'no10' => $row ['no10'],
            'no11' => $row ['no11'],
            'no12' => $row ['no12'],
            'no13' => $row ['no13'],
            'no14' => $row ['no14'],
            'no15' => $row ['no15'],
            'total' => $row['total'],
            'percent' => $row['percent']
            ]);
        }
    }

    public function headingRow(): int
    {
        return 1;
    }


}
