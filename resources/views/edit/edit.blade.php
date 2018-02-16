@extends('layouts.app')

@section('content')
    <form id="editPiece" method="POST" action="{{ route('auth.art.update') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form form-horizontal">

        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $art->id }}">

        <div class="form-group">
            <label for="images" class="control-label col-md-2">Image</label>
            <div class="col-md-10">
                @foreach( $art->files as $i => $file)
                    <img class="img-thumbnail" src="{{ asset('uploads') . '/' . $art->id . '/' . $art->files[$i] }}">
                @endforeach
                <input name="images" id="images" type="file" accept="image/x-png,image/gif,image/jpeg">
            </div>
        </div>

        <div class="form-group">
            <label for="nameOfArtPiece" class="control-label col-md-2">Name of Art Piece:</label>
            <div class="col-md-10">
                <input name="nameOfArtPiece" id="nameOfArtPiece" class="form-control" value="{{ $art->nameOfArtPiece }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="submittedBy" class="control-label col-md-2">Submitted By:</label>
            <div class="col-md-10">
                <input name="submittedBy" id="submittedBy" class="form-control" value="{{ $art->submittedBy }}">
            </div>
        </div>

        <div class="form-group">
            <label for="grad_year" class="control-label col-md-2">Year Graduated:</label>
            <div class="col-md-10">
                <input name="grad_year" id="grad_year" class="form-control" value="{{ $art->grad_year }}">
            </div>
        </div>

        <div class="form-group">
            <label for="CountryOfOrigin" class="control-label col-md-2">Country of Origin:</label>
            <div class="col-md-10">
                {!! country_dropdown('CountryOfOrigin','form-control', $art->country_of_origin) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="profession" class="control-label col-md-2">Current Profession:</label>
            <div class="col-md-10">
                <input name="profession" id="profession" class="form-control" value="{{ $art->profession }}">
            </div>
        </div>

        <div class="form-group">
            <label for="still_creating" class="control-label col-md-2">Are you still creating art?</label>
            <div class="col-md-10">
                <input name="still_creating" id="still_creating" class="form-control" value="{{ $art->still_creating }}">
            </div>
        </div>

        <div class="form-group">
            <label for="inspiration" class="control-label col-md-2">What was your inspiration for making the piece?</label>
            <div class="col-md-10">
                <textarea name="inspiration" id="inspiration" rows="4" class="form-control">{{ $art->inspiration }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="favorite" class="control-label col-md-2">Who is your favorite artist?</label>
            <div class="col-md-10">
                <input name="favorite_artist" id="favorite_artist" class="form-control" value="{{ $art->favorite_artist }}">
            </div>
        </div>

        <div class="form-group">
            <label for="contact" class="control-label col-md-2">How can we get in contact with you?</label>
            <div class="col-md-10">
                <textarea name="contact" id="contact" rows="4" class="form-control">{{ $art->contact }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="artworkAdditionalInformation" class="control-label col-md-2">Additional Information:</label>
            <div class="col-md-10">
                <textarea name="additionalInformation" id="additionalInformation" rows="4" class="form-control">{{ $art->additionalInformation }}</textarea>
            </div>
        </div>

        <div class="text-center">
            <input type="submit" value="Update Database" class="btn btn-default">
        </div>

    </form>
@endsection