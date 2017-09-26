@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Chi tiết sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Product</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="{{ url("/") }}/public/source/image/product/{{$ct_san_pham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$ct_san_pham->name}}</p>
								<p class="single-item-price">
									@if($ct_san_pham->promotion_price==0)
                                            <span class="flash-sale">{{number_format($ct_san_pham->unit_price)}} đồng</span>
                                            @else
                                            <span class="flash-del">{{number_format($ct_san_pham->unit_price) }} đồng</span>
                                            <span class="flash-sale">{{number_format($ct_san_pham->promotion_price)}} đồng</span>
											@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$ct_san_pham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							
							<div class="single-item-options">
								
								<a class="add-to-cart" href="{{route('them-gio-hang',$ct_san_pham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mổ tả</a></li>
							<li><a href="#tab-reviews">Đánh giá (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
						<p>
							<b>Thông tin dinh dưỡng</b> <br>
						
							Giá trị dinh dưỡng 100 g<br>
							Calo (kcal) 304<br>
							Lipid 19 g	<br>
							Cholesterol 5 mg	<br>
							Natri 136 mg	<br>
							Kali 127 mg	<br>
							Cacbohydrat 34 g	<br>
							Chất xơ 2 g	<br>
							Protein 2,6 g	<br>
							Vitamin A	0 IU	Vitamin C	0 mg<br>
							Canxi	36 mg	Sắt	1,1 mg<br>
							Vitamin B6	0 mg	Vitamin B12	0 µg<br>
							Magie	21 mg		
							</p>

							
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm cùng loại</h4>

						<div class="row">
						@foreach($sp_tuong_tu as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
								@if($sptt->promotion_price!=0)
                                	<div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                @endif
									<div class="single-item-header">
										<a href="{{route('chi-tiet-san-pham',$sptt->id)}}"><img src="{{ url("/") }}/public/source/image/product/{{$sptt->image}}" height="250px" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										<p class="single-item-price">
											@if($sptt->promotion_price==0)
                                            <span class="flash-sale">{{number_format($sptt->unit_price)}} đồng</span>
                                            @else
                                            <span class="flash-del">{{number_format($sptt->unit_price) }} đồng</span>
                                            <span class="flash-sale">{{number_format($sptt->promotion_price)}} đồng</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('them-gio-hang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chi-tiet-san-pham',$sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
								
							</div>
						@endforeach	
						</div>
						<div class="row">{{$sp_tuong_tu->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm khuyến mãi</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							@foreach($san_pham_km as $spkm)

								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chi-tiet-san-pham',$spkm->id)}}" ><img src="{{ url("/") }}/public/source/image/product/{{$spkm->image}}" alt="" height='50px' width='50px'></a>

									<div class="media-body">
										{{$spkm->name}} <br>
										<span class="beta-sales-price">{{number_format($spkm->promotion_price)}}</span>
									</div>
								</div>
								
							@endforeach

							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							@foreach($san_pham_moi as $spm)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chi-tiet-san-pham',$spkm->id)}}"><img src="{{ url("/") }}/public/source//image/product/{{$spm->image}}" alt="" height='50px' width='50px'></a>
									<div class="media-body">
										{{$spm->name}} <br>
										<span class="beta-sales-price">{{number_format($spm->promotion_price==0?$spm->unit_price:$spm->unit_price)}}</span>
									</div>
								</div>
							@endforeach
								
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection