@extends('master')
@section('content')
@if(Session('dat_hang_thanh_cong'))
    <script type="text/javascript">

        alert('Đặt hàng thành công');
    </script>

@endif
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer">
            <div class="banner">
                <ul>
                    <!-- THE FIRST SLIDE -->
                    @foreach($slide as $slide)
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{ url("/") }}/public/source/image/slide/{{$slide->image}}" data-src="{{ url("/") }}/public/source/image/slide/{{$slide->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{ url("/") }}/public/source/image/slide/{{$slide->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>

                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản Phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Có {{count($san_pham_moi)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                        @foreach($san_pham_moi as $sp)
                            <div class="col-sm-3">
                                <div class="single-item">
                                @if($sp->promotion_price!=0)
                                	<div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                @endif
                                    <div class="single-item-header">
                                        <a href="{{route('chi-tiet-san-pham',$sp->id)}}"><img src="{{ url("/") }}/public/source/image/product/{{$sp->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$sp->name}}</p>
                                        <p class="single-item-price">
                                        	@if($sp->promotion_price==0)
                                            <span class="flash-sale">{{number_format($sp->unit_price)}} đồng</span>
                                            @else
                                            <span class="flash-del">{{number_format($sp->unit_price) }} đồng</span>
                                            <span class="flash-sale">{{number_format($sp->promotion_price)}} đồng</span>
											@endif

                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('them-gio-hang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chi-tiet-san-pham',$sp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="space50">&nbsp;</div>
                            </div>

                        @endforeach 
                        </div>
                        
                    </div>
                    <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khuyến mãi</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Có {{$sl_spkm}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($san_pham_km as $spkm)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>

                                    <div class="single-item-header">
                                        <a href="{{route('chi-tiet-san-pham',$spkm->id)}}"><img src="{{ url("/") }}/public/source/image/product/{{$spkm->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$spkm->name}}</p>
                                        <p class="single-item-price">
                                            <span class="flash-del">{{number_format($spkm->unit_price) }} đồng</span>
                                            <span class="flash-sale">{{number_format($spkm->promotion_price)}} đồng</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('them-gio-hang',$spkm->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chi-tiet-san-pham',$spkm->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="space50">&nbsp;</div>
                            </div>
                            @endforeach
                            
                        </div>
                        <div class="row">{{$san_pham_km->links()}}</div>
                    </div>
                    <!-- .beta-products-list -->
                </div>
            </div>
            <!-- end section with sidebar and main content -->

        </div>
        <!-- .main-content -->
    </div>
    <!-- #content -->
@endsection