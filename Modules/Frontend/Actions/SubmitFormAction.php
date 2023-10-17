<?php

namespace Modules\Frontend\Actions;


use App\Models\Contact;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class SubmitFormAction
{
    public function handle(Request $request)
    {
        Contact::create([
            'title' => $request->input('full_name'),
            'email' => $request->input('email'),
            'content' => $request->input('mesage')
        ]);
        Toast::message('Send message successfully!')
            ->success()
            ->centerTop();
        return redirect()->back();
    }
}
