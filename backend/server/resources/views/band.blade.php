@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form class="form-horizontal" method="post" action="{{route('vol.add')}}">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('userID') ? ' has-error' : '' }}">
                        <label for="user" class="col-md-4 control-label">UserID</label>

                        <div class="col-md-6">
                            <select id="user" name="userID" class="form-control">
                                @foreach($volunteer as $volunteers => $vol)
                                    <option value="{{$vol->UserID}}">{{$vol->UserID}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('event_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('event_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('bandID') ? ' has-error' : '' }}">
                        <label for="bandID" class="col-md-4 control-label">BandID</label>

                        <div class="col-md-6">
                            <input id="bandID" type="text" class="form-control" name="bandID" value="{{ old('bandID') }}" required autofocus>

                            @if ($errors->has('bandID'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('bandID') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection