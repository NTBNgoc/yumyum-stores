@extends('client.master')   
@section('content')   
<!-- Breadcrumbs -->
<div class="breadcrumbs bounceInUp animated">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li class="home">
                        <a title="Go to Home Page" href="index.html">{{ trans('messeage.home') }}</a>
                        <span>»</span>
                    </li>
                    <li class="">
                        <a title="Go to Home Page" href="grid.html">{{ trans('messeage.search') }}</a>
                        <span>»</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End --> 
<!-- Main Container -->
<section class="main-container col2-left-layout bounceInUp animated">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Tìm thấy {{ count($search_product) }} sản phẩm</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-main col-sm-9 col-sm-push-3">
                @if(count($search_product) == 0)
                    <h3>Không tìm thấy sản phẩm nào</h3>
                @else
                <article class="col-main">
                    <div class="category-description std">
                        <div class="slider-items-products">
                            <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col1 owl-carousel owl-theme"> 
                                    <!-- Item -->
                                    <div class="item">
                                        <a href="#"><img alt="" src="images/women_banner.png"></a>
                                        <div class="cat-img-title cat-bg cat-box">
                                            <h2 class="cat-heading"><strong>New Fashion 2015</strong><br></h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu.</p>
                                        </div>
                                    </div>
                                    <!-- End Item --> 
                                    <!-- Item -->
                                    <div class="item"> 
                                        <a href="#x"><img alt="" src="images/women_banner1.png"></a>
                                    </div>
                                    <!-- End Item --> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="toolbar">
                        <div class="sorter">
                            <div class="view-mode"> 
                                <span title="Grid" class="button button-active button-grid">&nbsp;</span>
                                <a href="list" title="List" class="button-list">&nbsp;</a> 
                            </div>
                        </div>
                        <div class="pager">
                            <div id="limiter">
                                <label>View: </label>
                                <ul>
                                    <li><a href="#">15<span class="right-arrow"></span></a>
                                        <ul>
                                            <li><a href="#">20</a></li>
                                            <li><a href="#">30</a></li>
                                            <li><a href="#">35</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="category-products">
                        <ul class="products-grid">
                            @foreach($search_product as $product)
                            <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info"> <a class="product-image" title="Sample Product" href="{{ route('food-detail', $product->id) }}"> <img alt="Sample Product" src="/{{ config('image.paths.resource')}}/{{ $product->image}}"> </a>
                                            @if($product->promotion_id != NULL)
                                            <div class="sale-label sale-top-left">{{ trans('messeage.sale') }}</div>
                                            @endif
                                            <div class="item-box-hover">
                                                <div class="box-inner">                                        
                                                    <div class="actions">
                                                        <div class="add_cart">
                                                            <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                                        </div>
                                                        <div class="product-detail-bnt">
                                                            <a href="{{ route('food-detail', $product->id) }}" class="button detail-bnt"><span>Quick View</span></a>
                                                        </div> 
                                                        <span class="add-to-links"> 
                                                            <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a>
                                                        </span> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Sample Product" href="{{ route('food-detail', $product->id) }}">{{ $product->name }}</a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box">
                                                        @if($product->promotion_id != NULL) 
                                                        <p class="old-price"><span class="price-label">Regular Price:</span> <span class="price">{{ $product->price }} VND </span> </p>
                                                        <p class="special-price"><span class="price-label">Special Price</span> <span class="price">{{ ($product->price) - ($product->price)*($product->promotion->discount)/100 }}VND </span> </p> 
                                                        @else
                                                        <p class="special-price"><span class="price-label">Regular Price:</span> <span class="price">{{ $product->price }} VND </span> </p>
                                                        @endif
                                                    </div>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="pages">
                            <div class="pager pagination">
                                {!! $search_product->links() !!}
                            </div>
                        </div>
                    </div>
                </article>
                @endif
                <!--  ///*///======    End article  ========= //*/// --> 
            </div>
            <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                <aside class="col-left sidebar">
                    <div class="side-nav-categories">
                        <div class="block-title">{{ trans('messeage.category') }}</div>
                        <!--block-title--> 
                        <!-- BEGIN BOX-CATEGORY -->
                        <div class="box-content box-category">
                            <ul>
                                @foreach($types as $type)
                                <li><a class="active" href="{{ route('food-type', $type->id) }}">{{ $type->name }}</a> </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--box-content box-category--> 
                    </div>     
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection
