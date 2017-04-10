@extends('layouts.customer.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">
                Đăng nhập
            </h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{ route('index') }}">
                    Home
                </a>
                /
                <span>
                    Đăng nhập
                </span>
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
</div>
<div class="container">
    <div id="content">
        <form action="{{url('/login')}}" class="beta-form-checkout" method="post">
            <input name="_token" type="hidden" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-6">
                        <h4>
                            Đăng nhập
                        </h4>
                        <div class="space20">
                        </div>
                        <div class="form-block">
                            <label for="email">
                                Email address*
                            </label>
                            <input name="email" required="" type="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>
                                        {{ $errors->first('email') }}
                                    </strong>
                                </span>
                                @endif
                            </input>
                        </div>
                        <div class="form-block">
                            <label for="phone">
                                Password*
                            </label>
                            <input name="password" required="" type="password" value="{{ old('password') }}">
                            </input>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('password') }}
                                </strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-block">
                            <div class="col-md-6 col-md-offset-4">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                            </a>
                            </div>
                        </div>
                        <div class="form-block">
                            <button class="btn btn-primary" type="submit">
                                Login
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    </div>
                </div>
            </input>
        </form>
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <h2>
                    <hr/>
                </h2>
                <button class="btn btn-primary">
                    <a href="{{ url('/redirect/facebook') }}">
                    Login with Facebook
                    </a>
                </button>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
        <!-- #content -->
    </div>
    <!-- .container -->
    @stop
</div>