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
										@foreach($artInformation->files as $image)
											<img class="img-thumbnail" src="{{asset('uploads').'/'. $artInformation->id .'/'.$image}}">
										@endforeach

										<tr>
											<td>
												Name:
											</td>
											<td>
												{{$artInformation->nameOfArtPiece}}
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
												Date Submitted:
											</td>
											<td>
												{{$artInformation->created_at}}
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

