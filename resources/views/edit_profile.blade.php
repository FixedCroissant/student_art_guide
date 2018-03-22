@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>

                <div class="panel-body">
                    Let's edit your role.
                    <div>
                      <table>
                        <tbody>
                            <tr>
                              <td>
                                Name:
                              </td>
                              <td>
                                {{$user->name}}
                              </td>
                            </tr>
                            <tr>
                              <td>
                                E-Mail Address:
                              </td>
                              <td>
                                {{$user->email}}
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Role(s) Associated:
                              </td>
                              <td>
                                <tr>
                                  <td>
                                    <ul>
                                      @foreach($user->roles as $myRole)
                                        <li>
                                              {{$myRole->name}} | {{link_to_route('role.remove','Remove',[$user->id,$myRole->id])}}
                                        </li>
                                        @endforeach
                                    </ul>
                                  </td>
                                </tr>
                              </td>
                            </tr>
                            <tr>
                            <td>
                            @if($user->hasRole('admin'))
                              <span style="font-size:large;">Add Role:</span>
                              {!! Form::open(['route' => 'profileUpdateRole']) !!}
                              {!! Form::select('role', $roles); !!}
                              {!! Form::hidden('user_id',$user->id)!!}
                              {!! Form::submit('Update') !!}
                              {!! Form::close()!!}
                            @endif
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div><!--Div with content-->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        &nbsp;
    </div>
    <div class="row">
      <div class="col-md-12">
        {!!link_to_route('homepage','Go back to homepage.') !!}
      </div>
    </div>
</div>
@endsection
