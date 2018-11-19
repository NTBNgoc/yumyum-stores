<header>
 <div class="header-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-12"> 
                <!-- Header Logo -->
                <div class="logo">
                    <a title="YumYum Restaurant" href="index"><img alt="YumYum Restauran" src="client/images/logo1.png" ></a>
                </div>
                <!-- End Header Logo --> 
            </div>
            <div class="col-lg-9 col-xs-12 right_menu">
                <div class="toplinks"> 
                    <div class="links"> 
                        @if(Auth::check())
                            <div class="login">
                                <a href="#"><span class="hidden-xs">Chào bạn {{ Auth::user()->username }}</span></a>
                            </div>
                            <div class="login">
                                <a href="{{ route('getHistoryOrder') }}"><span class="hidden-xs">{{trans('messeage.history_order')}}</span></a>
                            </div>
                            <div class="login">
                                <a href="{{ route('user.getLogout') }}"><span class="hidden-xs">{{trans('messeage.logout')}}</span></a>
                            </div>
                        @else
                            <div class="login">
                                <a href="{{ route('user.getLogin') }}"><span class="hidden-xs">{{trans('messeage.login')}}</span></a>
                            </div>
                            <div class="login">
                                <a href="{{ route('user.getRegister') }}"><span class="hidden-xs">{{trans('messeage.register')}}</span></a>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Search-col -->
                <div class="search-box pull-right">
                    {!! Form::open(['method' => 'GET', 'route' => 'search']) !!}
                        {!! Form::text('search', '', ['placeholder' => 'Search...', 'id' => 'search']) !!}
                        {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
                <!-- End Search-col --> 
            </div>
        </div>
    </div>
</div>
</header>
<!-- Navbar(Menu) -->
<nav>
    <div class="container">
        <div class="row">
            <div class="nav-inner col-lg-12">
                <ul id="nav" class="hidden-xs">
                    <li class="level0 parent drop-menu active"><a href="{{ route('home') }}"><span>{{trans('messeage.home')}}</span></a></li>
                    <li class="level0 parent drop-menu "><a href="{{ route('about') }}"><span>{{trans('messeage.about')}}</span></a></li>
                    <li class="level0 parent drop-menu"><a href="#"><span>{{trans('messeage.product')}}</span></a>
                        <ul class="level1">
                            @foreach($types as $type)
                                <li class="level1 nav-10-3"><a href="{{ route('food-type', $type->id) }}"><span>{{ $type->name}}</span></a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="level0 parent drop-menu "><a href="#"><span>{{trans('messeage.promotions')}}</span></a></li>
                    <li class="level0 parent drop-menu "><a href="{{ route('contact') }}"><span>{{trans('messeage.contact')}}</span></a></li>
                </ul>
                <!-- End Navbar(Menu) -->
                <div class="menu_top">
                    <div class="top-cart-contain pull-right"> 
                      <!-- Top Cart -->
                        <div class="mini-cart">
                            <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                                <a href="#"><span class="hidden-xs">{{trans('messeage.cart')}}({{ count($cart) }})</span></a>
                            </div>
                            <div class="top-cart-content" style="display: none;">
                                <div class="block-subtitle">
                                    <div class="top-subtotal">{{ count($cart) }} items <span class="price">{{ $total }} VNĐ</span> </div>
                                    <!--top-subtotal-->
                                    <div class="pull-right">
                                        <a href="{{ route('shop-cart') }}">
                                            {!! Form::button( trans('messeage.view_cart'), ['title' => 'View Cart', 'class' => 'view-cart'] ) !!}
                                        </a> 
                                    </div>
                                    <!--pull-right--> 
                                </div>
                                <!--block-subtitle-->
                                <ul class="mini-products-list" id="cart-sidebar">
                                    @if(count($cart) != 0)
                                        @foreach($cart as $item)
                                            <li class="item first">
                                                <div class="item-inner"><a class="product-image" title="{{ $item->name }}" href="#l"><img alt="Sample Product" src="/{{ config('image.paths.resource')}}/{{ $item->options->img }}"></a>
                                                    <div class="product-details">
                                                        <strong>{{ $item->qty }}</strong> x <span class="price">{{ number_format($item->price,0,",",".") }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                            <div class="actions">
                                                <a href="{{ route('checkout.getCheckout') }}">
                                                    {!! Form::button(trans('messeage.checkout'), ['title' => 'Checkout', 'class' => 'btn-checkout']) !!}
                                                </a>
                                            </div>
                                    @else 
                                        <li class="item first">
                                            <h4 class="pull-left">Không có sản phẩm</h4>
                                        </li>
                                    @endif
                                </ul>
                                <!--actions--> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- end nav --> 
