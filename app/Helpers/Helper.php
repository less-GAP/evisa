<?php

use App\Models\VisaCustomerLevel;
use App\Models\MasterData;

function master_data($listKey)
{
    $masterData = MasterData::find($listKey);
    if ($masterData) {
        return collect($masterData->data);
    }
    return collect([]);
}

function frontend_processing_time()
{
    $user = auth('frontend')->user();
    if ($user && $user->level) {
        $userLevel = $user->level;
    } else {
        $userLevel = VisaCustomerLevel::where('is_default', 1)->where('status', 'active')->first();
    }
    return collect($userLevel->price_config);
}

function current_level_id()
{
    $user = auth('frontend')->user();
    if ($user && $user->level) {
        return $user->level->id;
    }
    $userLevel = VisaCustomerLevel::where('is_default', 1)->where('status', 'active')->first();
    return $userLevel->id;
}

function default_visa_customer_level_id()
{
    $userLevel = VisaCustomerLevel::where('is_default', 1)->where('status', 'active')->first();
    return $userLevel ? $userLevel->id : null;
}

function frontend_user()
{
    return auth('frontend')->user();
}

global $countryList;
function countryName($code)
{
    global $countryList;
    if (!$countryList) {
        $countryList = \App\Models\Country::pluck('name', 'code');
    }
    return $countryList[$code] ?? $code;
}

global $typeVisas;
function typeOfVisaName($value)
{
    global $typeVisas;
    if (!$typeVisas) {
        $masterData = MasterData::find('type-of-visa');
        $typeVisas = collect($masterData->data)->pluck('label', 'value');
    }
    return $typeVisas[$value] ?? $value;
}
global $processingTypes;
function processingTypeName($value)
{
    global $processingTypes;
    if (!$processingTypes) {
        $masterData = MasterData::find('visa-processing-time');
        $processingTypes = collect($masterData->data)->pluck('label', 'value');
    }
    return $processingTypes[$value] ?? $value;
}
