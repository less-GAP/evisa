<?php

namespace Modules\Admin\Actions\File;

use App\Models\File;
use Illuminate\Http\Request;

class PostInfoAction
{
    public function handle(Request $request)
    {

        $file = File::find($request->input('id'));
        if ($file) {
            $file->fill($request->only([
                'alternative_text'
                , 'caption'
                , 'title'
                , 'description'
            ]))->save();
        }

        return [
            'result' => $file,
            'message' => 'Updated!'
        ];
    }
}
