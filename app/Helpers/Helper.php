<?php

use App\Models\MasterData;

function master_data($listKey)
{
    $masterData = MasterData::find($listKey);
    if ($masterData) {
        return collect($masterData->data);
    }
    return collect([]);
}
