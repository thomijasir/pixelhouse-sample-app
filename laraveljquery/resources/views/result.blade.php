@foreach($twit as $datatwit)
                    @if(Auth::user()->id != $datatwit->user_id)
                        <!-- Panel Twitter Mesaage Left -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="{{ \App\Tools::getDisplay($datatwit->user_id) }}" class="img-circle center-block pf">
                                    </div>
                                    <div class="col-xs-9">
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
                                    <div class="col-xs-9 text-right">
                                        <div class="row">
                                            <div class="col-md-12"><b>{{ $datatwit->name }}</b></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">{{ $datatwit->tweet }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{--<a id="delet" href="{{route('home').'/del/'.$datatwit->id }}"><b><u>Delete</u></b></a>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <img src="{{ \App\Tools::getDisplay(Auth::user()->id) }}" class="img-circle center-block pf">
                                    </div>
                                </div>
                            </div>

                    @endif

                @endforeach