<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PerKapitaExpenditures;

class PerKapitaExpendituresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PerKapitaExpenditures::truncate();

        $csvData = fopen(base_path('database/csv/PerKapitaExpenditures.csv'), 'r');

        if($csvData !==false){
            while(($data = fgetcsv($csvData)) !==false){
                $rowData = [
                    'CodeProvince' => $data[0],
                    'ProvinceName' => $data[1],
                    'TotalExpenditurePerKapita' => $data[2],
                    'Unit' => $data[3],
                    'Year' => $data[4],
                ];
                PerKapitaExpenditures::create($rowData);
            }
            fclose($csvData);
        }
    }
}
