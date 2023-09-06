<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MasterData;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::truncate();
        \App\Models\User::factory()->create([
            'full_name' => 'Admin',
            'username' => 'admin',
            'role' => 'admin',
            'email' => 'admin@test.com',
            'email_verified_at' => Carbon::now(),
            'password' => \Hash::make('123456'),
        ]);
        \App\Models\User::factory()->count(20)->create();
        $this->call([
            CountrySeeder::class
        ]);
        MasterData::create([
            'data_key' => 'visa-processing-time',
            'data' => json_decode('[{"working_hours":56,"label":"Standard processing (5-7 working days)","value":"1","fee_per_applicant":10,"status":"active"},{"status":"active","label":"2 Working Days (Mon-Fri)","value":"2","working_hours":16,"fee_per_applicant":20},{"label":"1 Working Day (Mon-Fri)","value":"3","working_hours":8,"fee_per_applicant":30,"status":"active"},{"label":"Same day (4-8 working hours)","value":"4","working_hours":6,"fee_per_applicant":150,"status":"active"},{"label":"Super Urgent (2.5 working hours)","value":"5","working_hours":5,"fee_per_applicant":200,"status":"active"}]', true),
        ]);
        MasterData::create([
            'data_key' => 'type-of-visa',
            'data' => json_decode('[{"label":"E-Visa (1 Month Multiple Entry)","value":"1","fee_per_applicant":5,"status":"active"},{"label":"E-Visa (1 Month Multiple Entry)","value":"2","fee_per_applicant":10,"status":"active"},{"label":"E-Visa (3 Months Single Entry)","value":"3","fee_per_applicant":15,"status":"active"},{"label":"E-Visa (3 Months Multiple Entry)","value":"4","fee_per_applicant":20,"status":"active"}]', true),
        ]);
    }
}
