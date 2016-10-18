<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class CommonComposer
{
    private $countries = [
        'AFG'=>'Afghanistan',
        'ALB'=>'Albania',
        'DZA'=>'Algeria',
        'ASM'=>'American Samoa',
        'AND'=>'Andorra',
        'AGO'=>'Angola',
        'AIA'=>'Anguilla',
        'ATG'=>'Antigua and Barbuda',
        'ARG'=>'Argentina',
        'ARM'=>'Armenia',
        'ABW'=>'Aruba',
        'AUS'=>'Australia',
        'AUT'=>'Austria',
        'AZE'=>'Azerbaijan',
        'BHS'=>'Bahamas',
        'BHR'=>'Bahrain',
        'BGD'=>'Bangladesh',
        'BRB'=>'Barbados',
        'BLR'=>'Belarus',
        'BEL'=>'Belgium',
        'BLZ'=>'Belize',
        'BEN'=>'Benin',
        'BMU'=>'Bermuda',
        'BTN'=>'Bhutan',
        'BOL'=>'Bolivia',
        'BIH'=>'Bosnia and Herzegovina',
        'BWA'=>'Botswana',
        'NUL'=>'Timor-Leste',
        'BRA'=>'Brazil',
        'BRN'=>'Brunei Darussalam',
        'BGR'=>'Bulgaria',
        'BFA'=>'Burkina Faso',
        'BDI'=>'Burundi',
        'KHM'=>'Cambodia',
        'CMR'=>'Cameroon',
        'CAN'=>'Canada',
        'CPV'=>'Cape Verde',
        'CYM'=>'Cayman Islands',
        'CAF'=>'Central African Republic',
        'TCD'=>'Chad',
        'CHL'=>'Chile',
        'CHN'=>'China',
        'COL'=>'Colombia',
        'COM'=>'Comoros',
        'COG'=>'Congo',
        'COD'=>'Congo, the Democratic Republic of the',
        'COK'=>'Cook Islands',
        'CRI'=>'Costa Rica',
        'HRV'=>'Croatia',
        'CUB'=>'Cuba',
        'CYP'=>'Cyprus',
        'CZE'=>'Czech Republic',
        'DNK'=>'Denmark',
        'DJI'=>'Djibouti',
        'DMA'=>'Dominica',
        'DOM'=>'Dominican Republic',
        'ECU'=>'Ecuador',
        'EGY'=>'Egypt',
        'SLV'=>'El Salvador',
        'GNQ'=>'Equatorial Guinea',
        'ERI'=>'Eritrea',
        'EST'=>'Estonia',
        'ETH'=>'Ethiopia',
        'FLK'=>'Falkland Islands (Malvinas)',
        'FRO'=>'Faroe Islands',
        'FJI'=>'Fiji',
        'FIN'=>'Finland',
        'FRA'=>'France',
        'GUF'=>'French Guiana',
        'PYF'=>'French Polynesia',
        'GAB'=>'Gabon',
        'GMB'=>'Gambia',
        'GEO'=>'Georgia',
        'DEU'=>'Germany',
        'GHA'=>'Ghana',
        'GIB'=>'Gibraltar',
        'GRC'=>'Greece',
        'GRL'=>'Greenland',
        'GRD'=>'Grenada',
        'GLP'=>'Guadeloupe',
        'GUM'=>'Guam',
        'GTM'=>'Guatemala',
        'GIN'=>'Guinea',
        'GNB'=>'Guinea-Bissau',
        'GUY'=>'Guyana',
        'HTI'=>'Haiti',
        'VAT'=>'Holy See (Vatican City State)',
        'HND'=>'Honduras',
        'HKG'=>'Hong Kong',
        'HUN'=>'Hungary',
        'ISL'=>'Iceland',
        'IND'=>'India',
        'IDN'=>'Indonesia',
        'IRN'=>'Iran, Islamic Republic of',
        'IRQ'=>'Iraq',
        'IRL'=>'Ireland',
        'ISR'=>'Israel',
        'ITA'=>'Italy',
        'JAM'=>'Jamaica',
        'JPN'=>'Japan',
        'JOR'=>'Jordan',
        'KAZ'=>'Kazakhstan',
        'KEN'=>'Kenya',
        'KIR'=>'Kiribati',
        'KOR'=>'Korea, Republic of',
        'KWT'=>'Kuwait',
        'KGZ'=>'Kyrgyzstan',
        'LVA'=>'Latvia',
        'LBN'=>'Lebanon',
        'LSO'=>'Lesotho',
        'LBR'=>'Liberia',
        'LBY'=>'Libyan Arab Jamahiriya',
        'LIE'=>'Liechtenstein',
        'LTU'=>'Lithuania',
        'LUX'=>'Luxembourg',
        'MAC'=>'Macao',
        'MKD'=>'Macedonia, the Former Yugoslav Republic of',
        'MDG'=>'Madagascar',
        'MWI'=>'Malawi',
        'MYS'=>'Malaysia',
        'MDV'=>'Maldives',
        'MLI'=>'Mali',
        'MLT'=>'Malta',
        'MHL'=>'Marshall Islands',
        'MTQ'=>'Martinique',
        'MRT'=>'Mauritania',
        'MUS'=>'Mauritius',
        'MEX'=>'Mexico',
        'FSM'=>'Micronesia, Federated States of',
        'MDA'=>'Moldova, Republic of',
        'MCO'=>'Monaco',
        'MNG'=>'Mongolia',
        'MSR'=>'Montserrat',
        'MAR'=>'Morocco',
        'MOZ'=>'Mozambique',
        'MMR'=>'Myanmar',
        'NAM'=>'Namibia',
        'NRU'=>'Nauru',
        'NPL'=>'Nepal',
        'NLD'=>'Netherlands',
        'ANT'=>'Netherlands Antilles',
        'NCL'=>'New Caledonia',
        'NZL'=>'New Zealand',
        'NIC'=>'Nicaragua',
        'NER'=>'Niger',
        'NGA'=>'Nigeria',
        'NIU'=>'Niue',
        'NFK'=>'Norfolk Island',
        'MNP'=>'Northern Mariana Islands',
        'NOR'=>'Norway',
        'OMN'=>'Oman',
        'PAK'=>'Pakistan',
        'PLW'=>'Palau',
        'PAN'=>'Panama',
        'PNG'=>'Papua New Guinea',
        'PRY'=>'Paraguay',
        'PER'=>'Peru',
        'PHL'=>'Philippines',
        'PCN'=>'Pitcairn',
        'POL'=>'Poland',
        'PRT'=>'Portugal',
        'PRI'=>'Puerto Rico',
        'QAT'=>'Qatar',
        'REU'=>'Reunion',
        'ROM'=>'Romania',
        'RUS'=>'Russian Federation',
        'RWA'=>'Rwanda',
        'SHN'=>'Saint Helena',
        'KNA'=>'Saint Kitts and Nevis',
        'LCA'=>'Saint Lucia',
        'SPM'=>'Saint Pierre and Miquelon',
        'VCT'=>'Saint Vincent and the Grenadines',
        'WSM'=>'Samoa',
        'SMR'=>'San Marino',
        'STP'=>'Sao Tome and Principe',
        'SAU'=>'Saudi Arabia',
        'SEN'=>'Senegal',
        'SRB'=>'Serbia',
        'SYC'=>'Seychelles',
        'SLE'=>'Sierra Leone',
        'SGP'=>'Singapore',
        'SVK'=>'Slovakia',
        'SVN'=>'Slovenia',
        'SLB'=>'Solomon Islands',
        'SOM'=>'Somalia',
        'ZAF'=>'South Africa',
        'ESP'=>'Spain',
        'LKA'=>'Sri Lanka',
        'SDN'=>'Sudan',
        'SUR'=>'Suriname',
        'SJM'=>'Svalbard and Jan Mayen',
        'SWZ'=>'Swaziland',
        'SWE'=>'Sweden',
        'CHE'=>'Switzerland',
        'SYR'=>'Syrian Arab Republic',
        'TWN'=>'Taiwan, Province of China',
        'TJK'=>'Tajikistan',
        'TZA'=>'Tanzania, United Republic of',
        'THA'=>'Thailand',
        'TGO'=>'Togo',
        'TKL'=>'Tokelau',
        'TON'=>'Tonga',
        'TTO'=>'Trinidad and Tobago',
        'TUN'=>'Tunisia',
        'TUR'=>'Turkey',
        'TKM'=>'Turkmenistan',
        'TCA'=>'Turks and Caicos Islands',
        'TUV'=>'Tuvalu',
        'UGA'=>'Uganda',
        'UKR'=>'Ukraine',
        'ARE'=>'United Arab Emirates',
        'GBR'=>'United Kingdom',
        'USA'=>'United States',
        'URY'=>'Uruguay',
        'UZB'=>'Uzbekistan',
        'VUT'=>'Vanuatu',
        'VEN'=>'Venezuela',
        'VNM'=>'Viet Nam',
        'VGB'=>'Virgin Islands, British',
        'VIR'=>'Virgin Islands, U.s.',
        'WLF'=>'Wallis and Futuna',
        'ESH'=>'Western Sahara',
        'YEM'=>'Yemen',
        'ZMB'=>'Zambia',
        'ZWE'=>'Zimbabwe'
    ];

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

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('states', $this->states);
        $view->with('countries', $this->countries);
    }
}