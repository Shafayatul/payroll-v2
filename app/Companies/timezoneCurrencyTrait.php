<?php

namespace App\Companies;

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
              '(UTC-11:00) Midway Island' => 'Pacific/Midway',
              '(UTC-11:00) Samoa' => 'Pacific/Samoa',
              '(UTC-10:00) Hawaii' => 'Pacific/Honolulu',
              '(UTC-09:00) Alaska' => 'US/Alaska',
              '(UTC-08:00) Pacific Time (US &amp; Canada)' => 'America/Los_Angeles',
              '(UTC-08:00) Tijuana' => 'America/Tijuana',
              '(UTC-07:00) Arizona' => 'US/Arizona',
              '(UTC-07:00) Chihuahua' => 'America/Chihuahua',
              '(UTC-07:00) La Paz' => 'America/Chihuahua',
              '(UTC-07:00) Mazatlan' => 'America/Mazatlan',
              '(UTC-07:00) Mountain Time (US &amp; Canada)' => 'US/Mountain',
              '(UTC-06:00) Central America' => 'America/Managua',
              '(UTC-06:00) Central Time (US &amp; Canada)' => 'US/Central',
              '(UTC-06:00) Guadalajara' => 'America/Mexico_City',
              '(UTC-06:00) Mexico City' => 'America/Mexico_City',
              '(UTC-06:00) Monterrey' => 'America/Monterrey',
              '(UTC-06:00) Saskatchewan' => 'Canada/Saskatchewan',
              '(UTC-05:00) Bogota' => 'America/Bogota',
              '(UTC-05:00) Eastern Time (US &amp; Canada)' => 'US/Eastern',
              '(UTC-05:00) Indiana (East)' => 'US/East-Indiana',
              '(UTC-05:00) Lima' => 'America/Lima',
              '(UTC-05:00) Quito' => 'America/Bogota',
              '(UTC-04:00) Atlantic Time (Canada)' => 'Canada/Atlantic',
              '(UTC-04:30) Caracas' => 'America/Caracas',
              '(UTC-04:00) La Paz' => 'America/La_Paz',
              '(UTC-04:00) Santiago' => 'America/Santiago',
              '(UTC-03:30) Newfoundland' => 'Canada/Newfoundland',
              '(UTC-03:00) Brasilia' => 'America/Sao_Paulo',
              '(UTC-03:00) Buenos Aires' => 'America/Argentina/Buenos_Aires',
              '(UTC-03:00) Georgetown' => 'America/Argentina/Buenos_Aires',
              '(UTC-03:00) Greenland' => 'America/Godthab',
              '(UTC-02:00) Mid-Atlantic' => 'America/Noronha',
              '(UTC-01:00) Azores' => 'Atlantic/Azores',
              '(UTC-01:00) Cape Verde Is.' => 'Atlantic/Cape_Verde',
              '(UTC+00:00) Casablanca' => 'Africa/Casablanca',
              '(UTC+00:00) Edinburgh' => 'Europe/London',
              '(UTC+00:00) Greenwich Mean Time : Dublin' => 'Etc/Greenwich',
              '(UTC+00:00) Lisbon' => 'Europe/Lisbon',
              '(UTC+00:00) London' => 'Europe/London',
              '(UTC+00:00) Monrovia' => 'Africa/Monrovia',
              '(UTC+00:00) UTC' => 'UTC',
              '(UTC+01:00) Amsterdam' => 'Europe/Amsterdam',
              '(UTC+01:00) Belgrade' => 'Europe/Belgrade',
              '(UTC+01:00) Berlin' => 'Europe/Berlin',
              '(UTC+01:00) Bern' => 'Europe/Berlin',
              '(UTC+01:00) Bratislava' => 'Europe/Bratislava',
              '(UTC+01:00) Brussels' => 'Europe/Brussels',
              '(UTC+01:00) Budapest' => 'Europe/Budapest',
              '(UTC+01:00) Copenhagen' => 'Europe/Copenhagen',
              '(UTC+01:00) Ljubljana' => 'Europe/Ljubljana',
              '(UTC+01:00) Madrid' => 'Europe/Madrid',
              '(UTC+01:00) Paris' => 'Europe/Paris',
              '(UTC+01:00) Prague' => 'Europe/Prague',
              '(UTC+01:00) Rome' => 'Europe/Rome',
              '(UTC+01:00) Sarajevo' => 'Europe/Sarajevo',
              '(UTC+01:00) Skopje' => 'Europe/Skopje',
              '(UTC+01:00) Stockholm' => 'Europe/Stockholm',
              '(UTC+01:00) Vienna' => 'Europe/Vienna',
              '(UTC+01:00) Warsaw' => 'Europe/Warsaw',
              '(UTC+01:00) West Central Africa' => 'Africa/Lagos',
              '(UTC+01:00) Zagreb' => 'Europe/Zagreb',
              '(UTC+02:00) Athens' => 'Europe/Athens',
              '(UTC+02:00) Bucharest' => 'Europe/Bucharest',
              '(UTC+02:00) Cairo' => 'Africa/Cairo',
              '(UTC+02:00) Harare' => 'Africa/Harare',
              '(UTC+02:00) Helsinki' => 'Europe/Helsinki',
              '(UTC+02:00) Istanbul' => 'Europe/Istanbul',
              '(UTC+02:00) Jerusalem' => 'Asia/Jerusalem',
              '(UTC+02:00) Kyiv' => 'Europe/Helsinki',
              '(UTC+02:00) Pretoria' => 'Africa/Johannesburg',
              '(UTC+02:00) Riga' => 'Europe/Riga',
              '(UTC+02:00) Sofia' => 'Europe/Sofia',
              '(UTC+02:00) Tallinn' => 'Europe/Tallinn',
              '(UTC+02:00) Vilnius' => 'Europe/Vilnius',
              '(UTC+03:00) Baghdad' => 'Asia/Baghdad',
              '(UTC+03:00) Kuwait' => 'Asia/Kuwait',
              '(UTC+03:00) Minsk' => 'Europe/Minsk',
              '(UTC+03:00) Nairobi' => 'Africa/Nairobi',
              '(UTC+03:00) Riyadh' => 'Asia/Riyadh',
              '(UTC+03:00) Volgograd' => 'Europe/Volgograd',
              '(UTC+03:30) Tehran' => 'Asia/Tehran',
              '(UTC+04:00) Abu Dhabi' => 'Asia/Muscat',
              '(UTC+04:00) Baku' => 'Asia/Baku',
              '(UTC+04:00) Moscow' => 'Europe/Moscow',
              '(UTC+04:00) Muscat' => 'Asia/Muscat',
              '(UTC+04:00) St. Petersburg' => 'Europe/Moscow',
              '(UTC+04:00) Tbilisi' => 'Asia/Tbilisi',
              '(UTC+04:00) Yerevan' => 'Asia/Yerevan',
              '(UTC+04:30) Kabul' => 'Asia/Kabul',
              '(UTC+05:00) Islamabad' => 'Asia/Karachi',
              '(UTC+05:00) Karachi' => 'Asia/Karachi',
              '(UTC+05:00) Tashkent' => 'Asia/Tashkent',
              '(UTC+05:30) Chennai' => 'Asia/Calcutta',
              '(UTC+05:30) Kolkata' => 'Asia/Kolkata',
              '(UTC+05:30) Mumbai' => 'Asia/Calcutta',
              '(UTC+05:30) New Delhi' => 'Asia/Calcutta',
              '(UTC+05:30) Sri Jayawardenepura' => 'Asia/Calcutta',
              '(UTC+05:45) Kathmandu' => 'Asia/Katmandu',
              '(UTC+06:00) Almaty' => 'Asia/Almaty',
              '(UTC+06:00) Astana' => 'Asia/Dhaka',
              '(UTC+06:00) Dhaka' => 'Asia/Dhaka',
              '(UTC+06:00) Ekaterinburg' => 'Asia/Yekaterinburg',
              '(UTC+06:30) Rangoon' => 'Asia/Rangoon',
              '(UTC+07:00) Bangkok' => 'Asia/Bangkok',
              '(UTC+07:00) Hanoi' => 'Asia/Bangkok',
              '(UTC+07:00) Jakarta' => 'Asia/Jakarta',
              '(UTC+07:00) Novosibirsk' => 'Asia/Novosibirsk',
              '(UTC+08:00) Beijing' => 'Asia/Hong_Kong',
              '(UTC+08:00) Chongqing' => 'Asia/Chongqing',
              '(UTC+08:00) Hong Kong' => 'Asia/Hong_Kong',
              '(UTC+08:00) Krasnoyarsk' => 'Asia/Krasnoyarsk',
              '(UTC+08:00) Kuala Lumpur' => 'Asia/Kuala_Lumpur',
              '(UTC+08:00) Perth' => 'Australia/Perth',
              '(UTC+08:00) Singapore' => 'Asia/Singapore',
              '(UTC+08:00) Taipei' => 'Asia/Taipei',
              '(UTC+08:00) Ulaan Bataar' => 'Asia/Ulan_Bator',
              '(UTC+08:00) Urumqi' => 'Asia/Urumqi',
              '(UTC+09:00) Irkutsk' => 'Asia/Irkutsk',
              '(UTC+09:00) Osaka' => 'Asia/Tokyo',
              '(UTC+09:00) Sapporo' => 'Asia/Tokyo',
              '(UTC+09:00) Seoul' => 'Asia/Seoul',
              '(UTC+09:00) Tokyo' => 'Asia/Tokyo',
              '(UTC+09:30) Adelaide' => 'Australia/Adelaide',
              '(UTC+09:30) Darwin' => 'Australia/Darwin',
              '(UTC+10:00) Brisbane' => 'Australia/Brisbane',
              '(UTC+10:00) Canberra' => 'Australia/Canberra',
              '(UTC+10:00) Guam' => 'Pacific/Guam',
              '(UTC+10:00) Hobart' => 'Australia/Hobart',
              '(UTC+10:00) Melbourne' => 'Australia/Melbourne',
              '(UTC+10:00) Port Moresby' => 'Pacific/Port_Moresby',
              '(UTC+10:00) Sydney' => 'Australia/Sydney',
              '(UTC+10:00) Yakutsk' => 'Asia/Yakutsk',
              '(UTC+11:00) Vladivostok' => 'Asia/Vladivostok',
              '(UTC+12:00) Auckland' => 'Pacific/Auckland',
              '(UTC+12:00) Fiji' => 'Pacific/Fiji',
              '(UTC+12:00) International Date Line West' => 'Pacific/Kwajalein',
              '(UTC+12:00) Kamchatka' => 'Asia/Kamchatka',
              '(UTC+12:00) Magadan' => 'Asia/Magadan',
              '(UTC+12:00) Marshall Is.' => 'Pacific/Fiji',
              '(UTC+12:00) New Caledonia' => 'Asia/Magadan',
              '(UTC+12:00) Solomon Is.' => 'Asia/Magadan',
              '(UTC+12:00) Wellington' => 'Pacific/Auckland',
              '(UTC+13:00) Nuku\alofa' => 'Pacific/Tongatapu'
          );
    }
}