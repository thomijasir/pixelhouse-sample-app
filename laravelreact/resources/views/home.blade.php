@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

           <div class="panel panel-default">
                <div class="panel-heading">Simple Twitter</div>
                <div class="panel-body">
                    <form action="/home" method="post" id="ajaxSubmit">
                        <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <textarea name="twitterfield" id="inputs" class="form-control" placeholder="What's on your mind, {{ Auth::user()->name }}" rows="3"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    {{ csrf_field() }}
                    </form>
                </div>
            </div>

            <div id="contents"></div>


        </div>
    </div>
</div>
@endsection
