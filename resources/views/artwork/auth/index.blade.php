@extends('layouts.app')

@section('content')
    <div class="container">
			<div class="content">
                <div class ="row">
                    <div class="col-md-12">
                        <p>
                            Additional Functions:
                            <ul>
                                <li>
                                    {{link_to_route('auth.art.create','Add New Art Piece')}}
                                </li>
                                <li>
                                    {{link_to_route('auth.art.indexFields','See list of all fields, including unique ids for art pieces.')}}
                                </li>
                            </ul>
                        </p>
                    </div>
                </div>

				<table class="table">
                    <thead>
                    <th>
                        Date Created:
                    </th>
                    <th>
                        Archived:
                    </th>
                    <th>
                        Artwork Name:
                    </th>
                    <th>
                        Preview Image:
                    </th>
                    <th>
                        Action:
                    </th>
                    <th style="">
                        Generate QR Code
                    </th>
                    </thead>
                    <tbody>
                            @foreach($art as $myArt)
                                <tr>
                                    <td>
                                        {{$myArt->created_at->format('m/d/Y h:i A')}}
                                    </td>
                                    <td>
                                        {{ucfirst($myArt->status)}}
                                    </td>
                                    <td>
                                        {{$myArt->nameOfArtPiece}}
                                    </td>
                                    <td>
                                        @if($myArt->status=="archived")
                                            Image has been archived. <br/>
                                        @else
                                            @foreach($myArt->artImageURL as $myImageURL)
                                                <img class="img-thumbnail" width="175" height="150" src="../../../uploads/{{$myImageURL}}"/>
                                            @endforeach
                                        @endif

                                    </td>
                                    <td>
                                        {{link_to_route('art.edit','Edit',$myArt->id)}}
                                    </td>
                                    <td style="">
                                        {!! QrCode::size(100)->generate( $myArt->artShowURL) !!}
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
			</div>
		</div>

@endsection