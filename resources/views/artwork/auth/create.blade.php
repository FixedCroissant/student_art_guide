@extends('layouts.app')

@section('content')


		<div class="container">
			<div class="content">
				{!! Form::open(['route' => 'art.store']) !!}
				<table class="table">
						<tr>
							<td>
								Name:
							</td>
							<td>
									{!!  Form::text('Name',null,['class'=>'required']) !!}
							</td>
						</tr>
						<tr>
							<td>
								Country of Origin:
							</td>
							<td>
								{!! Form::select('CountryOfOrigin',$countries,['class'=>'required']) !!}
							</td>
						</tr>

						<tr>
							<td>
								Additional Information:
							</td>
							<td>
								{!! Form::textarea('artworkAdditionalInformation',null)  !!}
							</td>
						</tr>
						<tr>
							<td colspan="2">
								{!! Form::submit('Add to Database') !!}
							</td>
						</tr>
						{!! Form::close()!!}
				</table>
				{{link_to_route('homepage','Back') }}
			</div>
		</div>

@endsection
