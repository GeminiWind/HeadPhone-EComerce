<link href="{!! asset('css/admin/bootstrap/css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
@extends('layouts/customer/master')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/css/infor.css" rel="stylesheet" type="text/css">
        <div class="container" style="height: 400px">
            <div class="row" id="infor">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <img alt="" class="img-rounded img-responsive" src="http://www.aspirehire.co.uk/aspirehire-co-uk/_img/profile.svg"/>
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <h4>
                                    Bhaumik Patel
                                </h4>
                                <small>
                                    <cite title="San Francisco, USA">
                                        San Francisco, USA
                                        <i class="glyphicon glyphicon-map-marker">
                                        </i>
                                    </cite>
                                </small>
                                <p>
                                    <i class="glyphicon glyphicon-envelope">
                                    </i>
                                    email@example.com
                                    <br/>
                                    <i class="glyphicon glyphicon-globe">
                                    </i>
                                    <a href="http://www.jquery2dotnet.com">
                                        www.jquery2dotnet.com
                                    </a>
                                    <br/>
                                    <i class="glyphicon glyphicon-gift">
                                    </i>
                                    June 02, 1988
                                </p>
                                <!-- Split button -->
                                <div class="btn-group">
                                    <button class="btn btn-primary" type="button">
                                        Social
                                    </button>
                                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
                                        <span class="caret">
                                        </span>
                                        <span class="sr-only">
                                            Social
                                        </span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="#">
                                                Twitter
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://plus.google.com/+Jquery2dotnet/posts">
                                                Google +
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/jquery2dotnet">
                                                Facebook
                                            </a>
                                        </li>
                                        <li class="divider">
                                        </li>
                                        <li>
                                            <a href="#">
                                                Github
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @stop
    </link>
</link>