@extends('layouts.customer.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">
                Lịch sử mua hàng
            </h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{ route('index') }}">
                    Trang chủ
                </a>
                /
                <span>
                    Lịch sử mua hàng
                </span>
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-md-3">
                <div class="customer-info" style="text-align: center; padding:10px 0px">
                  <img alt="" class="img-rounded img-responsive" src="http://www.aspirehire.co.uk/aspirehire-co-uk/_img/profile.svg"/>
                    <p>
                        <strong>
                            Name :
                        </strong>
                        {{ Auth::guard('web')->user()->name}}
                    </p>
                    <p>
                        <strong>
                            <i class="fa fa-mail"></i>Email:
                        </strong>
                        {{ Auth::guard('web')->user()->email}}
                    </p>
                </div>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active">
                        <a data-toggle="pill" href="#order_history">
                            Order History
                        </a>
                    </li>
                    @if(Auth::guard('web')->user()->socialacount()->count() === 0)
                    <li>
                        <a data-toggle="pill" href="#change_password">
                            Change Password
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="order_history">
                        <h3>
                            Lịch sử mua hàng
                        </h3>
                        <table class="table table-responsive">
                            <thead>
                                <th>
                                    STT
                                </th>
                                <th>
                                    Tổng
                                </th>
                                <th>
                                    Ngày
                                </th>
                            </thead>
                            <tbody>
                                @foreach (Auth::guard('web')->user()->orders as $order)
                                <tr class="accordion-toggle" data-target="#order_detail{{ $order->id }}" data-toggle="collapse">
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        {{ $order->total }}
                                    </td>
                                    <td>
                                        {{ $order->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="accordion-body collapse" id="order_detail{{ $order->id }}">
                                        <table class="table">
                                            <thead>
                                                <th>
                                                    Product
                                                </th>
                                                <th>
                                                    Qty
                                                </th>
                                                <th>
                                                    Price
                                                </th>
                                                <th>
                                                    To Money
                                                </th>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->products as $product)
                                                <tr>
                                                    <td>
                                                        {{ $product->name}}
                                                    </td>
                                                    <td>
                                                        {{ $product->pivot->quantity}}
                                                    </td>
                                                    <td>
                                                        {{ $product->pivot->price }}
                                                    </td>
                                                    <td>
                                                        {{ $product->pivot->price*$product->pivot->quantity }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="change_password">
                        <h3>
                            Change Password
                        </h3>
                        <hr>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3 class="text-center">
                                        Reset Password
                                    </h3>
                                    <hr/>
                                    <form action="{{ route('customer.change-password') }}" method="POST">
                                    	{!! csrf_field() !!}
                                        <div class="form-group">
                                            <label>
                                                Enter Old Password :
                                            </label>
                                            <input class="form-control" type="text" name="current_password" required />
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Enter New Password :
                                            </label>
                                            <input class="form-control" type="password" name="password" required />
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Confirm Password :
                                            </label>
                                            <input class="form-control" type="password" name="password_confirmation" />
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm center-block">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
