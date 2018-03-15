@extends('layouts.app')
@section('content')

	<div class="row">

		<div class="col-md-12">

				<table class="table table-responsive">
						@if(is_null($artInformation))
										<p>
											No art found for this number.
											<br/>
											Please try {{link_to_route('homepage','again?') }}
										</p>
						@else
										<!--If there is an image-->
										@if(!is_null($artInformation->files))
											@foreach($artInformation->files as $image)
												<img class="img-thumbnail" src="{{asset('uploads').'/'. $artInformation->id .'/'.$image}}">
											@endforeach
											@else
											<tr>
												<td colspan="2">
													No image provided.
												</td>
											</tr>
										@endif
										<tr>
											<td>
											Artwork	Name:
											</td>
											<td>
												{{$artInformation->nameOfArtPiece}}
											</td>
										</tr>
										<tr>
											<td>
													Submitted By:
											</td>
											<td>
													{{$artInformation->submittedBy}}
											</td>
										</tr>
										<tr>
											<td>
												Artist Graduation Year:
											</td>
											<td>
												{{$artInformation->grad_year}}
											</td>
										</tr>
										<tr>
											<td>
												Artist's Inspiration:
											</td>
											<td>
												{{$artInformation->inspiration}}
											</td>
										</tr>
										<tr>
											<td>
												Artist's Current Profession:
											</td>
											<td>
												{{$artInformation->profession}}
											</td>
										</tr>
										<tr>
											<td>
												Still creating artwork:
											</td>
											<td>
												{{$artInformation->still_creating}}
											</td>
										</tr>
										<tr>
											<td>
												Favorite Artist:
											</td>
											<td>
												{{$artInformation->favorite_artist}}
											</td>
										</tr>
										<tr>
											<td>
												Contact:
											</td>
											<td>
												{{$artInformation->contact}}
											</td>
										</tr>
										<tr>
											<td>
												Date Submitted:
											</td>
											<td>
												{{$artInformation->created_at->format('m-d-Y')}}
											</td>
									    </tr>
										<tr>
											<td>
												Country of Origin:
											</td>
											<td>
												{{$artInformation->country_of_origin}}
											</td>
										</tr>
										<tr>
											<td>
												Additional Information:
											</td>
											<td>
												{{$artInformation->additionalInformation}}
											</td>
										</tr>
										<tr>
											<td colspan="2">
											{{link_to_route('homepage','Back') }}
											</td>
										</tr>
						@endif
				</table>
		</div>
	</div>
@stop

