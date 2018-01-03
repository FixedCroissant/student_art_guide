<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;

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
	 	$request->user()->authorizeRoles('admin');
		//Add a new art piece.
		return view('artwork.auth.create');
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
