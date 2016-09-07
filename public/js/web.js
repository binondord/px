$(document).ready(function() {
    $('#map').usmap({
        showLabels: true,
        'stateSpecificStyles': {
            'HI': {fill: '#01aad3'}, //Hawaii
            'AK': {fill: '#79b031'}, //Alaska
            'FL': {fill: '#01892d'}, //Florida
            'SC': {fill: '#79b031'}, //South Carolina
            'GA': {fill: '#0a71b4'}, //Georgia
            'AL': {fill: '#c03a91'}, //Alabama
            'NC': {fill: '#01a9d4'}, //North Carolina
            'TN': {fill: '#e26928'}, //Tennessee
            'RI': {fill: '#0ba8ce'}, //Rhode Island
            'CT': {fill: '#e26928'}, //Connecticut
            'MA': {fill: '#c03a91'}, //Massachusetts
            'ME': {fill: '#79b031'}, //Maine
            'NH': {fill: '#dd353a'}, //New Hampshire
            'VT': {fill: '#f8b334'}, //Vermont
            'NY': {fill: '#0b72b5'}, //New York
            'NJ': {fill: '#79b031'}, //New Jersey
            'PA': {fill: '#dd353a'}, //Pennsylvania
            'DE': {fill: '#e26927'}, //Delaware
            'MD': {fill: '#c03a91'}, //Maryland
            'WV': {fill: '#8a65ce'}, //West Virginia
            'KY': {fill: '#dd353a'}, //Kentucky
            'OH': {fill: '#79b031'}, //Ohio
            'MI': {fill: '#e26928'}, //Michigan
            'WY': {fill: '#8a65ce'}, //Wyoming
            'MT': {fill: '#e26928'}, //Montana
            'ID': {fill: '#c03a91'}, //Idaho
            'WA': {fill: '#dd353a'}, //Washington
            'TX': {fill: '#79b031'}, //Texas
            'CA': {fill: '#f8b334'}, //California
            'AZ': {fill: '#dd353a'}, //Arizona
            'NV': {fill: '#01aad3'}, //Nevada
            'UT': {fill: '#01892d'}, //Utah
            'CO': {fill: '#f8b334'}, //Colorado
            'NM': {fill: '#c03a91'}, //New Mexico
            'OR': {fill: '#0a71b4'}, //Oregon
            'ND': {fill: '#0a71b4'}, //North Dakota
            'SD': {fill: '#79b031'}, //South Dakota
            'NE': {fill: '#06a6cf'}, //Nebraska
            'IA': {fill: '#f8b334'}, //Iowa
            'MS': {fill: '#f8b334'}, //Mississippi
            'IN': {fill: '#0a71b4'}, //Indiana
            'IL': {fill: '#bf3b91'}, //Illinois
            'MN': {fill: '#dd353a'}, //Minnesota
            'WI': {fill: '#8a65ce'}, //Wisconsin
            'MO': {fill: '#05882f'}, //Missouri
            'AR' : {fill: '#01aad3'}, //Arkansas
            'OK': {fill: '#0a71b4'}, //Oklahoma
            'KS': {fill: '#e26928'}, //Kansas
            'LA': {fill: '#dd353a'}, //Louisiana
            'VA': {fill: '#f8b334',label: 'Virginia'}, //Virginia
            'DC': {fill: '#000000'} //Dist. of Columbia
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
            document.location.href = "/step?state="+data.name;
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