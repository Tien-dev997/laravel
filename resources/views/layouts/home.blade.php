<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="{{asset('css/bootstrap/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('reset.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/carousel/owl.theme.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('style.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('responsive.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
        <script src="{{asset('js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/sweetalert.js')}}"></script>
        <script src="{{asset('js/elevatezoom-master/jquery.elevatezoom.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/carousel/owl.carousel.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/main.js')}}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    </head>
<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">
                        <a href="" title="" id="payment-link" class="fl-left">H??nh th???c thanh to??n</a>
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="{{url('/')}}" title="Trang ch???">Trang ch???</a>
                                </li>
                                {{-- <li>
                                    <a href="" title="S???n ph???m">S???n ph???m</a>
                                </li> --}}
                                <li>
                                    <a href="{{url('/24h-cong-nghe')}}" title="Blog">24h c??ng ngh???</a>
                                </li>
                                {{-- @foreach ($pages as $page)
                                <li>
                                    <a href="{{route('pages',$page->slug)}}">{{$page->name}}</a>
                                </li>
                                @endforeach --}}
                                <li>
                                    <a href="{{url('/gioi-thieu')}}" title="Gi???i thi???u">Gi???i thi???u</a>
                                </li>
                                <li>
                                    <a href="{{url('/lien-he')}}" title="Li??n h???">Li??n h???</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="{{url('/')}}" title="" id="logo" class="fl-left"><img src="{{asset('images/logo.png')}}"/></a>
                        <div id="search-wp" class="fl-left">
                            <form action="{{route('search')}}" method="GET">
                                <input type="text" name="keyword" id="s" placeholder="Nh???p t??? kh??a t??m ki???m t???i ????y!">
                                <button type="submit" id="sm-s">T??m ki???m</button>
                            </form>
                        </div>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <span class="title">T?? v???n</span>
                                <span class="phone">0987.654.321</span>
                            </div>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            <a href="{{route('cart.show')}}" title="gi??? h??ng" id="cart-respon-wp" class="fl-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="num">{{Cart::count()}}</span>
                            </a>
                            <div id="cart-wp" class="fl-right">
                                <div id="btn-cart">
                                    <a href="{{route('cart.show')}}" class="text-white"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                    <span id="num">{{Cart::count()}}</span>
                                </div>
                                <div id="dropdown">
                                    <p class="desc">C?? <span>{{Cart::count()}} s???n ph???m</span> trong gi??? h??ng</p>
                                    <ul class="list-cart">
                                        @foreach (Cart::content() as $item)
                                        <li class="clearfix">

                                            <a href="{{route('detail_product',[$item->options->slug,$item->id])}}" title="" class="thumb fl-left">
                                                <img src="{{asset('images')}}/{{$item->options->thumbnail}}" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="{{route('detail_product',[$item->options->slug,$item->id])}}" title="" class="product-name">{{Str::of($item->name)->limit(20)}}</a>
                                                <a href="{{route('detail_product',[$item->options->slug,$item->id])}}" title="" class="product-name"><p class="price">{{number_format($item->price,0,',','.')}}??</p></a>
                                                    <a href="{{route('detail_product',[$item->options->slug,$item->id])}}" title="" class="product-name"><p class="qty">S??? l?????ng: <span>{{$item->qty}}</span></p></a>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="total-price clearfix">
                                        <p class="title fl-left">T???ng:</p>
                                        <p class="price fl-right">{{number_format(Cart::total(),0,',','.')}}??</p>
                                    </div>
                                    <div class="action-cart clearfix">
                                        <a href="" title="Gi??? h??ng" class="view-cart fl-left">Gi??? h??ng</a>
                                        <a href="{{url('/checkout')}}" title="Thanh to??n" class="checkout fl-right">Thanh to??n</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
<div id="footer-wp">
    <div id="foot-body">
        <div class="wp-inner clearfix">
            <div class="block" id="info-company">
                <h3 class="title">ISMART</h3>
                <p class="desc">ISMART lu??n cung c???p lu??n l?? s???n ph???m ch??nh h??ng c?? th??ng tin r?? r??ng, ch??nh s??ch ??u ????i c???c l???n cho kh??ch h??ng c?? th??? th??nh vi??n.</p>
                <div id="payment">
                    <div class="thumb">
                        <img src="{{asset('images/img-foot.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="block menu-ft" id="info-shop">
                <h3 class="title">Th??ng tin c???a h??ng</h3>
                <ul class="list-item">
                    <li>
                        <p>106 - Tr???n B??nh - C???u Gi???y - H?? N???i</p>
                    </li>
                    <li>
                        <p>0987.654.321 - 0989.989.989</p>
                    </li>
                    <li>
                        <p>vshop@gmail.com</p>
                    </li>
                </ul>
            </div>
            <div class="block menu-ft policy" id="info-shop">
                <h3 class="title">Ch??nh s??ch mua h??ng</h3>
                <ul class="list-item">
                    <li>
                        <a href="" title="">Quy ?????nh - ch??nh s??ch</a>
                    </li>
                    <li>
                        <a href="" title="">Ch??nh s??ch b???o h??nh - ?????i tr???</a>
                    </li>
                    <li>
                        <a href="" title="">Ch??nh s??ch h???i vi??n</a>
                    </li>
                    <li>
                        <a href="" title="">Giao h??ng - l???p ?????t</a>
                    </li>
                </ul>
            </div>
            <div class="block" id="newfeed">
                <h3 class="title">B???ng tin</h3>
                <p class="desc">????ng k?? v???i ch??ng t??i ????? nh???n ???????c th??ng tin ??u ????i s???m nh???t</p>
                <div id="form-reg">
                    <form>
                        <input type="email" name="email" id="email" placeholder="Nh???p email t???i ????y">
                        <button type="button" id="sm-reg">????ng k??</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="foot-bot">
        <div class="wp-inner">
            <p id="copyright">?? B???n quy???n thu???c v??? UNIMART</p>
        </div>
    </div>
</div>
</div>
@yield('menu-respon')
{{-- <div id="menu-respon">
    <a href="{{url('/')}}" title="" class="logo">VSHOP</a>
    <div id="menu-respon-wp">
        <ul id="main-menu-respon">
            @foreach ($product_cats as $product_cat)
            {{$product_cat->name}}
                    @if ($product_cat->parent_id == 0)
                        <li>
                            <a href="{{route('product_cat',[$product_cat->slug,$product_cat->id])}}" title="">{{$product_cat->name}}</a>
                            <a href="{{route('product_cat',[$product_cat->slug])}}" title="">{{$product_cat->name}}</a>
                            @foreach ($brands as $k)
                            @if ($k->cat_id == $product_cat->id)
                            <ul class="sub-menu">
                            @foreach ($brands as $v)
                            @if ($v->cat_id == $product_cat->id)
                            <li>
                                <a href="{{route('brand',[$product_cat->slug,$v->slug])}}" title="">{{$v->name}}</a>
                            </li>
                            @endif
                            @endforeach
                            </ul>
                            @endif
                            @endforeach
                        </li>
                    @endif
            @endforeach
        </ul>
    </div>
</div> --}}
<div id="btn-top"><img src="{{asset('images/icon-to-top.png')}}" alt=""/></div>
<div id="fb-root"></div>

<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

</body>

</html>


{{-- <!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{asset('css/bootstrap/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('reset.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/carousel/owl.theme.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('style.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('responsive.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/sweetalert.css')}}" rel="stylesheet" type="text/css"/>

        <script src="{{asset('js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/elevatezoom-master/jquery.elevatezoom.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/carousel/owl.carousel.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/main.js')}}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    </head>
    <body>
        {{-- <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="payment-link" class="fl-left">H??nh th???c thanh to??n</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="{{url('/')}}" title="Trang ch???">Trang ch???</a>
                                    </li>
                                    <li>
                                        <a href="" title="S???n ph???m">S???n ph???m</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/blog')}}" title="Blog">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/gioi-thieu')}}" title="Gi???i thi???u">Gi???i thi???u</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/lien-he')}}" title="Li??n h???">Li??n h???</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="{{url('/')}}" title="" id="logo" class="fl-left"><img src="{{asset('images/logo.png')}}"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="">
                                    <input type="text" name="s" id="s" placeholder="Nh???p t??? kh??a t??m ki???m t???i ????y!">
                                    <button type="submit" id="sm-s">T??m ki???m</button>
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">T?? v???n</span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?page=cart" title="gi??? h??ng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">{{Cart::count()}}</span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num">{{Cart::count()}}</span>
                                    </div>
                                    <div id="dropdown">
                                        <p class="desc">C?? <span>{{Cart::count()}} s???n ph???m</span> trong gi??? h??ng</p>
                                        <ul class="list-cart">
                                            @foreach (Cart::content() as $item)
                                            <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                    <img src="{{asset('images')}}/{{$item->options->thumbnail}}" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name">{{$item->name}}</a>
                                                    <p class="price">{{number_format($item->price,0,',','.')}}</p>
                                                    <p class="qty">S??? l?????ng: <span>{{$item->qty}}</span></p>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">T???ng:</p>
                                            <p class="price fl-right">{{Cart::total()}}</p>
                                        </div>
                                        <div class="action-cart clearfix">
                                            <a href="" title="Gi??? h??ng" class="view-cart fl-left">Gi??? h??ng</a>
                                            <a href="?page=checkout" title="Thanh to??n" class="checkout fl-right">Thanh to??n</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
{{-- End header --}}
{{-- @yield('content')
<div id="footer-wp">
    <div id="foot-body">
        <div class="wp-inner clearfix">
            <div class="block" id="info-company">
                <h3 class="title">ISMART</h3>
                <p class="desc">ISMART lu??n cung c???p lu??n l?? s???n ph???m ch??nh h??ng c?? th??ng tin r?? r??ng, ch??nh s??ch ??u ????i c???c l???n cho kh??ch h??ng c?? th??? th??nh vi??n.</p>
                <div id="payment">
                    <div class="thumb">
                        <img src="{{asset('images/img-foot.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="block menu-ft" id="info-shop">
                <h3 class="title">Th??ng tin c???a h??ng</h3>
                <ul class="list-item">
                    <li>
                        <p>106 - Tr???n B??nh - C???u Gi???y - H?? N???i</p>
                    </li>
                    <li>
                        <p>0987.654.321 - 0989.989.989</p>
                    </li>
                    <li>
                        <p>vshop@gmail.com</p>
                    </li>
                </ul>
            </div>
            <div class="block menu-ft policy" id="info-shop">
                <h3 class="title">Ch??nh s??ch mua h??ng</h3>
                <ul class="list-item">
                    <li>
                        <a href="" title="">Quy ?????nh - ch??nh s??ch</a>
                    </li>
                    <li>
                        <a href="" title="">Ch??nh s??ch b???o h??nh - ?????i tr???</a>
                    </li>
                    <li>
                        <a href="" title="">Ch??nh s??ch h???i vi???n</a>
                    </li>
                    <li>
                        <a href="" title="">Giao h??ng - l???p ?????t</a>
                    </li>
                </ul>
            </div>
            <div class="block" id="newfeed">
                <h3 class="title">B???ng tin</h3>
                <p class="desc">????ng k?? v???i chung t??i ????? nh???n ???????c th??ng tin ??u ????i s???m nh???t</p>
                <div id="form-reg">
                    <form method="POST" action="">
                        <input type="email" name="email" id="email" placeholder="Nh???p email t???i ????y">
                        <button type="submit" id="sm-reg">????ng k??</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="foot-bot">
        <div class="wp-inner">
            <p id="copyright">?? B???n quy???n thu???c v??? unitop.vn | Php Master</p>
        </div>
    </div>
</div>
</div> --}}
{{-- <div id="menu-respon">
    <a href="?page=home" title="" class="logo">VSHOP</a>
    <div id="menu-respon-wp">
        <ul class="" id="main-menu-respon">
            <li>
                <a href="?page=home" title>Trang ch???</a>
            </li>
            <li>
                <a href="?page=category_product" title>??i???n tho???i</a>
                <ul class="sub-menu">
                    <li>
                        <a href="?page=category_product" title="">Iphone</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title="">Samsung</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?page=category_product" title="">Iphone X</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Iphone 8</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=category_product" title="">Nokia</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="?page=category_product" title>M??y t??nh b???ng</a>
            </li>
            <li>
                <a href="?page=category_product" title>Laptop</a>
            </li>
            <li>
                <a href="?page=category_product" title>????? d??ng sinh ho???t</a>
            </li>
            <li>
                <a href="?page=blog" title>Blog</a>
            </li>
            <li>
                <a href="#" title>Li??n h???</a>
            </li>
        </ul>
    </div>
</div>
<div id="btn-top"><img src="{{asset('images/icon-to-top.png')}}" alt=""/></div>
<div id="fb-root"></div> --}}

{{-- <script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script> --}}
{{-- <script>
    $(document).ready(function(){
        //num-order ph???i ?????t class kh??ng ???????c ?????t theo id n???u kh??ng n s??? ch??? l???y 1 c??i ?????u ti??n
        $('.num-order').change(function(){
            var id = $(this).attr('data-id');
            var qty = $(this).val();
            var _token = $("input[name='_token']").val();
            // var price = $, _token:_token
            var data = {id:id,qty:qty,_token:_token};
        $.ajax({
            url: "{{route('cart.ajax')}}",
            method:'POST',
            cache:false,
            data: data,
            dataType: 'json',
            success: function(data) {
                console.log(data);
            },
            error:function(xhr,ajaxOptions,throwError){
                alert(xhr.status);
                alert(throwError);
            }
        });
    });
});
</script> --}}
{{-- </body>

</html> --}}
