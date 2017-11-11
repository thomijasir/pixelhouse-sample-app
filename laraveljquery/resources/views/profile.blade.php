@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Profile Settings</div>
                <div class="panel-body">
                    <form method="post" action="/profile" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">

                            <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                            <img id="pfoimg" src="{{ \App\Tools::getDisplay(Auth::user()->id) }}" width="148" height="148" class="img-circle center-block">
                            <br>
                                <span class="btn btn-primary btn-file center-block">
                                    Upload <input type="file" name="img" accept="image/jpeg" onchange="readURL(this);">
                                </span>

                        </div>
                        <div class="col-md-9">
                                <div class="form-group">
                                   <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email">
                                </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                        </div>
                    </div>
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
