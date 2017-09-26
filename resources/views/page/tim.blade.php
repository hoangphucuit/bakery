@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm tìm kiếm</h6>
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
						</ul>
					</div>
					<div class="col-sm-9">
					
						<div class="beta-products-list">
							<h4>Sản phẩm "{{$key}}"</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{count($sp_can_tim)}} sản phẩm được tìm thấy</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">

							@foreach($sp_can_tim as $sp_tim)
								<div class="col-sm-4">
									<div class="single-item">
										@if($sp_tim->promotion_price!=0)
                                			<div class="ribbon-wrapper">
                                       			 <div class="ribbon sale">Sale</div>
                                    		</div>
                               			 @endif
										<div class="single-item-header">
											<a href="{{route('chi-tiet-san-pham',$sp_tim->id)}}"><img src="public/source/image/product/{{$sp_tim->image}}" height="250px" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp_tim->name}}</p>
											<p class="single-item-price">
												@if($sp_tim->promotion_price==0)
                                            <span class="flash-sale">{{number_format($sp_tim->unit_price)}} đồng</span>
                                            @else
                                            <span class="flash-del">{{number_format($sp_tim->unit_price) }} đồng</span>
                                            <span class="flash-sale">{{number_format($sp_tim->promotion_price)}} đồng</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('them-gio-hang',$sp_tim->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chi-tiet-san-pham',$sp_tim->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="space50">&nbsp;</div>

								</div>
								@endforeach

							</div>
						
						</div> <!-- .beta-products-list -->
					
						<div class="space50">&nbsp;</div>

						
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection