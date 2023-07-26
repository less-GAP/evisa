<?php


namespace Modules\Admin\Actions\Product;

use Illuminate\Http\Request;

class PostUploadImageAction
{
    public function handle(Request $request)
    {
        $data = $request->file('image');
        echo '<pre>';
        print_r($data);
        exit;
    }
}
