$(document).ready(function() {
    $('#map').usmap({
        showLabels: true,
        'stateSpecificStyles': {

            'HI': {fill: '#154f68'}, //Hawaii
            'AK': {fill: '#3f7ba3'}, //Alaska
            'FL': {fill: '#3f7ba3'}, //Florida
            'SC': {fill: '#7eafd0'}, //South Carolina
            'GA': {fill: '#154f68'}, //Georgia
            'AL': {fill: '#7eafd0'}, //Alabama
            'NC': {fill: '#3f7ba3'}, //North Carolina
            'TN': {fill: '#a3c4d6'}, //Tennessee
            'RI': {fill: '#154f68'}, //Rhode Island
            'CT': {fill: '#3f7ba3'}, //Connecticut
            'MA': {fill: '#7eafd0'}, //Massachusetts
            'ME': {fill: '#154f68'}, //Maine
            'NH': {fill: '#7eafd0'}, //New Hampshire
            'VT': {fill: '#a3c4d6'}, //Vermont
            'NY': {fill: '#154f68'}, //New York
            'NJ': {fill: '#a3c4d6'}, //New Jersey
            'PA': {fill: '#7eafd0'}, //Pennsylvania
            'DE': {fill: '#3f7ba3'}, //Delaware
            'MD': {fill: '#154f68'}, //Maryland
            'WV': {fill: '#a3c4d6'}, //West Virginia
            'KY': {fill: '#154f68'}, //Kentucky
            'OH': {fill: '#3f7ba3'}, //Ohio
            'MI': {fill: '#154f68'}, //Michigan
            'WY': {fill: '#154f68'}, //Wyoming
            'MT': {fill: '#3f7ba3'}, //Montana
            'ID': {fill: '#7eafd0'}, //Idaho
            'WA': {fill: '#154f68'}, //Washington
            'TX': {fill: '#3f7ba3'}, //Texas
            'CA': {fill: '#7eafd0'}, //California
            'AZ': {fill: '#a3c4d6'}, //Arizona
            'NV': {fill: '#154f68'}, //Nevada
            'UT': {fill: '#3f7ba3'}, //Utah
            'CO': {fill: '#7eafd0'}, //Colorado
            'NM': {fill: '#154f68'}, //New Mexico
            'OR': {fill: '#3f7ba3'}, //Oregon
            'ND': {fill: '#154f68'}, //North Dakota
            'SD': {fill: '#7eafd0'}, //South Dakota
            'NE': {fill: '#3f7ba3'}, //Nebraska
            'IA': {fill: '#154f68'}, //Iowa
            'MS': {fill: '#3f7ba3'}, //Mississippi
            'IN': {fill: '#7eafd0'}, //Indiana
            'IL': {fill: '#3f7ba3'}, //Illinois
            'MN': {fill: '#3f7ba3'}, //Minnesota
            'WI': {fill: '#7eafd0'}, //Wisconsin
            'MO': {fill: '#7eafd0'}, //Missouri
            'AR' : {fill: '#154f68'}, //Arkansas
            'OK': {fill: '#a3c4d6'}, //Oklahoma
            'KS': {fill: '#154f68'}, //Kansas
            'LA': {fill: '#7eafd0'}, //Louisiana
            'VA': {fill: '#7eafd0',label: 'Virginia'}, //Virginia
            'DC': {fill: '#79b031'} //Dist. of Columbia

        },
        'stateSpecificHoverStyles': {
            'HI' : {fill: '#ff0'}
        },

        'mouseoverState': {
            'HI' : function(event, data) {
                //return false;
            }
        },


        'click' : function(event, data){
            console.log('Click '+data.name);
            document.location.href = "/v6/step?state="+data.name;
        }
    });

    $('#over-md').click(function(event){
        $('#map').usmap('trigger', 'MD', 'mouseover', event);
    });

    $('#out-md').click(function(event){
        $('#map').usmap('trigger', 'MD', 'mouseout', event);
    });
});


/*

 HI
 AK
 FL
 SC
 GA
 AL
 NC
 TN
 RI
 CT
 MA
 ME
 NH
 VT
 NY
 NJ
 PA
 DE
 MD
 WV
 KY
 OH
 MI
 WY
 MT
 ID
 WA
 TX
 CA
 AZ
 NV
 UT
 CO
 NM
 OR
 ND
 SD
 NE
 IA
 MS
 IN
 IL
 MN
 WI
 MO
 AR
 OK
 KS
 LA
 VA
 DC
 */