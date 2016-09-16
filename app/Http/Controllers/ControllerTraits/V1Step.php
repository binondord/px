<?php

namespace App\Http\Controllers\ControllerTraits;

use Illuminate\Http\Request;
use App\Http\Requests;

trait V1Step
{
    public function v1step1(Request $request)
    {
        $state = $request->get('state');
        $states = $this->states;
        $countries = $this->countries;
        asort($states, SORT_STRING);

        session(['us_state' => $state]);


        $state_name = $this->states[$state];
        $style = 'step';
        return view('main.1.step',compact('style','state_name','states','countries'));
    }

    public function v1step2(Request $request)
    {
        $state = session('us_state');
        $states = $this->states;
        $countries = $this->countries;
        asort($states, SORT_STRING);

        $state_name = $this->states[$state];
        $style = 'step';
        return view('main.1.step_b',compact('style','state_name','states','countries'));
    }

    public function v1step3(Request $request)
    {
        $state = session('us_state');
        $states = $this->states;
        $countries = $this->countries;
        asort($states, SORT_STRING);

        $state_name = $this->states[$state];
        $style = 'step';
        return view('main.1.step_c',compact('style','state_name','states','countries'));
    }

    public function v1step4(Request $request)
    {
        $state = session('us_state');
        $states = $this->states;
        $countries = $this->countries;
        asort($states, SORT_STRING);

        $state_name = $this->states[$state];
        $style = 'step';
        return view('main.1.step_d',compact('style','state_name','states','countries'));
    }
}