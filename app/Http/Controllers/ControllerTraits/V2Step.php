<?php

namespace App\Http\Controllers\ControllerTraits;

use Illuminate\Http\Request;
use App\Http\Requests;

trait V2Step
{
    public function v2step(Request $request)
    {
        $state = $request->get('state');
        $states = $this->states;
        $countries = $this->countries;
        asort($states, SORT_STRING);

        session(['us_state' => $state]);

        $state_name = $this->states[$state];
        $style = 'step';
        return view('main.2.step',compact('style','state_name','states','countries'));
    }
}