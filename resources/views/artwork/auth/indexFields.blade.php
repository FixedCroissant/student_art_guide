@extends('layouts.app')
@section('content')
    <script>
        $(document).ready( function () {
            $('#artworkFields').DataTable({

                "lengthMenu": [[2,10, 25, 50, -1], [2,10, 25, 50, "All"]]

            });
        } );
    </script>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />

                <div class ="row">
                    <div class="col-md-off-2">
                        <p>
                            Additional Functions:
                            <ul>
                                <li>
                                   {{link_to_route('homepage','Go back to homepage')}}
                                </li>
                                <li>
                                    {{link_to_route('auth.art.index','Go back to your prior list.')}}
                                </li>
                            </ul>
                        </p>
                        <p>
                            <h4>Field Legend:</h4>
                            Below is the list of all the fields that are used to store artwork information:
                            <br/>
                            <br/>
                            <ul>
                                <li>
                                    The first column, <span class="bold">"id"</span> is the unique id of that artwork item. <span class="important-field">It's what you want to use for the number.</span>
                                </li>
                                <li>
                                    The second column, <span class="bold">"created_at"</span> is when the art was first placed in the system.
                                </li>
                                <li>
                                    The third column, <span class="bold">"updated_at"</span> is when the art piece was last updated in the system.
                                </li>
                                <li>
                                    The fourth column, <span class="bold">"Name Of Art Piece"</span> is the title of the artwork being displayed.
                                </li>
                                <li>
                                    The fifth column, <span class="bold">"Submitted By"</span> is the name of the person who submitted the artwork.
                                </li>
                                <li>
                                    The sixth column, <span class="bold">"Additional Information"</span> is a reference for any additional text or information the artist would like to provide.
                                </li>
                                <li>
                                    The seventh column, <span class="bold">"Artist Name"</span> is the name of the person who submitted the artwork.
                                </li>
                                <li>
                                    The eighth column, <span class="bold">"Grad Year"</span> is the stated graduation year of the artist.
                                </li>
                                <li>
                                    The ninth column, <span class="bold">"Inspiration"</span> is the inspiration for why the artist creates the items.
                                </li>
                                <li>
                                    The tenth column, <span class="bold">"Profession"</span> is the current occupation of the person who submitted the artwork.
                                </li>
                                <li>
                                    The twelfth column, <span class="bold">"Still Creating"</span> is whether or not the individual is still creating any type of art (paint, photography, mixed media, etc).
                                </li>
                                <li>
                                    The thirteenth column, <span class="bold">"Favorte Artist"</span> is the artist's inspiration for making art and getting into the field..
                                </li>
                                <li>
                                    The fourteenth column, <span class="bold">"Contact"</span> is the means of contacting the individual.
                                </li>
                                <li>
                                    The fifteenth column, <span class="bold">"Status"</span> is a field that is whether the artwork is archived in the system (<span class="bold">not deleted</span>).
                                </li>
                            </ul>
                        </p>
                    </div>
                </div><!--End Row-->
                <div class="row">
                    <div class="col-md-12" style="margin-left:-150px; font-size:small;">
                        Here is everything that exists within <strong>ALL</strong> fields of the artwork table:
                            <table class="table table-responsive" id="artworkFields">
                                <thead>
                                        @foreach($fields as $key => $myFields3)
                                                <th>
                                                    @if($myFields3=='id')
                                                        id
                                                    @else
                                                        {{ucwords($myFields3)}}
                                                    @endif
                                                </th>
                                        @endforeach
                                </thead>
                                <!--End Head-->
                                <!--Get Body-->
                                <tbody>
                                @foreach($art as $myFields)
                                    <tr>
                                    @foreach($fields as $key => $myFields2)

                                                <td>
                                                    {{$myFields[$myFields2]}}
                                                </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!--End Get body-->
                            </table>
                    </div>
                </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@endsection