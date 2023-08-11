<?php

namespace Modules\Frontend\Actions;


use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use ProtoneMedia\Splade\Facades\Splade;

class ProductAction
{
    public function handle()
    {
        $products = [];
        return view('Frontend::profile.product', [
            'products' => $products,
        ]);
    }

}
