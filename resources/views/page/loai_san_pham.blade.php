@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Các loại bánh</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
						@foreach($loai_sp as $lsp)
							<li><a href="{{route('loai-san-pham',$lsp->id)}}">{{$lsp->name}}</a></li>
						@endforeach
							<!--<li class="is-active"><a href="#">Custom callout box</a></li>-->
							
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4 class='text-danger'>{{$ten_loai->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{count($sp_theo_loai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($sp_theo_loai as $sptl)
								<div class="col-sm-4">
									<div class="single-item">
									@if($sptl->promotion_price!=0)
                                	<div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                	@endif
										<div class="single-item-header">
											<a href="{{route('chi-tiet-san-pham',$sptl->id)}}"><img src="{{ url("/") }}/public/source/image/product/{{$sptl->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sptl->name}}</p>
											<p class="single-item-price">
												
											@if($sptl->promotion_price==0)
                                            <span class="flash-sale">{{number_format($sptl->unit_price)}} đồng</span>
                                            @else
                                            <span class="flash-del">{{number_format($sptl->unit_price) }} đồng</span>
                                            <span class="flash-sale">{{number_format($sptl->promotion_price)}} đồng</span>
											@endif


											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chi-tiet-san-pham',$sptl->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="space50">&nbsp;</div>
								</div>
							@endforeach	
							</div>
						</div> <!-- .beta-products-list -->

						

						<div class="beta-products-list">
							<h4 class="text-danger">Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{$sl_sp_khac}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($sp_khac as $spk)
								<div class="col-sm-4">
									<div class="single-item">
										@if($spk->promotion_price!=0)
	                                		<div class="ribbon-wrapper">
	                                        	<div class="ribbon sale">Sale</div>
	                                    	</div>
                                		@endif
										<div class="single-item-header">
											<a href="{{route('chi-tiet-san-pham',$spk->id)}}"><img src="{{ url("/") }}/public/source/image/product/{{$spk->image}}" height="250px" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$spk->name}}</p>
											<p class="single-item-price">
												@if($spk->promotion_price==0)
	                                            	<span class="flash-sale">{{number_format($spk->unit_price)}} đồng</span>
	                                            	@else
	                                            	<span class="flash-del">{{number_format($spk->unit_price) }} đồng</span>
	                                            	<span class="flash-sale">{{number_format($spk->promotion_price)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chi-tiet-san-pham',$spk->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="space40">&nbsp;</div>
								</div>
							@endforeach	
							</div>
							<div class="row">{{$sp_khac->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection