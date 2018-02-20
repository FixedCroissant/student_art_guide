@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Artwork</div>

                <div class="panel-body">
                    <form id="search" method="POST" action="{{ route('auth.art.edit') }}" class="form form-inline">
                        {{ csrf_field() }}
                        <label for="searchInput">Enter the Artwork number:</label>
                            <input id="searchInput" name="searchInput" class="form-control">
                            <input type="submit" class="form-control">
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="editArt"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('/js/edit.js') }}"></script>
@endsection