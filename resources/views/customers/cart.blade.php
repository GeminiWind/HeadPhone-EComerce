@extends('layouts.customer.master')
@section('title', 'Headphone.Dev- Your Cart')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>

<div class="container">
	<div id="content">
		<form action="{{ route('checkout') }}" method="post" class="beta-form-checkout">
			{!! csrf_field() !!}
			
			<div class="row">
				<div class="col-sm-6">
					<h4>Đặt hàng</h4>
					<div class="space20">&nbsp;</div>
						<div class="form-block">
						<label>Thông tin người nhận  </label>
						@if(Auth::guard('web')->check() && Auth::guard('web')->user()->address && Auth::guard('web')->user()->telephone)
						<input id="receiver_type" type="radio" class="input-radio" name="receiver_type" value="auth" checked="checked" style="width: 10%"><span>tài khoản</span>
						<input id="receiver_type" type="radio" class="input-radio" name="receiver_type" value="manually" style="width: 10%"><span>Thông tin khác</span>
						@else
						<input id="receiver_type" type="radio" class="input-radio" name="receiver_type" value="manually" style="width: 10%" checked><span>Thông tin khác</span>
						@endif
									
					</div>
					<div class="form-block">
						<label for="name">Họ tên*</label>
						<input type="text" name="name" placeholder="Họ tên" \>
					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email" \ placeholder="expample@gmail.com">
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="address" name="address" placeholder="Street Address" \>
					</div>
					

					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" id="phone" name="telephone" \>
					</div>
					
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea id="note" name="note"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
								@foreach(Cart::content() as $item)
								<!--  one item	 -->
									<div class="media">
										<img width="25%" src="{{ Config::get('headphone.products', '/images/products/')}}{{ $item->options->main_image}}" alt="" class="pull-left">
										<div class="media-body">
											<p class="font-large">{{ $item->name }}</p>
											<span class="color-gray your-order-info">Đơn giá: {{number_format($item->price)}} đồng</span>
											<span class="color-gray your-order-info">Số lượng: {{$item->qty}}</span>
										</div>
									</div>
								<!-- end one item -->
								@endforeach
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
								<div class="pull-right"><h5 class="color-black">@if(Cart::count()>0){{Cart::subtotal(0,'','.')}} @else 0 @endif đồng</h5></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
						
						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="SHIP" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>						
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ TK: Nguyễn A
										<br>- Ngân hàng ACB, Chi nhánh TPHCM
									</div>						
								</li>
								
							</ul>
						</div>

						<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@stop