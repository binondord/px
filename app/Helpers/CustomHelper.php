<?php

namespace App\Helpers;

use App\Contracts\Helpers\CustomHelperInterface;

class CustomHelper implements CustomHelperInterface {
    public static function shuffleArray(array $arr, $num=1)
    {
        $response = array();
        if (count($arr) > 0) {
            $num = ($num > count($arr)) ? count($arr) : $num;
            $response = static::multidimensional_array_rand($arr, $num);
        }
        return $response;
    }

    public static function getRelatedKeywordsV2($keyword, $location)
    {
        $keywords = array();

        $keyword = str_replace(array("*", "?", "~", "\\", "(", ")", "{", "}"),"",strip_tags(urldecode(htmlspecialchars($keyword))));
        $location = str_replace(array("*", "?", "~", "\\", "(", ")", "{", "}"),"",strip_tags(urldecode(htmlspecialchars($location))));

        // Check if cached.
        $expireAt = Carbon::now()->addDays(7);
        $response = \Cache::remember("jobkw_related_".urlencode($keyword), $expireAt, function() use ($keyword){
            $api = "http://relkws.elasticbeanstalk.com/keywords/keywords.php";
            $params = array(
                "kw"	=> strtolower($keyword),
            );
            $cmd = 'curl -s "'.$api."?".http_build_query($params).'" --connect-timeout 1 -m 1';
            return `$cmd`;
        });

        //if empty from.. forget cache.che.
        if (!empty($response)) {
            \Cache::forget("jobkw_related_".urlencode($keyword));
        }

        if (!empty($response)) {
            $arr['related'] = json_decode($response, true);
            if (is_array($arr['related']) && count($arr['related']) > 0) {
                foreach($arr['related'] as $kword) {
                    $cut_keyword = strip_tags(trim(stripslashes($kword)));
                    if (strlen($cut_keyword) > 30 && preg_match('/^.{1,30}\b/s', $cut_keyword, $match))
                        $cut_keyword = $match[0]."...";

                    $extra_keyword = \Sanitize::cleanKeyword($kword);
                    $extra_keyword =  preg_replace('/ /', '-', preg_replace("/\s+/", " ", strtolower($extra_keyword)));
                    $extra_orig_location = preg_replace("/(\(|\)|-|\/|\,|\.|!|:)/", '', $location);
                    $extra_orig_location =  preg_replace('/ /', '-', preg_replace("/\s+/", " ", strtolower($extra_orig_location)));
                    $keypatterns = explode(" ", $keyword);
                    $keywords[] = array(
                        "link" 			=> \Sanitize::encodeKeyword($extra_keyword)."/".\Sanitize::encodeLocation($extra_orig_location),
                        "title"			=> preg_replace('~('.implode('|', $keypatterns).'[a-zA-Z]{0,45})(?![^<]*[>])~is','<strong>$0</strong>', ucwords($cut_keyword)),
                        "title_nobold"	=> ucwords($cut_keyword),
                        // "title"		=> ucwords($kword),
                    );
                }
            }
        }

        return $keywords;
    }

    /**
     * multidimensional_array_rand()
     * @param array $array
     * @param integer $limit
     * @return array
     */
    public static function multidimensional_array_rand($array, $limit = 2)
    {
        uksort( $array, 'static::callback_rand' );
        return array_slice( $array, 0, $limit, true );
    }

    /**
     * callback_rand()
     * @return bool
     */
    public static function callback_rand()
    {
        return rand() > rand();
    }

    /**
     * getHourlyCategory()
     * @return array
     */
    public static function getHourlyCategory()
    {
        $response = [];
        $date = date('Y-m-d 00:00:00');
        $counts = 24;
        $ctr = 1;
        while ($counts >= $ctr) {
            $format_24 = date('H', strtotime($date));
            if ($format_24 == '00')
                $format_12_from = "12mn";
            else
                $format_12_from = date('ha', strtotime($date));

            if ($format_24 == '23')
                $format_12_to = "12mn";
            else
                $format_12_to = date('ha', strtotime($date."+1 hour"));

            $response[$format_24] = $format_12_from." ".$format_12_to;
            $date = date('Y-m-d H:i:s', strtotime($date."+1 hour"));
            $ctr++;
        }
        return $response;
    }

    public static function clearVal($n)
    {
        return 0;
    }

    public static function getDefaultProfileSummmary($category)
    {
        $response = array();
        $lookups = \Lookup::all();
        if (!empty($category)) {
            switch($category) {
                case "Career of Interest":
                    $list = $lookups['signup_careerinterest'];
                    break;

                case "Education Level":
                    $list = $lookups['signup_educlevels'];
                    break;

                case "Further Education":
                    $list = $lookups['signup_educinterest'];
                    break;
            }

            // Arrange list, with 0 default count.
            foreach($list as $k => $val) {
                $response[$k] = array(
                    'name' => $val,
                    'count' => 0
                );
            }
        }
        return $response;
    }

    public static function shellExec($curl_url, $timeout){
        $response = shell_exec('curl -s -X GET "'.$curl_url.'"'.$timeout);
        if ($response && !empty($response)) {
            $json = json_decode($response);
            if ($json && ($json->result == 'fail' || $json->result == 'success'))
                $res['status'] = 'OK';
        }

        return $res;
    }

    public static function secureUrl() {
        if (\Request::secure() || \Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
            return true;

        return false;
    }
}