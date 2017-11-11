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

            <div class="panel panel-default">
                <div class="panel-heading">Your Feed</div>

                @foreach($twit as $datatwit)

                    @if(Auth::user()->id != $datatwit->user_id)
                        <!-- Panel Twitter Mesaage Left -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <img src="{{ \App\Tools::getDisplay($datatwit->user_id) }}" class="img-circle center-block pf">
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="row">
                                            <div class="col-md-12"><b>{{ $datatwit->name }}</b></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">{{ $datatwit->tweet }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @else

                        <!-- Panel Twitter Mesaage Right -->
                            <div class="panel-body asOwner">
                                <div class="row">
                                    <div class="col-xs-10 text-right">
                                        <div class="row">
                                            <div class="col-md-12"><b>{{ $datatwit->name }}</b></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">{{ $datatwit->tweet }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="{{route('home').'/del/'.$datatwit->id }}"><b><u>Delete</u></b></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <img src="{{ \App\Tools::getDisplay(Auth::user()->id) }}" class="img-circle center-block pf">
                                    </div>
                                </div>
                            </div>

                    @endif

                @endforeach


            </div>

        </div>
    </div>
</div>
@endsection
