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
												<div class="row">
													<div class="col-md-6 col-sm-6 col-xs-12">
														<img  class="img-responsive" src="{{asset('uploads').'/'. $artInformation->id .'/'.$image}}">

													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<!--Add Image Per Amy-->
														<img class="col-xs-12 img-responsive" src="{{Request::root()}}/images/ARTS_NCSTATE_black_outlined.png">

													</div>

												</div>
											@endforeach
											@else
											<tr>
												<td colspan="2">
													No image provided.
												</td>
											</tr>
										@endif
										<tr>
											<td class="col-md-4 col-sm-3 col-xs-3 bold">
											Artwork	Name:
											</td>
											<td class="col-md-8 col-sm-9 col-xs-9">
												{{$artInformation->nameOfArtPiece}}
											</td>
										</tr>
										<tr>
											<td class="col-md-4 col-sm-3 col-xs-3 bold">
													Submitted By:
											</td>
											<td class="col-md-8 col-sm-9 col-xs-9">
													{{$artInformation->submittedBy}}
											</td>
										</tr>
										<tr>
											<td class="col-md-4 col-sm-3 col-xs-3 bold">
												Artist Graduation Year:
											</td>
											<td class="col-md-8 col-sm-9 col-xs-9">
												{{$artInformation->grad_year}}
											</td>
										</tr>
										<tr>
											<td class="col-md-4 col-sm-3 col-xs-3 bold">
												Artist's Inspiration:
											</td>
											<td class="col-md-8 col-sm-9 col-xs-9">
												{{$artInformation->inspiration}}
											</td>
										</tr>
										<tr>
											<td class="col-md-4 col-sm-3 col-xs-3 bold" >
												Artist's Current Profession:
											</td>
											<td class="col-md-8 col-sm-9 col-xs-9">
												{{$artInformation->profession}}
											</td>
										</tr>
										<tr>
											<td class="col-md-4 col-sm-3 col-xs-3 bold">
												Still creating artwork:
											</td>
											<td class="col-md-8 col-sm-9 col-xs-9">
												{{$artInformation->still_creating}}
											</td>
										</tr>
										<tr>
											<td class="col-md-4 col-sm-3 col-xs-3 bold">
												Favorite Artist:
											</td>
											<td class="col-md-8 col-sm-9 col-xs-9">
												{{$artInformation->favorite_artist}}
											</td>
										</tr>
										<tr>
											<td class="col-md-4 col-sm-3 col-xs-3 bold">
												Contact:
											</td>
											<td class="col-md-8 col-sm-9 col-xs-9">
												{{$artInformation->contact}}
											</td>
										</tr>
										<tr>
											<td class="col-md-4 col-sm-3 col-xs-3 bold">
												Date Submitted:
											</td>
											<td class="col-md-8 col-sm-9 col-xs-9">
												{{$artInformation->created_at->format('m-d-Y')}}
											</td>
									    </tr>
										<tr>
											<td class="col-md-4 col-sm-3 col-xs-3 bold">
												Additional Information:
											</td>
											<td class="col-md-8 col-sm-9 col-xs-9">
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

