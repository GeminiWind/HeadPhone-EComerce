<div id="header">
<<<<<<< HEAD
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li>
                        <a href="">
                            <i class="fa fa-home">
                            </i>
                            3D Duy Tân - Hà Nội
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-phone">
                            </i>
                            0123456789
                        </a>
                    </li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                </ul>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!-- .container -->
    </div>
    <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo">
                    <img alt="" src="customer/images/logo-htd.png" width="200px"/>
                </a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">
                </div>
                <div class="beta-comp">
                    <form action="/" id="searchform" method="get" role="search">
                        <input id="s" name="s" placeholder="Nhập từ khóa..." type="text" value=""/>
                        <button class="fa fa-search" id="searchsubmit" type="submit">
                        </button>
                    </form>
                </div>
                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select">
                            <i class="fa fa-shopping-cart">
                            </i>
                            Giỏ hàng
                        </div>
                        <div class="beta-dropdown cart-body">
                        </div>
                    </div>
                    <!-- .cart -->
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!-- .container -->
    </div>
    <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#">
                <span class="beta-menu-toggle-text">
                    Menu
                </span>
                <i class="fa fa-bars">
                </i>
            </a>
            <div class="visible-xs clearfix">
            </div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li>
                        <a href="">
                            Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Kiểu tai nghe
                        </a>
                        <ul class="sub-menu">
                        </ul>
                    </li>
                    <li>
                        <a href="">
                            Giới thiệu
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Liên hệ
                        </a>
                    </li>
                </ul>
                <div class="clearfix">
                </div>
            </nav>
        </div>
        <!-- .container -->
    </div>
    <!-- .header-bottom -->
</div>
<!-- #header -->
=======
	<div class="header-top">
		<div class="container">
			<div class="pull-left auto-width-left">
				<ul class="top-menu menu-beta l-inline">
					<li><a href=""><i class="fa fa-home"></i> 3D Duy Tân - Hà Nội</a></li>
					<li><a href=""><i class="fa fa-phone"></i> 0123456789</a></li>
				</ul>
			</div>
			<div class="pull-right auto-width-right">
				<ul class="top-details menu-beta l-inline">
					
					{{-- @if(Auth::check())
						<li><a href="">Chào bạn {{Auth::user()->full_name}}</a></li>
						<li><a href="{{route('logout')}}">Đăng xuất</a></li>
					@else --}}
						<li><a href="{{-- {{route('signin')}} --}}">Đăng kí</a></li>
						<li><a href="{{-- {{route('login')}} --}}">Đăng nhập</a></li>
					{{-- @endif --}}
				</ul>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-top -->
	<div class="header-body">
		<div class="container beta-relative">
			<div class="pull-left">
				<a href="index.html" id="logo"><img src="customer/images/logo-htd.png" width="200px" alt=""></a>
			</div>
			<div class="pull-right beta-components space-left ov">
				<div class="space10"></div>
				<div class="beta-comp">
					<form role="search" method="get" id="searchform" action="/">
						<input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
						<button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</form>
				</div>

				<div class="beta-comp">
					
					<div class="cart">
						<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng </div>
						<div class="beta-dropdown cart-body">
							
							
						</div>
					</div> <!-- .cart -->
				</div>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-body -->
	<div class="header-bottom" style="background-color: #0277b8;">
		<div class="container">
			<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
			<div class="visible-xs clearfix"></div>
			<nav class="main-menu">
				<ul class="l-inline ov">
					<li><a href="">Trang chủ</a></li>
					<li><a href="#">Kiểu tai nghe</a>
						<ul class="sub-menu">

						</ul>
					</li>
					<li><a href="">Giới thiệu</a></li>
					<li><a href="">Liên hệ</a></li>
				</ul>
				<div class="clearfix"></div>
			</nav>
		</div> <!-- .container -->
	</div> <!-- .header-bottom -->
	</div> <!-- #header -->
>>>>>>> ThangNT update header.blade, bat luc voi ubuntu
