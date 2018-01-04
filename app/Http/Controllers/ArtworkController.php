<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
#allow for redirects.
use Redirect;

use App\Art;


class ArtworkController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//No ID fullfilled.
		if(empty(Request::input('id')))
		{
				return view('artwork.index');
		}
		else
			{
				//Go to show page.
				$artID = Request::input('id');
				$artInformation = Art::find(Request::get('id'));

				return view('artwork.show')->with('artInformation',$artInformation);
			}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{

		//Administrative.
		//Check roles.
	 	if(!is_null($request->user())){
			$request->user()->authorizeRoles('admin');
		}
		else{
			return Redirect::to('/login');
		}
		//List of countries.
		$countryList = array(
		    'AF' => 'Afghanistan','AL' => 'Albania','DZ' => 'Algeria','AX' => 'Aland Islands','AS' => 'American Samoa','AI' => 'Anguilla','AD' => 'Andorra',
		    'AO' => 'Angola','AG' => 'Antigua and Barbuda','AQ' => 'Antarctica','AR' => 'Argentina','AM' => 'Armenia','AU' => 'Australia',
		    'AT' => 'Austria','AW' => 'Aruba','AZ' => 'Azerbaijan','BA' => 'Bosnia and Herzegovina','BB' => 'Barbados',
		    'BD' => 'Bangladesh','BE' => 'Belgium','BF' => 'Burkina Faso','BG' => 'Bulgaria','BH' => 'Bahrain','BI' => 'Burundi','BJ' => 'Benin',
		    'BM' => 'Bermuda','BN' => 'Brunei Darussalam','BO' => 'Bolivia','BR' => 'Brazil','BS' => 'Bahamas','BT' => 'Bhutan','BV' => 'Bouvet Island',
		    'BW' => 'Botswana','BV' => 'Belarus','BZ' => 'Belize','KH' => 'Cambodia','CM' => 'Cameroon','CA' => 'Canada', 'CV' => 'Cape Verde','CF' => 'Central African Republic',
		    'TD' => 'Chad','CL' => 'Chile','CN' => 'China','CC' => 'Cocos Islands', 'CO' => 'Colombia','CG' => 'Congo', 'CI' => 'Cote D\'Ivoire (Ivory Coast)','CK' => 'Cook Islands',
		    'CR' => 'Costa Rica','HR' => 'Croatia (Hrvatska)','CU' => 'Cuba','CY' => 'Cyprus','CZ' => 'Czech Republic','CD' => 'Democratic Republic of the Congo',
		    'DJ' => 'Djibouti','DK' => 'Denmark','DM' => 'Dominica','DO' => 'Dominican Republic','EC' => 'Ecuador','EG' => 'Egypt','SV' => 'El Salvador','TP' => 'East Timor',
		    'EE' => 'Estonia', 'GQ' => 'Equatorial Guinea','ER' => 'Eritrea','ET' => 'Ethiopia', 'FI' => 'Finland','FJ' => 'Fiji','FK' => 'Falkland Islands (Malvinas)',
		    'FM' => 'Federated States of Micronesia','FO' => 'Faroe Islands','FR' => 'France','GF' => 'French Guiana','PF' => 'French Polynesia','GA' => 'Gabon',
		    'GM' => 'Gambia','DE' => 'Germany','GH' => 'Ghana', 'GI' => 'Gibraltar','GB' => 'Great Britain (UK)','GD' => 'Grenada','GE' => 'Georgia','GR'=> 'Greece','GL' => 'Greenland',
		    'GN' => 'Guinea','GP' => 'Guadeloupe','GT' => 'Guatemala','GU' => 'Guam','GW' => 'Guinea-Bissau','GY' => 'Guyana','HK' => 'Hong Kong',
		    'HM' =>'Heard Island and McDonald Islands','HN' => 'Honduras','HT' => 'Haiti','HU' => 'Hungary','ID' => 'Indonesia',
		    'IE' => 'Ireland','IL' => 'Israel','IN' => 'India','IQ' => 'Iraq','IR' => 'Iran','IT' => 'Italy','JM' => 'Jamaica',
				'JO' => 'Jordan','JP' => 'Japan','KE' => 'Kenya','KG' => 'Kyrgyzstan','KI' => 'Kiribati',
		    'KM' => 'Comoros','KN' => 'Saint Kitts and Nevis','KP' => 'Korea (North)',
				'KR' => 'Korea (South)','KW' => 'Kuwait','KY' => 'Cayman Islands',
		    'KZ' => 'Kazakhstan','LA' => 'Laos','LB' => 'Lebanon','LC' => 'Saint Lucia','LI' => 'Liechtenstein',
		    'LK' => 'Sri Lanka','LR' => 'Liberia','LS' => 'Lesotho','LT' => 'Lithuania','LU' => 'Luxembourg','LV' => 'Latvia','LY' => 'Libya',
		    'MK' => 'Macedonia','MO' => 'Macao', 'MG' => 'Madagascar','MY' => 'Malaysia','ML' => 'Mali','MW' => 'Malawi','MR' => 'Mauritania',
		    'MH' => 'Marshall Islands','MQ' => 'Martinique','MU' => 'Mauritius','YT' => 'Mayotte','MT' => 'Malta','MX' => 'Mexico',
		    'MA' => 'Morocco','MC' => 'Monaco','MD' => 'Moldova','MN' => 'Mongolia', 'MM' => 'Myanmar', 'MP' => 'Northern Mariana Islands',
		    'MS' => 'Montserrat', 'MV' => 'Maldives', 'MZ' => 'Mozambique', 'NA' => 'Namibia','NC' => 'New Caledonia','NE'=> 'Niger','NF' => 'Norfolk Island','NG' => 'Nigeria',
		    'NI' => 'Nicaragua','NL' => 'Netherlands','NO' => 'Norway','NP' => 'Nepal','NR' => 'Nauru','NU' => 'Niue','NZ' => 'New Zealand (Aotearoa)','OM' => 'Oman',
		    'PA' => 'Panama', 'PE' => 'Peru','PG' => 'Papua New Guinea','PH' => 'Philippines','PK' => 'Pakistan','PL' => 'Poland','PM' => 'Saint Pierre and Miquelon','CS' => 'Serbia and Montenegro',
		    'PN' => 'Pitcairn','PR' => 'Puerto Rico','PS' => 'Palestinian Territory', 'PT' => 'Portugal', 'PW' => 'Palau','PY' => 'Paraguay', 'QA' => 'Qatar','RE' => 'Reunion','RO' => 'Romania',
		    'RU' => 'Russian Federation','RW' => 'Rwanda','SA' => 'Saudi Arabia','WS' => 'Samoa','SH' => 'Saint Helena','VC' => 'Saint Vincent and the Grenadines',
		    'SM' => 'San Marino', 'ST' => 'Sao Tome and Principe', 'SN' => 'Senegal','SC' => 'Seychelles','SL' => 'Sierra Leone','SG' => 'Singapore','SK' => 'Slovakia',
		    'SI' => 'Slovenia','SB' => 'Solomon Islands','SO' => 'Somalia','ZA' => 'South Africa', 'ES' => 'Spain','SD' => 'Sudan','SR' => 'Suriname','SJ' => 'Svalbard and Jan Mayen',
		    'SE' => 'Sweden', 'CH' => 'Switzerland','SY' => 'Syria','SZ' => 'Swaziland', 'TW' => 'Taiwan','TZ' => 'Tanzania','TJ' => 'Tajikistan', 'TH' => 'Thailand', 'TL' => 'Timor-Leste',
		    'TG' => 'Togo','TK'=> 'Tokelau','TO' => 'Tonga','TT' => 'Trinidad and Tobago','TN' => 'Tunisia','TR' => 'Turkey','TM' => 'Turkmenistan', 'TC' => 'Turks and Caicos Islands',
		    'TV' => 'Tuvalu','UA' => 'Ukraine','UG' => 'Uganda','AE' => 'United Arab Emirates','UK' => 'United Kingdom', 'US' => 'United States', 'UY' => 'Uruguay','UZ' => 'Uzbekistan',
		    'VU' => 'Vanuatu','VA' => 'Vatican City State','VE' => 'Venezuela','VG' => 'Virgin Islands (British)','VI' => 'Virgin Islands (U.S.)','VN' => 'Vietnam','WF' => 'Wallis and Futuna',
		    'EH' => 'Western Sahara','YE' => 'Yemen','YU' => 'Yugoslavia','ZM' => 'Zambia','ZW' => 'Zimbabwe'
					);



		//Add a new art piece.
		return view('artwork.auth.create')->with(['countries'=>$countryList]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//Validation
		$validatedData = $request->validate([
			 'name' => 'required',
	 ]);

	 	//The Artwork is valid
		return dd('lets create art!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
