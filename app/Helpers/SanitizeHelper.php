<?php

namespace App\Helpers;

use App\Contracts\Helpers\SanitizeHelperInterface;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

class SanitizeHelper implements SanitizeHelperInterface
{
    protected $config;
    protected $request;

    public function __construct(Config $config, Request $request)
    {
        $this->config = $config;
        $this->request = $request;

        //dd($config->get('site'));
        //dd($request->route()->parameters());
    }

    public function camelize($str)
    {
        return str_replace(" ", "", ucfirst(camel_case(str_replace(".", " ", $str))));
    }

    /**
     * All route parameters passed through this method
     * Does centralize cleanup procedure
     *
     * @param $str
     * @param $type
     * @return string
     */
    public function clean($str, $type)
    {
        switch($type){
            case 'keyword':
                return $this->cleanKeyword($str);
                break;
            case 'location':
                return $this->cleanLocation($str);
                break;
            case 'page':
                return $this->cleanPage($str);
                break;
            default:
                return $this->cleanUrl($str);
                break;
        }
    }

    public function cleanPage($str){
        $str = ucwords($str);
        $str = $this->removeExtraWhiteSpace($str);
        $str = $this->space2Dash($str);
        $str = $this->encodeLocation($str);
        return $str;
    }

    public function cleanLocation($str){
        $str = ucwords($str);
        $str = $this->removeExtraWhiteSpace($str);
        $str = $this->space2Dash($str);
        $str = $this->customUcwords($str);

        return $str;
    }

    public function cleanUrl($str){
        $str = $this->removeExtraWhiteSpace($str);
        $pos = strpos($str, ' ');

        $str = $pos === false ? $str : ucwords($str);
        $str = $this->space2Dash($str);
        $str = $this->ucwordsAnd($str);

        return $str;
    }

    public function cleanKeyword($response){
        $response = $this->removeExtraWhiteSpace($response);
        $kw = str_replace(array("jobs ", "job "), " ", $response);
        if (!empty($kw)) {
            $exclude = array(
                'job',
                'vacancy',
                'vacancies',
                'career',
                'position',
                'employment',
                'application',
                'opening',
                'job search',
                'job application',
            );
            $exclude = '(' . implode('|', $exclude) . ')';
            $pattern = "/" . $exclude . "(s|)$/i";
            $kw = preg_replace($pattern, '', strtolower(trim($kw)));
            $response = trim(ucwords($kw));
        }
        $response = $this->dash2Space($response);
        $pos = strpos($response, ' ');
        $response = $pos === false ? $response : ucwords($response);
        $response = $this->encodeKeyword($response);
        return $response;
    }

    public function removeExtraWhiteSpace($str){
        return preg_replace("/\s+/", " ",$str);
    }

    public function space2Dash($str){
        return preg_replace('/ /', '-', $str);
    }

    public function dash2Space($str){
        return preg_replace('/\-/', ' ', $str);
    }

    public function andDash2space($str){
        return preg_replace('/-And-/', ' and ', $str);
    }

    public function ucwordsAnd($str){
        return preg_replace('/-and-/', '-And-', $str);
    }

    public function decodeString($str)
    {
        $str = trim($str);
        $str = str_replace("-", " ", strip_tags(urldecode($str)));
        return $str;
    }

    public function encodeKeyword($str) {
        $str = trim($str);
        $str = trim(preg_replace("/\s+/", " ", preg_replace('/[^\da-z]/i', ' ', strip_tags(urldecode($str)))));
        return str_replace(" ", "-", ucwords($str));
    }

    /**
     * Encode and generate string in lowercase
     * @param $str
     * @return string
     */
    public function encodeStrLower($str) {
        $str = $this->encodeKeyword($str);
        return strtolower($str);
    }

    /**
     * Generate keyword and location uri
     * @param $keyword
     * @param $location
     * @return string
     */
    public function encodeKeywordLocation($keyword,$location)
    {
        return $this->encodeKeyword($keyword)."/".$this->encodeLocation($location);
    }

    /**
     * Clean string
     * @param $str
     * @return mixed|string
     */
    public function cleanString($str)
    {
        $str = trim($str);
        $str = trim(preg_replace("/\s+/", " ", preg_replace('/[^\da-z]/i', ' ', strip_tags(urldecode($str)))));
        $str = trim($str);
        $str = str_replace("-", " ", strip_tags(urldecode($str)));
        return $str;
    }

    /**
     * Decode Encoded Location string
     * @param $str
     * @return mixed|string
     */
    public function decodeLocation($str) {
        $str = trim($str);
        $str = str_replace("-", " ", ucwords($str));
        $str = str_replace(",", " ", ucwords($str));
        $str = trim(preg_replace("/(\(|\)|-|\/|\,|\.|\?|\{|\}|!|:)/", '', $str));
        $str = $this->removeExtraWhiteSpace($str);
        if (strlen($str) == 2)
            $str = strtoupper($str);
        if (strlen($str) > 2 && substr($str, -3, 1) == "-")
            $str = substr($str, 0, strlen($str) - 3)."-".strtoupper(substr($str, -2, 2));
        return $str;
    }

    public function encodeLocation($str) {
        $str = trim($str);
        $str = trim(preg_replace("/\s+/", " ", preg_replace('/[^\da-z]/i', ' ', strip_tags(urldecode($str)))));
        $str = str_replace(" ", "-", ucwords($str));
        if (strlen($str) == 2)
            $str = strtoupper($str);
        if (strlen($str) > 2 && substr($str, -3, 1) == "-")
            $str = substr($str, 0, strlen($str) - 3)."-".strtoupper(substr($str, -2, 2));
        return $str;
    }

    public function parsePURL($reqUri) {
        $vars = array(
            'job'       => false,
            'joburi'    => '',
            'jobstatus' => 'nojob',
            'loc'       => false,
            'locuri'    => '',
            'locstatus' => 'noloc',
        );

        $jobsdirect = mb_substr(isset($reqUri) ? $reqUri : '', 0, 6);

        $jobsdirect =  ($jobsdirect == '/Jobs/');
        if (!$jobsdirect) return false;

        $querystring = isset($reqUri) ? html_entity_decode(substr(strtolower($reqUri), 5)) : '';
        $qquery = explode('/', $querystring, 3);
        $query = "-".$qquery[1];

        $known = array(
            '-q-' => 'job',
            '-l-' => 'loc',
            /*
            '-u-' => 'utm_term',
            '-g-' => 'gclid',
            '-pg-' => 'pg',
            '-pp-' => 'pp',
            '-z-' => 'zip',
            '-kw-' => 'kw',    // keyword clicked
            '-ad-' => 'ad',    // adid in google adwords api
            '-n-'  => 'n',    // network values g, s, or d for Google Search, a search partner, and Display Network
            '-t-'  => 't',    // placement (not always set), site click came from
            '-mt-' => 'mt',    // matchtype the matching option of the keyword that triggered your ad: exact, phrase, or broad (which will appear as "e," "p," and "b," respectively)
            '-d-'  => 'd',    // device values m, t, c  for Mobile, Tablet, and Computer
            */
        );

        $poses = array();
        foreach ($known as $key => $value) {
            $pos = strpos($query, $key);
            if ($pos !== false) {
                $poses[$key] = $pos;
            }
        }
        asort($poses);
        foreach ($poses as $key => $value) {
            unset($poses[$key]);
            $poses[] = array('name' => $key, 'pos' => $value);
        }

        for ($i=0; $i < count($poses); $i++) {
            $name = $poses[$i]['name'];
            $start = $poses[$i]['pos'] + strlen($name);
            $val = false;
            if ($i < count($poses) - 1) {
                $next = $poses[$i + 1]['pos'];
                $size = $poses[$i+1]['pos'] - $poses[$i]['pos'] - strlen($name);
                if ($size > 0) {
                    if ($start + $size <= $next ) {
                        $val = mb_substr($query, $start, $size);
                    }
                }
            } else {
                $val = mb_substr($query, $start);
            }

            $qexp = explode('/', $val, 2);

            $val = current($qexp);

            if ($val) $vars[$known[$name]] = trim(str_replace('-', ' ', $val));
        }

        if (count($vars) < 1) {
            return $vars;
        }

        if (isset($vars['job']) && !empty($vars['job'])) {
            $vars['jobstatus'] = 'ok';
        }

        if (isset($zipcode['zip'])) {
            $loc = strtolower($vars['loc']);
            if (strtolower($zipcode['state']) == $loc) {
                $vars['locstatus'] = 'state';
                // $vars['loc'] = $zipcode['state'];
                $vars['zip'] = $zipcode['zip'];
            }
            else if (strtolower($zipcode['longstate']) == $loc) {
                $vars['locstatus'] = 'state';
                // $vars['loc'] = $zipcode['state'];
                $vars['zip'] = $zipcode['zip'];
            }
            else if ( (strtolower($zipcode['city']) == $loc) || (strtolower($zipcode['citystate']) == $loc) ) {
                $vars['locstatus'] = 'city';
                // $vars['loc'] = $zipcode['city'] . ', ' . $zipcode['state'];
                $vars['zip'] = $zipcode['zip'];
                $vars['location'] = $vars['loc'];
            }
            else if ( (strtolower($zipcode['city']) == $loc) || (strtolower($zipcode['citystatefull']) == $loc) ) {
                $vars['locstatus'] = 'city';
                // $vars['loc'] = $zipcode['city'] . ', ' . $zipcode['state'];
                $vars['zip'] = $zipcode['zip'];
                $vars['location'] = $vars['loc'];
            }
            $vars['city'] = $zipcode['city'];
            $vars['statefull'] = $zipcode['longstate'];
            $vars['state'] = $zipcode['state'];
        }

        if (isset($vars['job'])) $vars['joburi'] = $this->prepString($vars['job']);
        if (isset($vars['location'])) $vars['locuri'] = $this->prepString($vars['location']);

        return (count($vars) > 0 ? $vars : false);
    }

    public function prepString($str, $keepcase = true) {
        $str = trim($str);
        if (!$keepcase) $str = strtolower($str);

        $str = preg_replace("/[^A-Za-z0-9&]/", '-', $str);
        $str = str_replace(array(' - ', '--', '- ', ' -', ' '), '-', $str);
        $str = str_replace(array(' - ', '--', '- ', ' -', ' '), '-', $str);
        if (substr($str,-1,1) == '-') $str = substr($str, 0, strlen($str) - 1);
        return $str;
    }

    public function customUcwords($str) {
        $response = "";
        $arr = explode(" ", $str);
        $arr = array_map("ucfirst", $arr);
        return implode(" ",$arr);
    }

    public function cleanJSON($str) {
        return iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($str));
    }

    public function cleanPhone($phone) {
        return str_replace(array("(",")","-"," ","_",".","/"), "", $phone);
    }

    public function randStr($length = 8, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890') {
        // Length of character list
        $chars_length = (strlen($chars) - 1);

        // Start our string
        $string = $chars{rand(0, $chars_length)};

        // Generate random string
        for ($i = 1; $i < $length; $i = strlen($string))
        {
            // Grab a random character from our list
            $r = $chars{rand(0, $chars_length)};

            // Make sure the same two characters don't appear next to each other
            if ($r != $string{$i - 1}) $string .=  $r;
        }

        // Return the string
        return $string;
    }

    public function formatPhone($string) {
        $number = trim(preg_replace('#[^0-9]#s', '', $string));

        $length = strlen($number);
        $regex = false;
        if($length == 7) {
            $regex = '/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/';
            $replace = '$1-$2';
        } elseif($length == 10) {
            $regex = '/([0-9]{3})([0-9]{3})([0-9]{4})/';
            $replace = '($1)$2-$3';
        } elseif($length == 11) {
            $regex = '/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/';
            $replace = '$1($2) $3-$4';
        }

        $formatted = $regex ? preg_replace($regex, $replace, $number) : $number;

        return $formatted;
    }
}