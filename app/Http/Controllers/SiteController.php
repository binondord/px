<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

class SiteController extends MainController
{
    public function serve()
    {
        $allowed_pages = [
            'public',
            'search',
            'Jobs',
            'signup.step1',
            'contact',
            'terms',
            'privacy',
            'step',
            'checkout'
        ];

        $sharedData = $this->sharedData;
        $segments = $sharedData['segments'];

        @reset($segments);
        foreach($segments as $segment)
        {
            if(in_array($segment, $allowed_pages))
            {
                $page = $segment;
            }else{
                $page = 'public';
            }
        }
        if(!isset($page))
        {
            $page = current($segments);
        }
        $blade = in_array($page, $allowed_pages) ? $page : 'public';

        $v = $this->view($blade);

        $response = app(Response::class, [$v]);
        $cookie = null;
        if(!is_null($cookie)){
            $response->withCookie($cookie);
        }
        return $response;
    }

    public function checkout()
    {

    }
}
