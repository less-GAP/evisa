<?php

namespace Modules\Frontend\Actions;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use ProtoneMedia\Splade\Facades\Splade;

class PageAction
{
    public function about()
    {

        return view('Frontend::about', [

        ]);
    }

    public function contact()
    {

        return view('Frontend::contact', [

        ]);
    }


}
