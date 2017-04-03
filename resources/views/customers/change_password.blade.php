@extends('layouts/customer/master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h3 class="text-center">
                Reset Password
            </h3>
            <hr/>
            <form>
                <div class="form-group">
                    <label>
                        Enter Old Password :
                    </label>
                    <input class="form-control" type="text"/>
                </div>
                <div class="form-group">
                    <label>
                        Enter New Password :
                    </label>
                    <input class="form-control" type="password"/>
                </div>
                <div class="form-group">
                    <label>
                        Confirm Password :
                    </label>
                    <input class="form-control" type="password"/>
                </div>
                <button class="btn btn-primary btn-sm center-block">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
@stop
