<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 174 Bình Quới P27 Bình Thạnh</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 012 2626 2121</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
						<li><a href="{{route('dang-ki')}}">Đăng kí</a></li>
						<li><a href="{{route('dang-nhap')}}">Đăng nhập</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="{{ url("/") }}/public/source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('tim-kiem')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>
					<!--Gio hang-->
					
					<div class="beta-comp">
					@if(Session('cart'))
						<div class="cart">
						
							<div class="beta-select">
								<i class="fa fa-shopping-cart"></i> Giỏ hàng ({{$totalQty}}) <i class="fa fa-chevron-down"></i>
							</div>

							<div class="beta-dropdown cart-body">
							@foreach($product_cart as $spgh)
								<div class="cart-item">
									<a class='cart-item-delete' href="{{route('xoa-san-pham',$spgh['item']['id'])}}">
										<i class='fa fa-times'></i>
									</a>
									<div class="media">
										<a class="pull-left" href="#"><img src="{{ url("/") }}/public/source/image/product/{{$spgh['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$spgh['item']['name']}}</span>
											<span class="cart-item-options">Size: XS; Colar: Navy</span>
											<span class="cart-item-amount">{{$spgh['qty']}}*<span>{{$spgh['item']['unit_price']}}</span></span>
										</div>
									</div>
								</div>
							@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Session('cart')?Session('cart')->totalPrice:'0đ'}}</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('dat-hang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
						@endif
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
						<li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
						<li><a href="#">Sản phẩm</a>
							<ul class="sub-menu">
							@foreach($loai_sp as $lsp)
								<li><a href="{{route("loai-san-pham",$lsp->id)}}">{{$lsp->name}}</a></li>
							@endforeach
							</ul>
						</li>
						<li><a href="{{route('gioi-thieu')}}">Giới thiệu</a></li>
						<li><a href="{{route('lien-he')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->