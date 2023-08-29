<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents(base_path() . '/data/countries.json'), true);
        $insertData =[];
        foreach ($data as $code=>$country){
            $insertData[] = [
                'name'=>$country['name']
                ,'code' =>$code
                ,'emoji'=>$country['emoji']
                ,'image'=>$country['image']
                ,'region'=>$country['region']
            ];
        }
        Country::upsert($insertData,['code']);
    }
}
