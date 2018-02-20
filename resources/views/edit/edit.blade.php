@extends('layouts.app')

@section('content')

    <div id="status">
        @if($art->status == "archived")
            <h3 class="text-center">This piece has been archived!</h3>
            <div class="text-center"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#archiveModal">Activate this piece</button></div>
        @else
            <div class="text-center"><button class="btn btn-default" data-toggle="modal" data-target="#archiveModal">Archive this piece</button></div>
        @endif
    </div>

    <div class="v-spacer"></div>

    <form id="editPiece" method="POST" action="{{ route('auth.art.update') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form form-horizontal">

        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $art->id }}">

        <div class="form-group">
            <label for="images" class="control-label col-md-2">Image</label>
            <div class="col-md-10">
                <table class="table table-hover" id="image-table">
                    @foreach( $art->files as $i => $file)
                        <tr>
                            <td>
                                <img class="img-thumbnail edit-page-img" src="{{ asset('uploads') . '/' . $art->id . '/' . $art->files[$i] }}">
                            </td>
                            <td>Delete <input type="checkbox" class="delete-img-cb" id="cb_{{ $art->id . '_' . str_replace('.','_',$file) }}"></td>
                            <td><span id="btn_{{ $art->id . '_' . str_replace('.','_',$file) }}" class="btn btn-default delete-img-btn disabled">Delete</span></td>
                        </tr>
                    @endforeach
                </table>
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

    <div id="archiveModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h4 class="modal-title">Archive Confirmation</h4>
                </div> -->
                <div class="modal-body">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <form id="deletePiece" method="POST" action="{{ route('auth.art.delete') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $art->id }}">

                        @if($art->status == "archived")
                            <h3 class="text-center">Confirm <span class="text-danger">ACTIVATION</span> of this piece?</h3>
                        @else
                            <h3 class="text-center">Confirm <span class="text-danger">ARCHIVING</span> of this piece</h3>
                        @endif
                        <div class="text-center">
                            <button class="btn btn-default">Confirm</button>
                        </div>
                    </form>

                    <div class="text-center">
                        <button class="btn btn-default" style="margin-top:10px" data-dismiss="modal">Cancel</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="{{ asset('/js/edit.js') }}"

@endsection