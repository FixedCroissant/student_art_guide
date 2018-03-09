<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
#allow for redirects.
use Redirect;
use SplFileInfo;

use App\Art;


class ArtworkController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		//No ID fullfilled.
		if(empty($request->input('id')))
		{
				return view('artwork.index');
		}
		else
			{
				//Go to show page.
				$artID = $request->input('id');
				$artInformation = Art::find($request->get('id'));
				if($artInformation->status != null) $artInformation = null;

                //Handle if directory does not exist.
				if(file_exists(public_path() . '/uploads/' . $artID . '/')) {
                    $files = scandir(public_path() . '/uploads/' . $artID . '/');
                    $artInformation->files = array_diff($files, ['..','.']);
                }

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
			'nameOfArtPiece' => 'required',
		]);
		$piece = new Art();

		$piece->nameOfArtPiece = $request->nameOfArtPiece;
		$piece->country_of_origin = $request->CountryOfOrigin;
		$piece->submittedBy = $request->submittedBy;
		$piece->additionalInformation = $request->artworkAdditionalInformation;
		$piece->artist_name = $request->artist_name;
		$piece->grad_year = $request->grad_year;
		$piece->inspiration = $request->inspiration;
		$piece->profession = $request->profession;
		$piece->still_creating = $request->still_creating;
		$piece->favorite_artist = $request->favorite_artist;
		$piece->contact = $request->contact;

		$piece->save();
		//uploads files
		$file = $request->file('images');
		if($file != null){
			$name =  $file->getClientOriginalName();
			$file->move(public_path() . '/uploads/' . $piece->id . "/" , $name);
		}

	 	//The Artwork is valid
		return redirect('/');
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


	public function edit_list()
	{
		return view ('edit.index');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request)
	{
		$id = $request->input('searchInput');
		$data['art'] = Art::find($id);
		if(file_exists(public_path() . '/uploads/' . $id . '/')) {
            $files = scandir(public_path() . '/uploads/' . $id . '/');
            $data['art']->files = array_diff($files, ['..','.']);
        }

		return view('edit.edit')->with($data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$validatedData = $request->validate([
			'nameOfArtPiece' => 'required',
		]);

		$piece = Art::find($request->id);

		$piece->nameOfArtPiece = $request->nameOfArtPiece;
		$piece->country_of_origin = $request->CountryOfOrigin;
		$piece->submittedBy = $request->submittedBy;
		$piece->additionalInformation = $request->additionalInformation;
		$piece->artist_name = $request->artist_name;
		$piece->grad_year = $request->grad_year;
		$piece->inspiration = $request->inspiration;
		$piece->profession = $request->profession;
		$piece->still_creating = $request->still_creating;
		$piece->favorite_artist = $request->favorite_artist;
		$piece->contact = $request->contact;

		$piece->save();
		//uploads files
		$file = $request->file('images');
		if($file != null){
			$name =  $file->getClientOriginalName();
			$file->move(public_path() . '/uploads/' . $piece->id . "/" , $name);
		}

		return redirect( url('/edit') );
	}

	public function archive_img(Request $request){
		$id = $request->input('id');
		$folder = substr($id,0,strpos($id,"_"));
		$raw_filename = substr($id,strpos($id,"_") + 1);
		$name = substr($raw_filename, 0, strrpos($raw_filename, "_"));
		$ext = substr($raw_filename, strrpos($raw_filename, "_") + 1);
		$filename = $name . "." . $ext;

		if(!is_dir(public_path() . "/uploads/archive/" . $folder)){
			File::makeDirectory(public_path() . "/uploads/archive/" . $folder,0777,true);
		}

		File::move(public_path() . "/uploads/" . $folder . "/" . $filename, public_path() . "/uploads/archive/" . $folder . "/" . $filename);

		return $filename;
	}

	public function delete(Request $request){
		$id = $request->input('id');

		$piece = Art::find($id);
		$piece->status = ($piece->status == "archived") ? null : "archived";
		$piece->save();

		// return redirect()->action('ArtworkController@edit',['id' => $id]);
		return redirect('/edit');
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

	/**
     * Pull random image from the database.
     * @id unique artwork id.
     */
	public function pullImage($id,Request $request){
        //Load a directory.
	    $files = File::files(public_path('/uploads/'.$id));
	    //Keep list.
	    $fileList = array();
	    foreach($files as $myPath)
        {
            $fileList[] = pathinfo($myPath);
        }
        $URL =  'uploads/'.$id."/".$fileList[0]['basename'];
        return $URL;
	}
}
