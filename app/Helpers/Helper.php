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

function default_visa_customer_level_id()
{
    $userLevel = VisaCustomerLevel::where('is_default', 1)->where('status', 'active')->first();
    return $userLevel ? $userLevel->id : null;
}
function frontend_user(){
    return auth('frontend')->user();
}
