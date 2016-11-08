<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

class SiteController extends MainController
{
    private $states = [
        'HI'=>'Hawaii',
        'AK'=>'Alaska',
        'FL'=>'Florida',
        'SC'=>'South Carolina',
        'GA'=>'Georgia',
        'AL'=>'Alabama',
        'NC'=>'North Carolina',
        'TN'=>'Tennessee',
        'RI'=>'Rhode Island',
        'CT'=>'Connecticut',
        'MA'=>'Massachusetts',
        'ME'=>'Maine',
        'NH'=>'New Hampshire',
        'VT'=>'Vermont',
        'NY'=>'New York',
        'NJ'=>'New Jersey',
        'PA'=>'Pennsylvania',
        'DE'=>'Delaware',
        'MD'=>'Maryland',
        'WV'=>'West Virginia',
        'KY'=>'Kentucky',
        'OH'=>'Ohio',
        'MI'=>'Michigan',
        'WY'=>'Wyoming',
        'MT'=>'Montana',
        'ID'=>'Idaho',
        'WA'=>'Washington',
        'TX'=>'Texas',
        'CA'=>'California',
        'AZ'=>'Arizona',
        'NV'=>'Nevada',
        'UT'=>'Utah',
        'CO'=>'Colorado',
        'NM'=>'New Mexico',
        'OR'=>'Oregon',
        'ND'=>'North Dakota',
        'SD'=>'South Dakota',
        'NE'=>'Nebraska',
        'IA'=>'Iowa',
        'MS'=>'Mississippi',
        'IN'=>'Indiana',
        'IL'=>'Illinois',
        'MN'=>'Minnesota',
        'WI'=>'Wisconsin',
        'MO'=>'Missouri',
        'AR'=>'Arkansas',
        'OK'=>'Oklahoma',
        'KS'=>'Kansas',
        'LA'=>'Louisiana',
        'VA'=>'Virginia',
        'DC'=>'District of Columbia'
    ];

    private $urlStates = [
        'HI'=>'hawaii',
        'AK'=>'alaska',
        'FL'=>'florida',
        'SC'=>'south-carolina',
        'GA'=>'georgia',
        'AL'=>'alabama',
        'NC'=>'north-carolina',
        'TN'=>'tennessee',
        'RI'=>'rhode-island',
        'CT'=>'connecticut',
        'MA'=>'massachusetts',
        'ME'=>'maine',
        'NH'=>'new-hampshire',
        'VT'=>'vermont',
        'NY'=>'new-york',
        'NJ'=>'new-jersey',
        'PA'=>'pennsylvania',
        'DE'=>'delaware',
        'MD'=>'maryland',
        'WV'=>'west-virginia',
        'KY'=>'kentucky',
        'OH'=>'ohio',
        'MI'=>'michigan',
        'WY'=>'wyoming',
        'MT'=>'montana',
        'ID'=>'Idaho',
        'WA'=>'washington',
        'TX'=>'texas',
        'CA'=>'california',
        'AZ'=>'arizona',
        'NV'=>'nevada',
        'UT'=>'utah',
        'CO'=>'colorado',
        'NM'=>'new-mexico',
        'OR'=>'oregon',
        'ND'=>'north-dakota',
        'SD'=>'south-dakota',
        'NE'=>'nebraska',
        'IA'=>'iowa',
        'MS'=>'mississippi',
        'IN'=>'indiana',
        'IL'=>'illinois',
        'MN'=>'minnesota',
        'WI'=>'wisconsin',
        'MO'=>'missouri',
        'AR'=>'arkansas',
        'OK'=>'oklahoma',
        'KS'=>'kansas',
        'LA'=>'louisiana',
        'VA'=>'virginia'
    ];

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

        foreach($this->urlStates as $state)
        {
            array_push($allowed_pages, $state.'-post-office-jobs');
        }

        $sharedData = $this->sharedData;
        $segments = $sharedData['segments'];

        $request = $this->request;


        //dd($request);

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

        $state = $this->request->get('state');

        $variables = [];
        $version = $sharedData['version'];

        if($page == 'step' && !empty($state)) {

            $states = $this->states;
            asort($states, SORT_STRING);

            $state_name = $this->states[$state];

            session(['isStepDone' => true]);

        }elseif($page == 'step' && $version != 5) {
            $state = 'CA';
            $state_name = 'California';

            $txt = $version == 5 ? 'Please enter zip to proceed.' : 'Please select state to proceed.';
            return redirect('/v'.$version)->with('status', $txt);

        }elseif($page == 'step' && $version == 5) {
            $state = 'CA';
            $state_name = 'California';

            $txt = $version == 5 ? 'Please enter zip to proceed.' : 'Please select state to proceed.';

            $location = $this->request->get('location');

            $loc = \Sanitize::encodeLocation($location);

            #dd($loc, $location);
        }

        $isStepDone = $this->request->session()->pull('isStepDone',false);
        if($page == 'checkout' && !$isStepDone)
        {
            $txt = 'Please select state to proceed.';
            #return redirect('/v'.$version)->with('status', $txt);
        }

        $variables[] = 'state';
        $variables[] = 'state_name';


        $v = $this->view($blade, compact($variables));

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
