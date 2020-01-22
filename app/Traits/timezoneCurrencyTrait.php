<?php

namespace App\Traits;

trait timezoneCurrencyTrait
{
    public function currencies()
    {
        return $json_currencies = '[
                              {
                                "currency": "Albania Lek",
                                "abbreviation": "ALL",
                                "symbol": "&#76;&#101;&#107;"
                              },
                              {
                                "currency": "Afghanistan Afghani",
                                "abbreviation": "AFN",
                                "symbol": "&#1547;"
                              },
                              {
                                "currency": "Argentina Peso",
                                "abbreviation": "ARS",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Aruba Guilder",
                                "abbreviation": "AWG",
                                "symbol": "&#402;"
                              },
                              {
                                "currency": "Australia Dollar",
                                "abbreviation": "AUD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Azerbaijan New Manat",
                                "abbreviation": "AZN",
                                "symbol": "&#1084;&#1072;&#1085;"
                              },
                              {
                                "currency": "Bahamas Dollar",
                                "abbreviation": "BSD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Barbados Dollar",
                                "abbreviation": "BBD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Belarus Ruble",
                                "abbreviation": "BYR",
                                "symbol": "&#112;&#46;"
                              },
                              {
                                "currency": "Belize Dollar",
                                "abbreviation": "BZD",
                                "symbol": "&#66;&#90;&#36;"
                              },
                              {
                                "currency": "Bermuda Dollar",
                                "abbreviation": "BMD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Bolivia Boliviano",
                                "abbreviation": "BOB",
                                "symbol": "&#36;&#98;"
                              },
                              {
                                "currency": "Bosnia and Herzegovina Convertible Marka",
                                "abbreviation": "BAM",
                                "symbol": "&#75;&#77;"
                              },
                              {
                                "currency": "Botswana Pula",
                                "abbreviation": "BWP",
                                "symbol": "&#80;"
                              },
                              {
                                "currency": "Bulgaria Lev",
                                "abbreviation": "BGN",
                                "symbol": "&#1083;&#1074;"
                              },
                              {
                                "currency": "Brazil Real",
                                "abbreviation": "BRL",
                                "symbol": "&#82;&#36;"
                              },
                              {
                                "currency": "Brunei Darussalam Dollar",
                                "abbreviation": "BND",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Cambodia Riel",
                                "abbreviation": "KHR",
                                "symbol": "&#6107;"
                              },
                              {
                                "currency": "Canada Dollar",
                                "abbreviation": "CAD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Cayman Islands Dollar",
                                "abbreviation": "KYD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Chile Peso",
                                "abbreviation": "CLP",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "China Yuan Renminbi",
                                "abbreviation": "CNY",
                                "symbol": "&#165;"
                              },
                              {
                                "currency": "Colombia Peso",
                                "abbreviation": "COP",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Costa Rica Colon",
                                "abbreviation": "CRC",
                                "symbol": "&#8353;"
                              },
                              {
                                "currency": "Croatia Kuna",
                                "abbreviation": "HRK",
                                "symbol": "&#107;&#110;"
                              },
                              {
                                "currency": "Cuba Peso",
                                "abbreviation": "CUP",
                                "symbol": "&#8369;"
                              },
                              {
                                "currency": "Czech Republic Koruna",
                                "abbreviation": "CZK",
                                "symbol": "&#75;&#269;"
                              },
                              {
                                "currency": "Denmark Krone",
                                "abbreviation": "DKK",
                                "symbol": "&#107;&#114;"
                              },
                              {
                                "currency": "Dominican Republic Peso",
                                "abbreviation": "DOP",
                                "symbol": "&#82;&#68;&#36;"
                              },
                              {
                                "currency": "East Caribbean Dollar",
                                "abbreviation": "XCD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Egypt Pound",
                                "abbreviation": "EGP",
                                "symbol": "&#163;"
                              },
                              {
                                "currency": "El Salvador Colon",
                                "abbreviation": "SVC",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Estonia Kroon",
                                "abbreviation": "EEK",
                                "symbol": "&#107;&#114;"
                              },
                              {
                                "currency": "Euro Member Countries",
                                "abbreviation": "EUR",
                                "symbol": "&#8364;"
                              },
                              {
                                "currency": "Falkland Islands (Malvinas) Pound",
                                "abbreviation": "FKP",
                                "symbol": "&#163;"
                              },
                              {
                                "currency": "Fiji Dollar",
                                "abbreviation": "FJD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Ghana Cedis",
                                "abbreviation": "GHC",
                                "symbol": "&#162;"
                              },
                              {
                                "currency": "Gibraltar Pound",
                                "abbreviation": "GIP",
                                "symbol": "&#163;"
                              },
                              {
                                "currency": "Guatemala Quetzal",
                                "abbreviation": "GTQ",
                                "symbol": "&#81;"
                              },
                              {
                                "currency": "Guernsey Pound",
                                "abbreviation": "GGP",
                                "symbol": "&#163;"
                              },
                              {
                                "currency": "Guyana Dollar",
                                "abbreviation": "GYD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Honduras Lempira",
                                "abbreviation": "HNL",
                                "symbol": "&#76;"
                              },
                              {
                                "currency": "Hong Kong Dollar",
                                "abbreviation": "HKD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Hungary Forint",
                                "abbreviation": "HUF",
                                "symbol": "&#70;&#116;"
                              },
                              {
                                "currency": "Iceland Krona",
                                "abbreviation": "ISK",
                                "symbol": "&#107;&#114;"
                              },
                              {
                                "currency": "India Rupee",
                                "abbreviation": "INR",
                                "symbol": null
                              },
                              {
                                "currency": "Indonesia Rupiah",
                                "abbreviation": "IDR",
                                "symbol": "&#82;&#112;"
                              },
                              {
                                "currency": "Iran Rial",
                                "abbreviation": "IRR",
                                "symbol": "&#65020;"
                              },
                              {
                                "currency": "Isle of Man Pound",
                                "abbreviation": "IMP",
                                "symbol": "&#163;"
                              },
                              {
                                "currency": "Israel Shekel",
                                "abbreviation": "ILS",
                                "symbol": "&#8362;"
                              },
                              {
                                "currency": "Jamaica Dollar",
                                "abbreviation": "JMD",
                                "symbol": "&#74;&#36;"
                              },
                              {
                                "currency": "Japan Yen",
                                "abbreviation": "JPY",
                                "symbol": "&#165;"
                              },
                              {
                                "currency": "Jersey Pound",
                                "abbreviation": "JEP",
                                "symbol": "&#163;"
                              },
                              {
                                "currency": "Kazakhstan Tenge",
                                "abbreviation": "KZT",
                                "symbol": "&#1083;&#1074;"
                              },
                              {
                                "currency": "Korea (North) Won",
                                "abbreviation": "KPW",
                                "symbol": "&#8361;"
                              },
                              {
                                "currency": "Korea (South) Won",
                                "abbreviation": "KRW",
                                "symbol": "&#8361;"
                              },
                              {
                                "currency": "Kyrgyzstan Som",
                                "abbreviation": "KGS",
                                "symbol": "&#1083;&#1074;"
                              },
                              {
                                "currency": "Laos Kip",
                                "abbreviation": "LAK",
                                "symbol": "&#8365;"
                              },
                              {
                                "currency": "Latvia Lat",
                                "abbreviation": "LVL",
                                "symbol": "&#76;&#115;"
                              },
                              {
                                "currency": "Lebanon Pound",
                                "abbreviation": "LBP",
                                "symbol": "&#163;"
                              },
                              {
                                "currency": "Liberia Dollar",
                                "abbreviation": "LRD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Lithuania Litas",
                                "abbreviation": "LTL",
                                "symbol": "&#76;&#116;"
                              },
                              {
                                "currency": "Macedonia Denar",
                                "abbreviation": "MKD",
                                "symbol": "&#1076;&#1077;&#1085;"
                              },
                              {
                                "currency": "Malaysia Ringgit",
                                "abbreviation": "MYR",
                                "symbol": "&#82;&#77;"
                              },
                              {
                                "currency": "Mauritius Rupee",
                                "abbreviation": "MUR",
                                "symbol": "&#8360;"
                              },
                              {
                                "currency": "Mexico Peso",
                                "abbreviation": "MXN",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Mongolia Tughrik",
                                "abbreviation": "MNT",
                                "symbol": "&#8366;"
                              },
                              {
                                "currency": "Mozambique Metical",
                                "abbreviation": "MZN",
                                "symbol": "&#77;&#84;"
                              },
                              {
                                "currency": "Namibia Dollar",
                                "abbreviation": "NAD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Nepal Rupee",
                                "abbreviation": "NPR",
                                "symbol": "&#8360;"
                              },
                              {
                                "currency": "Netherlands Antilles Guilder",
                                "abbreviation": "ANG",
                                "symbol": "&#402;"
                              },
                              {
                                "currency": "New Zealand Dollar",
                                "abbreviation": "NZD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Nicaragua Cordoba",
                                "abbreviation": "NIO",
                                "symbol": "&#67;&#36;"
                              },
                              {
                                "currency": "Nigeria Naira",
                                "abbreviation": "NGN",
                                "symbol": "&#8358;"
                              },
                              {
                                "currency": "Korea (North) Won",
                                "abbreviation": "KPW",
                                "symbol": "&#8361;"
                              },
                              {
                                "currency": "Norway Krone",
                                "abbreviation": "NOK",
                                "symbol": "&#107;&#114;"
                              },
                              {
                                "currency": "Oman Rial",
                                "abbreviation": "OMR",
                                "symbol": "&#65020;"
                              },
                              {
                                "currency": "Pakistan Rupee",
                                "abbreviation": "PKR",
                                "symbol": "&#8360;"
                              },
                              {
                                "currency": "Panama Balboa",
                                "abbreviation": "PAB",
                                "symbol": "&#66;&#47;&#46;"
                              },
                              {
                                "currency": "Paraguay Guarani",
                                "abbreviation": "PYG",
                                "symbol": "&#71;&#115;"
                              },
                              {
                                "currency": "Peru Nuevo Sol",
                                "abbreviation": "PEN",
                                "symbol": "&#83;&#47;&#46;"
                              },
                              {
                                "currency": "Philippines Peso",
                                "abbreviation": "PHP",
                                "symbol": "&#8369;"
                              },
                              {
                                "currency": "Poland Zloty",
                                "abbreviation": "PLN",
                                "symbol": "&#122;&#322;"
                              },
                              {
                                "currency": "Qatar Riyal",
                                "abbreviation": "QAR",
                                "symbol": "&#65020;"
                              },
                              {
                                "currency": "Romania New Leu",
                                "abbreviation": "RON",
                                "symbol": "&#108;&#101;&#105;"
                              },
                              {
                                "currency": "Russia Ruble",
                                "abbreviation": "RUB",
                                "symbol": "&#1088;&#1091;&#1073;"
                              },
                              {
                                "currency": "Saint Helena Pound",
                                "abbreviation": "SHP",
                                "symbol": "&#163;"
                              },
                              {
                                "currency": "Saudi Arabia Riyal",
                                "abbreviation": "SAR",
                                "symbol": "&#65020;"
                              },
                              {
                                "currency": "Serbia Dinar",
                                "abbreviation": "RSD",
                                "symbol": "&#1044;&#1080;&#1085;&#46;"
                              },
                              {
                                "currency": "Seychelles Rupee",
                                "abbreviation": "SCR",
                                "symbol": "&#8360;"
                              },
                              {
                                "currency": "Singapore Dollar",
                                "abbreviation": "SGD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Solomon Islands Dollar",
                                "abbreviation": "SBD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Somalia Shilling",
                                "abbreviation": "SOS",
                                "symbol": "&#83;"
                              },
                              {
                                "currency": "South Africa Rand",
                                "abbreviation": "ZAR",
                                "symbol": "&#82;"
                              },
                              {
                                "currency": "Korea (South) Won",
                                "abbreviation": "KRW",
                                "symbol": "&#8361;"
                              },
                              {
                                "currency": "Sri Lanka Rupee",
                                "abbreviation": "LKR",
                                "symbol": "&#8360;"
                              },
                              {
                                "currency": "Sweden Krona",
                                "abbreviation": "SEK",
                                "symbol": "&#107;&#114;"
                              },
                              {
                                "currency": "Switzerland Franc",
                                "abbreviation": "CHF",
                                "symbol": "&#67;&#72;&#70;"
                              },
                              {
                                "currency": "Suriname Dollar",
                                "abbreviation": "SRD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Syria Pound",
                                "abbreviation": "SYP",
                                "symbol": "&#163;"
                              },
                              {
                                "currency": "Taiwan New Dollar",
                                "abbreviation": "TWD",
                                "symbol": "&#78;&#84;&#36;"
                              },
                              {
                                "currency": "Thailand Baht",
                                "abbreviation": "THB",
                                "symbol": "&#3647;"
                              },
                              {
                                "currency": "Trinidad and Tobago Dollar",
                                "abbreviation": "TTD",
                                "symbol": "&#84;&#84;&#36;"
                              },
                              {
                                "currency": "Turkey Lira",
                                "abbreviation": "TRY",
                                "symbol": null
                              },
                              {
                                "currency": "Turkey Lira",
                                "abbreviation": "TRL",
                                "symbol": "&#8356;"
                              },
                              {
                                "currency": "Tuvalu Dollar",
                                "abbreviation": "TVD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Ukraine Hryvna",
                                "abbreviation": "UAH",
                                "symbol": "&#8372;"
                              },
                              {
                                "currency": "United Kingdom Pound",
                                "abbreviation": "GBP",
                                "symbol": "&#163;"
                              },
                              {
                                "currency": "United States Dollar",
                                "abbreviation": "USD",
                                "symbol": "&#36;"
                              },
                              {
                                "currency": "Uruguay Peso",
                                "abbreviation": "UYU",
                                "symbol": "&#36;&#85;"
                              },
                              {
                                "currency": "Uzbekistan Som",
                                "abbreviation": "UZS",
                                "symbol": "&#1083;&#1074;"
                              },
                              {
                                "currency": "Venezuela Bolivar",
                                "abbreviation": "VEF",
                                "symbol": "&#66;&#115;"
                              },
                              {
                                "currency": "Viet Nam Dong",
                                "abbreviation": "VND",
                                "symbol": "&#8363;"
                              },
                              {
                                "currency": "Yemen Rial",
                                "abbreviation": "YER",
                                "symbol": "&#65020;"
                              },
                              {
                                "currency": "Zimbabwe Dollar",
                                "abbreviation": "ZWD",
                                "symbol": "&#90;&#36;"
                              }
                            ]';
    }

    public function timezones()
    {
    	return $timezones = array (
              'Africa/Abidjan'                 => 'Africa/Abidjan',
              'Africa/Accra'                   => 'Africa/Accra',
              'Africa/Addis_Ababa'             => 'Africa/Addis_Ababa',
              'Africa/Algiers'                 => 'Africa/Algiers',
              'Africa/Asmara'                  => 'Africa/Asmara',
              'Africa/Bamako'                  => 'Africa/Bamako',
              'Africa/Bangui'                  => 'Africa/Bangui',
              'Africa/Banjul'                  => 'Africa/Banjul',
              'Africa/Bissau'                  => 'Africa/Bissau',
              'Africa/Blantyre'                => 'Africa/Blantyre',
              'Africa/Brazzaville'             => 'Africa/Brazzaville',
              'Africa/Bujumbura'               => 'Africa/Bujumbura',
              'Africa/Cairo'                   => 'Africa/Cairo',
              'Africa/Casablanca'              => 'Africa/Casablanca',
              'Africa/Ceuta'                   => 'Africa/Ceuta',
              'Africa/Conakry'                 => 'Africa/Conakry',
              'Africa/Dakar'                   => 'Africa/Dakar',
              'Africa/Dar_es_Salaam'           => 'Africa/Dar_es_Salaam',
              'Africa/Djibouti'                => 'Africa/Djibouti',
              'Africa/Douala'                  => 'Africa/Douala',
              'Africa/El_Aaiun'                => 'Africa/El_Aaiun',
              'Africa/Freetown'                => 'Africa/Freetown',
              'Africa/Gaborone'                => 'Africa/Gaborone',
              'Africa/Harare'                  => 'Africa/Harare',
              'Africa/Johannesburg'            => 'Africa/Johannesburg',
              'Africa/Juba'                    => 'Africa/Juba',
              'Africa/Kampala'                 => 'Africa/Kampala',
              'Africa/Khartoum'                => 'Africa/Khartoum',
              'Africa/Kigali'                  => 'Africa/Kigali',
              'Africa/Kinshasa'                => 'Africa/Kinshasa',
              'Africa/Lagos'                   => 'Africa/Lagos',
              'Africa/Libreville'              => 'Africa/Libreville',
              'Africa/Lome'                    => 'Africa/Lome',
              'Africa/Luanda'                  => 'Africa/Luanda',
              'Africa/Lubumbashi'              => 'Africa/Lubumbashi',
              'Africa/Lusaka'                  => 'Africa/Lusaka',
              'Africa/Malabo'                  => 'Africa/Malabo',
              'Africa/Maputo'                  => 'Africa/Maputo',
              'Africa/Maseru'                  => 'Africa/Maseru',
              'Africa/Mbabane'                 => 'Africa/Mbabane',
              'Africa/Mogadishu'               => 'Africa/Mogadishu',
              'Africa/Monrovia'                => 'Africa/Monrovia',
              'Africa/Nairobi'                 => 'Africa/Nairobi',
              'Africa/Ndjamena'                => 'Africa/Ndjamena',
              'Africa/Niamey'                  => 'Africa/Niamey',
              'Africa/Nouakchott'              => 'Africa/Nouakchott',
              'Africa/Ouagadougou'             => 'Africa/Ouagadougou',
              'Africa/Porto-Novo'              => 'Africa/Porto-Novo',
              'Africa/Sao_Tome'                => 'Africa/Sao_Tome',
              'Africa/Tripoli'                 => 'Africa/Tripoli',
              'Africa/Tunis'                   => 'Africa/Tunis',
              'Africa/Windhoek'                => 'Africa/Windhoek',
              'America/Adak'                   => 'America/Adak',
              'America/Anchorage'              => 'America/Anchorage',
              'America/Anguilla'               => 'America/Anguilla',
              'America/Antigua'                => 'America/Antigua',
              'America/Araguaina'              => 'America/Araguaina',
              'America/Argentina/Buenos_Aires' => 'America/Argentina/Buenos_Aires',
              'America/Argentina/Catamarca'    => 'America/Argentina/Catamarca',
              'America/Argentina/Cordoba'      => 'America/Argentina/Cordoba',
              'America/Argentina/Jujuy'        => 'America/Argentina/Jujuy',
              'America/Argentina/La_Rioja'     => 'America/Argentina/La_Rioja',
              'America/Argentina/Mendoza'      => 'America/Argentina/Mendoza',
              'America/Argentina/Rio_Gallegos' => 'America/Argentina/Rio_Gallegos',
              'America/Argentina/Salta'        => 'America/Argentina/Salta',
              'America/Argentina/San_Juan'     => 'America/Argentina/San_Juan',
              'America/Argentina/San_Luis'     => 'America/Argentina/San_Luis',
              'America/Argentina/Tucuman'      => 'America/Argentina/Tucuman',
              'America/Argentina/Ushuaia'      => 'America/Argentina/Ushuaia',
              'America/Aruba'                  => 'America/Aruba',
              'America/Asuncion'               => 'America/Asuncion',
              'America/Atikokan'               => 'America/Atikokan',
              'America/Bahia'                  => 'America/Bahia',
              'America/Bahia_Banderas'         => 'America/Bahia_Banderas',
              'America/Barbados'               => 'America/Barbados',
              'America/Belem'                  => 'America/Belem',
              'America/Belize'                 => 'America/Belize',
              'America/Blanc-Sablon'           => 'America/Blanc-Sablon',
              'America/Boa_Vista'              => 'America/Boa_Vista',
              'America/Bogota'                 => 'America/Bogota',
              'America/Boise'                  => 'America/Boise',
              'America/Cambridge_Bay'          => 'America/Cambridge_Bay',
              'America/Campo_Grande'           => 'America/Campo_Grande',
              'America/Cancun'                 => 'America/Cancun',
              'America/Caracas'                => 'America/Caracas',
              'America/Cayenne'                => 'America/Cayenne',
              'America/Cayman'                 => 'America/Cayman',
              'America/Chicago'                => 'America/Chicago',
              'America/Chihuahua'              => 'America/Chihuahua',
              'America/Costa_Rica'             => 'America/Costa_Rica',
              'America/Creston'                => 'America/Creston',
              'America/Cuiaba'                 => 'America/Cuiaba',
              'America/Curacao'                => 'America/Curacao',
              'America/Danmarkshavn'           => 'America/Danmarkshavn',
              'America/Dawson'                 => 'America/Dawson',
              'America/Dawson_Creek'           => 'America/Dawson_Creek',
              'America/Denver'                 => 'America/Denver',
              'America/Detroit'                => 'America/Detroit',
              'America/Dominica'               => 'America/Dominica',
              'America/Edmonton'               => 'America/Edmonton',
              'America/Eirunepe'               => 'America/Eirunepe',
              'America/El_Salvador'            => 'America/El_Salvador',
              'America/Fort_Nelson'            => 'America/Fort_Nelson',
              'America/Fortaleza'              => 'America/Fortaleza',
              'America/Glace_Bay'              => 'America/Glace_Bay',
              'America/Godthab'                => 'America/Godthab',
              'America/Goose_Bay'              => 'America/Goose_Bay',
              'America/Grand_Turk'             => 'America/Grand_Turk',
              'America/Grenada'                => 'America/Grenada',
              'America/Guadeloupe'             => 'America/Guadeloupe',
              'America/Guatemala'              => 'America/Guatemala',
              'America/Guayaquil'              => 'America/Guayaquil',
              'America/Guyana'                 => 'America/Guyana',
              'America/Halifax'                => 'America/Halifax',
              'America/Havana'                 => 'America/Havana',
              'America/Hermosillo'             => 'America/Hermosillo',
              'America/Indiana/Indianapolis'   => 'America/Indiana/Indianapolis',
              'America/Indiana/Knox'           => 'America/Indiana/Knox',
              'America/Indiana/Marengo'        => 'America/Indiana/Marengo',
              'America/Indiana/Petersburg'     => 'America/Indiana/Petersburg',
              'America/Indiana/Tell_City'      => 'America/Indiana/Tell_City',
              'America/Indiana/Vevay'          => 'America/Indiana/Vevay',
              'America/Indiana/Vincennes'      => 'America/Indiana/Vincennes',
              'America/Indiana/Winamac'        => 'America/Indiana/Winamac',
              'America/Inuvik'                 => 'America/Inuvik',
              'America/Iqaluit'                => 'America/Iqaluit',
              'America/Jamaica'                => 'America/Jamaica',
              'America/Juneau'                 => 'America/Juneau',
              'America/Kentucky/Louisville'    => 'America/Kentucky/Louisville',
              'America/Kentucky/Monticello'    => 'America/Kentucky/Monticello',
              'America/Kralendijk'             => 'America/Kralendijk',
              'America/La_Paz'                 => 'America/La_Paz',
              'America/Lima'                   => 'America/Lima',
              'America/Los_Angeles'            => 'America/Los_Angeles',
              'America/Lower_Princes'          => 'America/Lower_Princes',
              'America/Maceio'                 => 'America/Maceio',
              'America/Managua'                => 'America/Managua',
              'America/Manaus'                 => 'America/Manaus',
              'America/Marigot'                => 'America/Marigot',
              'America/Martinique'             => 'America/Martinique',
              'America/Matamoros'              => 'America/Matamoros',
              'America/Mazatlan'               => 'America/Mazatlan',
              'America/Menominee'              => 'America/Menominee',
              'America/Merida'                 => 'America/Merida',
              'America/Metlakatla'             => 'America/Metlakatla',
              'America/Mexico_City'            => 'America/Mexico_City',
              'America/Miquelon'               => 'America/Miquelon',
              'America/Moncton'                => 'America/Moncton',
              'America/Monterrey'              => 'America/Monterrey',
              'America/Montevideo'             => 'America/Montevideo',
              'America/Montserrat'             => 'America/Montserrat',
              'America/Nassau'                 => 'America/Nassau',
              'America/New_York'               => 'America/New_York',
              'America/Nipigon'                => 'America/Nipigon',
              'America/Nome'                   => 'America/Nome',
              'America/Noronha'                => 'America/Noronha',
              'America/North_Dakota/Beulah'    => 'America/North_Dakota/Beulah',
              'America/North_Dakota/Center'    => 'America/North_Dakota/Center',
              'America/North_Dakota/New_Salem' => 'America/North_Dakota/New_Salem',
              'America/Ojinaga'                => 'America/Ojinaga',
              'America/Panama'                 => 'America/Panama',
              'America/Pangnirtung'            => 'America/Pangnirtung',
              'America/Paramaribo'             => 'America/Paramaribo',
              'America/Phoenix'                => 'America/Phoenix',
              'America/Port-au-Prince'         => 'America/Port-au-Prince',
              'America/Port_of_Spain'          => 'America/Port_of_Spain',
              'America/Porto_Velho'            => 'America/Porto_Velho',
              'America/Puerto_Rico'            => 'America/Puerto_Rico',
              'America/Punta_Arenas'           => 'America/Punta_Arenas',
              'America/Rainy_River'            => 'America/Rainy_River',
              'America/Rankin_Inlet'           => 'America/Rankin_Inlet',
              'America/Recife'                 => 'America/Recife',
              'America/Regina'                 => 'America/Regina',
              'America/Resolute'               => 'America/Resolute',
              'America/Rio_Branco'             => 'America/Rio_Branco',
              'America/Santarem'               => 'America/Santarem',
              'America/Santiago'               => 'America/Santiago',
              'America/Santo_Domingo'          => 'America/Santo_Domingo',
              'America/Sao_Paulo'              => 'America/Sao_Paulo',
              'America/Scoresbysund'           => 'America/Scoresbysund',
              'America/Sitka'                  => 'America/Sitka',
              'America/St_Barthelemy'          => 'America/St_Barthelemy',
              'America/St_Johns'               => 'America/St_Johns',
              'America/St_Kitts'               => 'America/St_Kitts',
              'America/St_Lucia'               => 'America/St_Lucia',
              'America/St_Thomas'              => 'America/St_Thomas',
              'America/St_Vincent'             => 'America/St_Vincent',
              'America/Swift_Current'          => 'America/Swift_Current',
              'America/Tegucigalpa'            => 'America/Tegucigalpa',
              'America/Thule'                  => 'America/Thule',
              'America/Thunder_Bay'            => 'America/Thunder_Bay',
              'America/Tijuana'                => 'America/Tijuana',
              'America/Toronto'                => 'America/Toronto',
              'America/Tortola'                => 'America/Tortola',
              'America/Vancouver'              => 'America/Vancouver',
              'America/Whitehorse'             => 'America/Whitehorse',
              'America/Winnipeg'               => 'America/Winnipeg',
              'America/Yakutat'                => 'America/Yakutat',
              'America/Yellowknife'            => 'America/Yellowknife',
              'Antarctica/Casey'               => 'Antarctica/Casey',
              'Antarctica/Davis'               => 'Antarctica/Davis',
              'Antarctica/DumontDUrville'      => 'Antarctica/DumontDUrville',
              'Antarctica/Macquarie'           => 'Antarctica/Macquarie',
              'Antarctica/Mawson'              => 'Antarctica/Mawson',
              'Antarctica/McMurdo'             => 'Antarctica/McMurdo',
              'Antarctica/Palmer'              => 'Antarctica/Palmer',
              'Antarctica/Rothera'             => 'Antarctica/Rothera',
              'Antarctica/Syowa'               => 'Antarctica/Syowa',
              'Antarctica/Troll'               => 'Antarctica/Troll',
              'Antarctica/Vostok'              => 'Antarctica/Vostok',
              'Arctic/Longyearbyen'            => 'Arctic/Longyearbyen',
              'Asia/Aden'                      => 'Asia/Aden',
              'Asia/Almaty'                    => 'Asia/Almaty',
              'Asia/Amman'                     => 'Asia/Amman',
              'Asia/Anadyr'                    => 'Asia/Anadyr',
              'Asia/Aqtau'                     => 'Asia/Aqtau',
              'Asia/Aqtobe'                    => 'Asia/Aqtobe',
              'Asia/Ashgabat'                  => 'Asia/Ashgabat',
              'Asia/Atyrau'                    => 'Asia/Atyrau',
              'Asia/Baghdad'                   => 'Asia/Baghdad',
              'Asia/Bahrain'                   => 'Asia/Bahrain',
              'Asia/Baku'                      => 'Asia/Baku',
              'Asia/Bangkok'                   => 'Asia/Bangkok',
              'Asia/Barnaul'                   => 'Asia/Barnaul',
              'Asia/Beirut'                    => 'Asia/Beirut',
              'Asia/Bishkek'                   => 'Asia/Bishkek',
              'Asia/Brunei'                    => 'Asia/Brunei',
              'Asia/Chita'                     => 'Asia/Chita',
              'Asia/Choibalsan'                => 'Asia/Choibalsan',
              'Asia/Colombo'                   => 'Asia/Colombo',
              'Asia/Damascus'                  => 'Asia/Damascus',
              'Asia/Dhaka'                     => 'Asia/Dhaka',
              'Asia/Dili'                      => 'Asia/Dili',
              'Asia/Dubai'                     => 'Asia/Dubai',
              'Asia/Dushanbe'                  => 'Asia/Dushanbe',
              'Asia/Famagusta'                 => 'Asia/Famagusta',
              'Asia/Gaza'                      => 'Asia/Gaza',
              'Asia/Hebron'                    => 'Asia/Hebron',
              'Asia/Ho_Chi_Minh'               => 'Asia/Ho_Chi_Minh',
              'Asia/Hong_Kong'                 => 'Asia/Hong_Kong',
              'Asia/Hovd'                      => 'Asia/Hovd',
              'Asia/Irkutsk'                   => 'Asia/Irkutsk',
              'Asia/Jakarta'                   => 'Asia/Jakarta',
              'Asia/Jayapura'                  => 'Asia/Jayapura',
              'Asia/Jerusalem'                 => 'Asia/Jerusalem',
              'Asia/Kabul'                     => 'Asia/Kabul',
              'Asia/Kamchatka'                 => 'Asia/Kamchatka',
              'Asia/Karachi'                   => 'Asia/Karachi',
              'Asia/Kathmandu'                 => 'Asia/Kathmandu',
              'Asia/Khandyga'                  => 'Asia/Khandyga',
              'Asia/Kolkata'                   => 'Asia/Kolkata',
              'Asia/Krasnoyarsk'               => 'Asia/Krasnoyarsk',
              'Asia/Kuala_Lumpur'              => 'Asia/Kuala_Lumpur',
              'Asia/Kuching'                   => 'Asia/Kuching',
              'Asia/Kuwait'                    => 'Asia/Kuwait',
              'Asia/Macau'                     => 'Asia/Macau',
              'Asia/Magadan'                   => 'Asia/Magadan',
              'Asia/Makassar'                  => 'Asia/Makassar',
              'Asia/Manila'                    => 'Asia/Manila',
              'Asia/Muscat'                    => 'Asia/Muscat',
              'Asia/Nicosia'                   => 'Asia/Nicosia',
              'Asia/Novokuznetsk'              => 'Asia/Novokuznetsk',
              'Asia/Novosibirsk'               => 'Asia/Novosibirsk',
              'Asia/Omsk'                      => 'Asia/Omsk',
              'Asia/Oral'                      => 'Asia/Oral',
              'Asia/Phnom_Penh'                => 'Asia/Phnom_Penh',
              'Asia/Pontianak'                 => 'Asia/Pontianak',
              'Asia/Pyongyang'                 => 'Asia/Pyongyang',
              'Asia/Qatar'                     => 'Asia/Qatar',
              'Asia/Qostanay'                  => 'Asia/Qostanay',
              'Asia/Qyzylorda'                 => 'Asia/Qyzylorda',
              'Asia/Riyadh'                    => 'Asia/Riyadh',
              'Asia/Sakhalin'                  => 'Asia/Sakhalin',
              'Asia/Samarkand'                 => 'Asia/Samarkand',
              'Asia/Seoul'                     => 'Asia/Seoul',
              'Asia/Shanghai'                  => 'Asia/Shanghai',
              'Asia/Singapore'                 => 'Asia/Singapore',
              'Asia/Srednekolymsk'             => 'Asia/Srednekolymsk',
              'Asia/Taipei'                    => 'Asia/Taipei',
              'Asia/Tashkent'                  => 'Asia/Tashkent',
              'Asia/Tbilisi'                   => 'Asia/Tbilisi',
              'Asia/Tehran'                    => 'Asia/Tehran',
              'Asia/Thimphu'                   => 'Asia/Thimphu',
              'Asia/Tokyo'                     => 'Asia/Tokyo',
              'Asia/Tomsk'                     => 'Asia/Tomsk',
              'Asia/Ulaanbaatar'               => 'Asia/Ulaanbaatar',
              'Asia/Urumqi'                    => 'Asia/Urumqi',
              'Asia/Ust-Nera'                  => 'Asia/Ust-Nera',
              'Asia/Vientiane'                 => 'Asia/Vientiane',
              'Asia/Vladivostok'               => 'Asia/Vladivostok',
              'Asia/Yakutsk'                   => 'Asia/Yakutsk',
              'Asia/Yangon'                    => 'Asia/Yangon',
              'Asia/Yekaterinburg'             => 'Asia/Yekaterinburg',
              'Asia/Yerevan'                   => 'Asia/Yerevan',
              'Atlantic/Azores'                => 'Atlantic/Azores',
              'Atlantic/Bermuda'               => 'Atlantic/Bermuda',
              'Atlantic/Canary'                => 'Atlantic/Canary',
              'Atlantic/Cape_Verde'            => 'Atlantic/Cape_Verde',
              'Atlantic/Faroe'                 => 'Atlantic/Faroe',
              'Atlantic/Madeira'               => 'Atlantic/Madeira',
              'Atlantic/Reykjavik'             => 'Atlantic/Reykjavik',
              'Atlantic/South_Georgia'         => 'Atlantic/South_Georgia',
              'Atlantic/St_Helena'             => 'Atlantic/St_Helena',
              'Atlantic/Stanley'               => 'Atlantic/Stanley',
              'Australia/Adelaide'             => 'Australia/Adelaide',
              'Australia/Brisbane'             => 'Australia/Brisbane',
              'Australia/Broken_Hill'          => 'Australia/Broken_Hill',
              'Australia/Currie'               => 'Australia/Currie',
              'Australia/Darwin'               => 'Australia/Darwin',
              'Australia/Eucla'                => 'Australia/Eucla',
              'Australia/Hobart'               => 'Australia/Hobart',
              'Australia/Lindeman'             => 'Australia/Lindeman',
              'Australia/Lord_Howe'            => 'Australia/Lord_Howe',
              'Australia/Melbourne'            => 'Australia/Melbourne',
              'Australia/Perth'                => 'Australia/Perth',
              'Australia/Sydney'               => 'Australia/Sydney',
              'Europe/Amsterdam'               => 'Europe/Amsterdam',
              'Europe/Andorra'                 => 'Europe/Andorra',
              'Europe/Astrakhan'               => 'Europe/Astrakhan',
              'Europe/Athens'                  => 'Europe/Athens',
              'Europe/Belgrade'                => 'Europe/Belgrade',
              'Europe/Berlin'                  => 'Europe/Berlin',
              'Europe/Bratislava'              => 'Europe/Bratislava',
              'Europe/Brussels'                => 'Europe/Brussels',
              'Europe/Bucharest'               => 'Europe/Bucharest',
              'Europe/Budapest'                => 'Europe/Budapest',
              'Europe/Busingen'                => 'Europe/Busingen',
              'Europe/Chisinau'                => 'Europe/Chisinau',
              'Europe/Copenhagen'              => 'Europe/Copenhagen',
              'Europe/Dublin'                  => 'Europe/Dublin',
              'Europe/Gibraltar'               => 'Europe/Gibraltar',
              'Europe/Guernsey'                => 'Europe/Guernsey',
              'Europe/Helsinki'                => 'Europe/Helsinki',
              'Europe/Isle_of_Man'             => 'Europe/Isle_of_Man',
              'Europe/Istanbul'                => 'Europe/Istanbul',
              'Europe/Jersey'                  => 'Europe/Jersey',
              'Europe/Kaliningrad'             => 'Europe/Kaliningrad',
              'Europe/Kiev'                    => 'Europe/Kiev',
              'Europe/Kirov'                   => 'Europe/Kirov',
              'Europe/Lisbon'                  => 'Europe/Lisbon',
              'Europe/Ljubljana'               => 'Europe/Ljubljana',
              'Europe/London'                  => 'Europe/London',
              'Europe/Luxembourg'              => 'Europe/Luxembourg',
              'Europe/Madrid'                  => 'Europe/Madrid',
              'Europe/Malta'                   => 'Europe/Malta',
              'Europe/Mariehamn'               => 'Europe/Mariehamn',
              'Europe/Minsk'                   => 'Europe/Minsk',
              'Europe/Monaco'                  => 'Europe/Monaco',
              'Europe/Moscow'                  => 'Europe/Moscow',
              'Europe/Oslo'                    => 'Europe/Oslo',
              'Europe/Paris'                   => 'Europe/Paris',
              'Europe/Podgorica'               => 'Europe/Podgorica',
              'Europe/Prague'                  => 'Europe/Prague',
              'Europe/Riga'                    => 'Europe/Riga',
              'Europe/Rome'                    => 'Europe/Rome',
              'Europe/Samara'                  => 'Europe/Samara',
              'Europe/San_Marino'              => 'Europe/San_Marino',
              'Europe/Sarajevo'                => 'Europe/Sarajevo',
              'Europe/Saratov'                 => 'Europe/Saratov',
              'Europe/Simferopol'              => 'Europe/Simferopol',
              'Europe/Skopje'                  => 'Europe/Skopje',
              'Europe/Sofia'                   => 'Europe/Sofia',
              'Europe/Stockholm'               => 'Europe/Stockholm',
              'Europe/Tallinn'                 => 'Europe/Tallinn',
              'Europe/Tirane'                  => 'Europe/Tirane',
              'Europe/Ulyanovsk'               => 'Europe/Ulyanovsk',
              'Europe/Uzhgorod'                => 'Europe/Uzhgorod',
              'Europe/Vaduz'                   => 'Europe/Vaduz',
              'Europe/Vatican'                 => 'Europe/Vatican',
              'Europe/Vienna'                  => 'Europe/Vienna',
              'Europe/Vilnius'                 => 'Europe/Vilnius',
              'Europe/Volgograd'               => 'Europe/Volgograd',
              'Europe/Warsaw'                  => 'Europe/Warsaw',
              'Europe/Zagreb'                  => 'Europe/Zagreb',
              'Europe/Zaporozhye'              => 'Europe/Zaporozhye',
              'Europe/Zurich'                  => 'Europe/Zurich',
              'Indian/Antananarivo'            => 'Indian/Antananarivo',
              'Indian/Chagos'                  => 'Indian/Chagos',
              'Indian/Christmas'               => 'Indian/Christmas',
              'Indian/Cocos'                   => 'Indian/Cocos',
              'Indian/Comoro'                  => 'Indian/Comoro',
              'Indian/Kerguelen'               => 'Indian/Kerguelen',
              'Indian/Mahe'                    => 'Indian/Mahe',
              'Indian/Maldives'                => 'Indian/Maldives',
              'Indian/Mauritius'               => 'Indian/Mauritius',
              'Indian/Mayotte'                 => 'Indian/Mayotte',
              'Indian/Reunion'                 => 'Indian/Reunion',
              'Pacific/Apia'                   => 'Pacific/Apia',
              'Pacific/Auckland'               => 'Pacific/Auckland',
              'Pacific/Bougainville'           => 'Pacific/Bougainville',
              'Pacific/Chatham'                => 'Pacific/Chatham',
              'Pacific/Chuuk'                  => 'Pacific/Chuuk',
              'Pacific/Easter'                 => 'Pacific/Easter',
              'Pacific/Efate'                  => 'Pacific/Efate',
              'Pacific/Enderbury'              => 'Pacific/Enderbury',
              'Pacific/Fakaofo'                => 'Pacific/Fakaofo',
              'Pacific/Fiji'                   => 'Pacific/Fiji',
              'Pacific/Funafuti'               => 'Pacific/Funafuti',
              'Pacific/Galapagos'              => 'Pacific/Galapagos',
              'Pacific/Gambier'                => 'Pacific/Gambier',
              'Pacific/Guadalcanal'            => 'Pacific/Guadalcanal',
              'Pacific/Guam'                   => 'Pacific/Guam',
              'Pacific/Honolulu'               => 'Pacific/Honolulu',
              'Pacific/Kiritimati'             => 'Pacific/Kiritimati',
              'Pacific/Kosrae'                 => 'Pacific/Kosrae',
              'Pacific/Kwajalein'              => 'Pacific/Kwajalein',
              'Pacific/Majuro'                 => 'Pacific/Majuro',
              'Pacific/Marquesas'              => 'Pacific/Marquesas',
              'Pacific/Midway'                 => 'Pacific/Midway',
              'Pacific/Nauru'                  => 'Pacific/Nauru',
              'Pacific/Niue'                   => 'Pacific/Niue',
              'Pacific/Norfolk'                => 'Pacific/Norfolk',
              'Pacific/Noumea'                 => 'Pacific/Noumea',
              'Pacific/Pago_Pago'              => 'Pacific/Pago_Pago',
              'Pacific/Palau'                  => 'Pacific/Palau',
              'Pacific/Pitcairn'               => 'Pacific/Pitcairn',
              'Pacific/Pohnpei'                => 'Pacific/Pohnpei',
              'Pacific/Port_Moresby'           => 'Pacific/Port_Moresby',
              'Pacific/Rarotonga'              => 'Pacific/Rarotonga',
              'Pacific/Saipan'                 => 'Pacific/Saipan',
              'Pacific/Tahiti'                 => 'Pacific/Tahiti',
              'Pacific/Tarawa'                 => 'Pacific/Tarawa',
              'Pacific/Tongatapu'              => 'Pacific/Tongatapu',
              'Pacific/Wake'                   => 'Pacific/Wake',
              'Pacific/Wallis'                 => 'Pacific/Wallis',
              'UTC'                            => 'UTC'
              );
    }

    public function countries()
    {
      return $countries = [
                            "AF" => "Afghanistan",
                            "AL" => "Albania",
                            "DZ" => "Algeria",
                            "AS" => "American Samoa",
                            "AD" => "Andorra",
                            "AO" => "Angola",
                            "AI" => "Anguilla",
                            "AQ" => "Antarctica",
                            "AG" => "Antigua &amp; Barbuda",
                            "AR" => "Argentina",
                            "AM" => "Armenia",
                            "AW" => "Aruba",
                            "AC" => "Ascension Island",
                            "AU" => "Australia",
                            "AT" => "Austria",
                            "AZ" => "Azerbaijan",
                            "BS" => "Bahamas",
                            "BH" => "Bahrain",
                            "BD" => "Bangladesh",
                            "BB" => "Barbados",
                            "BY" => "Belarus",
                            "BE" => "Belgium",
                            "BZ" => "Belize",
                            "BJ" => "Benin",
                            "BM" => "Bermuda",
                            "BT" => "Bhutan",
                            "BO" => "Bolivia",
                            "BA" => "Bosnia &amp; Herzegovina",
                            "BW" => "Botswana",
                            "BR" => "Brazil",
                            "IO" => "British Indian Ocean Territory",
                            "VG" => "British Virgin Islands",
                            "BN" => "Brunei",
                            "BG" => "Bulgaria",
                            "BF" => "Burkina Faso",
                            "BI" => "Burundi",
                            "KH" => "Cambodia",
                            "CM" => "Cameroon",
                            "CA" => "Canada",
                            "IC" => "Canary Islands",
                            "CV" => "Cape Verde",
                            "BQ" => "Caribbean Netherlands",
                            "KY" => "Cayman Islands",
                            "CF" => "Central African Republic",
                            "EA" => "Ceuta &amp; Melilla",
                            "TD" => "Chad",
                            "CL" => "Chile",
                            "CN" => "China",
                            "CX" => "Christmas Island",
                            "CC" => "Cocos (Keeling) Islands",
                            "CO" => "Colombia",
                            "KM" => "Comoros",
                            "CG" => "Congo - Brazzaville",
                            "CD" => "Congo - Kinshasa",
                            "CK" => "Cook Islands",
                            "CR" => "Costa Rica",
                            "HR" => "Croatia",
                            "CU" => "Cuba",
                            "CW" => "Curaçao",
                            "CY" => "Cyprus",
                            "CZ" => "Czechia",
                            "CI" => "Côte d’Ivoire",
                            "DK" => "Denmark",
                            "DG" => "Diego Garcia",
                            "DJ" => "Djibouti",
                            "DM" => "Dominica",
                            "DO" => "Dominican Republic",
                            "EC" => "Ecuador",
                            "EG" => "Egypt",
                            "SV" => "El Salvador",
                            "GQ" => "Equatorial Guinea",
                            "ER" => "Eritrea",
                            "EE" => "Estonia",
                            "ET" => "Ethiopia",
                            "EZ" => "Eurozone",
                            "FK" => "Falkland Islands",
                            "FO" => "Faroe Islands",
                            "FJ" => "Fiji",
                            "FI" => "Finland",
                            "FR" => "France",
                            "GF" => "French Guiana",
                            "PF" => "French Polynesia",
                            "TF" => "French Southern Territories",
                            "GA" => "Gabon",
                            "GM" => "Gambia",
                            "GE" => "Georgia",
                            "DE" => "Germany",
                            "GH" => "Ghana",
                            "GI" => "Gibraltar",
                            "GR" => "Greece",
                            "GL" => "Greenland",
                            "GD" => "Grenada",
                            "GP" => "Guadeloupe",
                            "GU" => "Guam",
                            "GT" => "Guatemala",
                            "GG" => "Guernsey",
                            "GN" => "Guinea",
                            "GW" => "Guinea-Bissau",
                            "GY" => "Guyana",
                            "HT" => "Haiti",
                            "HN" => "Honduras",
                            "HK" => "Hong Kong SAR China",
                            "HU" => "Hungary",
                            "IS" => "Iceland",
                            "IN" => "India",
                            "ID" => "Indonesia",
                            "IR" => "Iran",
                            "IQ" => "Iraq",
                            "IE" => "Ireland",
                            "IM" => "Isle of Man",
                            "IL" => "Israel",
                            "IT" => "Italy",
                            "JM" => "Jamaica",
                            "JP" => "Japan",
                            "JE" => "Jersey",
                            "JO" => "Jordan",
                            "KZ" => "Kazakhstan",
                            "KE" => "Kenya",
                            "KI" => "Kiribati",
                            "XK" => "Kosovo",
                            "KW" => "Kuwait",
                            "KG" => "Kyrgyzstan",
                            "LA" => "Laos",
                            "LV" => "Latvia",
                            "LB" => "Lebanon",
                            "LS" => "Lesotho",
                            "LR" => "Liberia",
                            "LY" => "Libya",
                            "LI" => "Liechtenstein",
                            "LT" => "Lithuania",
                            "LU" => "Luxembourg",
                            "MO" => "Macau SAR China",
                            "MK" => "Macedonia",
                            "MG" => "Madagascar",
                            "MW" => "Malawi",
                            "MY" => "Malaysia",
                            "MV" => "Maldives",
                            "ML" => "Mali",
                            "MT" => "Malta",
                            "MH" => "Marshall Islands",
                            "MQ" => "Martinique",
                            "MR" => "Mauritania",
                            "MU" => "Mauritius",
                            "YT" => "Mayotte",
                            "MX" => "Mexico",
                            "FM" => "Micronesia",
                            "MD" => "Moldova",
                            "MC" => "Monaco",
                            "MN" => "Mongolia",
                            "ME" => "Montenegro",
                            "MS" => "Montserrat",
                            "MA" => "Morocco",
                            "MZ" => "Mozambique",
                            "MM" => "Myanmar (Burma)",
                            "NA" => "Namibia",
                            "NR" => "Nauru",
                            "NP" => "Nepal",
                            "NL" => "Netherlands",
                            "NC" => "New Caledonia",
                            "NZ" => "New Zealand",
                            "NI" => "Nicaragua",
                            "NE" => "Niger",
                            "NG" => "Nigeria",
                            "NU" => "Niue",
                            "NF" => "Norfolk Island",
                            "KP" => "North Korea",
                            "MP" => "Northern Mariana Islands",
                            "NO" => "Norway",
                            "OM" => "Oman",
                            "PK" => "Pakistan",
                            "PW" => "Palau",
                            "PS" => "Palestinian Territories",
                            "PA" => "Panama",
                            "PG" => "Papua New Guinea",
                            "PY" => "Paraguay",
                            "PE" => "Peru",
                            "PH" => "Philippines",
                            "PN" => "Pitcairn Islands",
                            "PL" => "Poland",
                            "PT" => "Portugal",
                            "PR" => "Puerto Rico",
                            "QA" => "Qatar",
                            "RO" => "Romania",
                            "RU" => "Russia",
                            "RW" => "Rwanda",
                            "RE" => "Réunion",
                            "WS" => "Samoa",
                            "SM" => "San Marino",
                            "SA" => "Saudi Arabia",
                            "SN" => "Senegal",
                            "RS" => "Serbia",
                            "SC" => "Seychelles",
                            "SL" => "Sierra Leone",
                            "SG" => "Singapore",
                            "SX" => "Sint Maarten",
                            "SK" => "Slovakia",
                            "SI" => "Slovenia",
                            "SB" => "Solomon Islands",
                            "SO" => "Somalia",
                            "ZA" => "South Africa",
                            "GS" => "South Georgia &amp; South Sandwich Islands",
                            "KR" => "South Korea",
                            "SS" => "South Sudan",
                            "ES" => "Spain",
                            "LK" => "Sri Lanka",
                            "BL" => "St. Barthélemy",
                            "SH" => "St. Helena",
                            "KN" => "St. Kitts &amp; Nevis",
                            "LC" => "St. Lucia",
                            "MF" => "St. Martin",
                            "PM" => "St. Pierre &amp; Miquelon",
                            "VC" => "St. Vincent &amp; Grenadines",
                            "SD" => "Sudan",
                            "SR" => "Suriname",
                            "SJ" => "Svalbard &amp; Jan Mayen",
                            "SZ" => "Swaziland",
                            "SE" => "Sweden",
                            "CH" => "Switzerland",
                            "SY" => "Syria",
                            "ST" => "São Tomé &amp; Príncipe",
                            "TW" => "Taiwan",
                            "TJ" => "Tajikistan",
                            "TZ" => "Tanzania",
                            "TH" => "Thailand",
                            "TL" => "Timor-Leste",
                            "TG" => "Togo",
                            "TK" => "Tokelau",
                            "TO" => "Tonga",
                            "TT" => "Trinidad &amp; Tobago",
                            "TA" => "Tristan da Cunha",
                            "TN" => "Tunisia",
                            "TR" => "Turkey",
                            "TM" => "Turkmenistan",
                            "TC" => "Turks &amp; Caicos Islands",
                            "TV" => "Tuvalu",
                            "UM" => "U.S. Outlying Islands",
                            "VI" => "U.S. Virgin Islands",
                            "UG" => "Uganda",
                            "UA" => "Ukraine",
                            "AE" => "United Arab Emirates",
                            "GB" => "United Kingdom",
                            "UN" => "United Nations",
                            "US" => "United States",
                            "UY" => "Uruguay",
                            "UZ" => "Uzbekistan",
                            "VU" => "Vanuatu",
                            "VA" => "Vatican City",
                            "VE" => "Venezuela",
                            "VN" => "Vietnam",
                            "WF" => "Wallis &amp; Futuna",
                            "EH" => "Western Sahara",
                            "YE" => "Yemen",
                            "ZM" => "Zambia",
                            "ZW" => "Zimbabwe",
                            "AX" => "Åland Islands"
                          ];
    }
}