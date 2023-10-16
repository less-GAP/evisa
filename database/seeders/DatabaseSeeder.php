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
            'data' => json_decode('[{"status":"active","label":"Express 1: 1 hr","value":"1","working_hours":1,"fee_per_applicant":20,"price_2":300,"price_1":250,"price_3":250,"price_4":300,"contact_admin":true},{"label":"Express 2: 2 hrs","status":"active","value":"2","working_hours":2,"cut_off":["09:30","15:30"],"price_1":150,"price_2":180,"price_3":150,"price_4":180},{"label":"Express 3: 4 hrs","value":"3","working_hours":4,"fee_per_applicant":30,"status":"active","price_1":120,"price_2":150,"price_4":150,"cut_off":["08:00","14:00"],"price_3":120},{"label":"Expedite 1: 1 day","value":"4","working_hours":8,"fee_per_applicant":150,"status":"active","price_1":95,"price_3":95,"price_4":130,"cut_off":["10:00"],"price_2":130},{"label":"Expedite 2: 2 days","value":"5","working_hours":16,"fee_per_applicant":200,"status":"active","price_4":120,"price_3":75,"price_2":120,"price_1":75,"cut_off":["15:00"]},{"value":"6","label":"Expedite 3: 3 days","status":"active","working_hours":24,"cut_off":["14:30"],"price_1":60,"price_2":95,"price_3":60,"price_4":95},{"working_hours":56,"label":"Standard processing (5-7 working days)","value":"7","fee_per_applicant":10,"status":"active","price_1":50,"price_2":85,"price_3":50,"price_4":85,"cut_off":["09:30","08:00","14:00","14:30","15:00"]}]', true),
        ]);
        MasterData::create([
            'data_key' => 'type-of-visa',
            'data' => json_decode('[{"label":"E-Visa (1 Month Multiple Entry)","value":"1","fee_per_applicant":5,"status":"active"},{"label":"E-Visa (1 Month Multiple Entry)","value":"2","fee_per_applicant":10,"status":"active"},{"label":"E-Visa (3 Months Single Entry)","value":"3","fee_per_applicant":15,"status":"active"},{"label":"E-Visa (3 Months Multiple Entry)","value":"4","fee_per_applicant":20,"status":"active"}]', true),
        ]);
        MasterData::create([
            'data_key' => 'main-menu',
            'data' => json_decode('[{"children":[],"label":"Home","url":"/"},{"children":[],"label":"Check Status","url":"/check-status"},{"children":[{"children":[],"label":"Vietnam E-visa","url":"/vietnam-e-visa"},{"label":"Visa on arrival","url":"/vietnam-visa-on-arrival"},{"label":"Emergency visa","url":"/vietnam-emergency-visa"}],"label":"How to apply","url":"/post/how-to-get-a-visa-to-vietnam"},{"children":[],"label":"News","url":"/news"},{"children":[{"label":"Vietnam e-visa fees","url":"/vietnam-e-visa-fees"},{"label":"Visa on arrival fees","url":"/vietnam-visa-cost"}],"label":"Visa fees","url":null},{"children":[],"label":"FAQs","url":"/faqs"},{"children":[],"label":"Apply online","url":"/apply"},{"children":[],"label":"Vietnam Visa Requirements","url":"/post/vietnam-visa-requirements"},{"children":[],"label":"How to get a Vietnam visa","url":"/post/how-to-get-a-visa-to-vietnam"},{"children":[],"label":"Vietnam visa exemption","url":"/post/vietnam-visa-exemption-all-you-need-to-know-2023"},{"children":[],"label":"Emergency visa","url":"/vietnam-emergency-visa"},{"children":[],"label":"Business visa","url":"/post/vietnam-business-visa"},{"children":[],"label":"Photo requirements","url":"/post/vietnam-visa-photo-guidelines"},{"children":[],"label":"Visa types","url":"/post/6-major-types-of-vietnam-visa"},{"children":[],"url":"/contact-us","label":"Contact us"},{"children":[],"label":"All guides (46)","url":"all-guides"}]', true),
        ]);
        MasterData::create([
            'data_key' => 'footer-menu',
            'data' => json_decode('[{"children":[],"label":"Home","url":"/"},{"children":[],"label":"Apply online","url":"/apply"},{"children":[],"label":"Visa fees","url":null},{"children":[],"label":"How to apply","url":"/post/how-to-get-a-visa-to-vietnam"},{"children":[],"label":"FAQs","url":"/faqs"},{"children":[],"label":"News","url":"/news"},{"children":[],"label":"Vietnam Visa Requirements","url":"/post/vietnam-visa-requirements"},{"children":[],"label":"How to get a Vietnam visa","url":"/post/how-to-get-a-visa-to-vietnam"},{"children":[],"label":"Vietnam visa exemption","url":"/post/vietnam-visa-exemption-all-you-need-to-know-2023"},{"children":[],"label":"Emergency visa","url":"/vietnam-emergency-visa"},{"children":[],"label":"Business visa","url":"/post/vietnam-business-visa"},{"children":[],"label":"Photo requirements","url":"/post/vietnam-visa-photo-guidelines"},{"children":[],"label":"Visa types","url":"/post/6-major-types-of-vietnam-visa"},{"children":[],"url":"/contact-us","label":"Contact us"},{"children":[],"label":"All guides","url":"/faqs"}]', true),
        ]);

        \App\Models\VisaCustomerLevel::factory()->create();

    }
}
