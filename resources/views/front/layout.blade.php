<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title')</title>
    <link href="{{asset('front_assets/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('front_assets/css/bootstrap.css')}}" rel="stylesheet">   
    <link href="{{asset('front_assets/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/jquery.simpleLens.css')}}">    
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/nouislider.css')}}">
    <link id="switcher" href="{{asset('front_assets/css/theme-color/default-theme.css')}}" rel="stylesheet">
    <link href="{{asset('front_assets/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('front_assets/css/style.css')}}" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
    <script>
    var PRODUCT_IMAGE="{{asset('storage/media/')}}";
    </script>

  </head>
  <body class="productPage"> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span> +250 784 675 848 </p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li class="hidden-xs"><a href="{{url('/cart')}}">My Cart</a></li>
                  @if(session()->has('FRONT_USER_LOGIN')!=null)
                  <li><a href="{{url('/order')}}">My Order</a></li>
                  <li><a href="{{url('/logout')}}">Logout</a></li>
                  @else
                    <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  @endif
                  

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="{{url('/')}}">
                  <span class="fa fa-shopping-cart"></span>
                  <p>E<strong>Commerce</strong> <span>Data analysis & forecast</span></p>
                </a>
                <!-- img based logo -->
                 {{-- <a href="javascript:void(0)"><img src="{{asset('front_assets/img/e-comm-logo.jpeg')}}" alt="logo img"></a>  --}}
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              @php
              $getAddToCartTotalItem=getAddToCartTotalItem();
              $totalCartItem=count($getAddToCartTotalItem);
              $totalPrice=0;
              @endphp 
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#" id="cartBox">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify">{{$totalCartItem}}</span>
                </a>
                <div class="aa-cartbox-summary">
               @if($totalCartItem>0)
                
                  <ul>
                    @foreach($getAddToCartTotalItem as $cartItem)

                    @php
                    $totalPrice=$totalPrice+($cartItem->qty*$cartItem->price)
                    @endphp
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="{{asset('storage/media/'.$cartItem->image)}}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">{{$cartItem->name}}</a></h4>
                        <p> <b>{{$cartItem->qty}} * {{$cartItem->price}}</b> Rwf</p>
                      </div>
                    </li>
                    @endforeach                  
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                       <b>{{$totalPrice}}</b> Rwf
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="{{url('/cart')}}">Cart</a>
               
                @endif
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" id="search_str" placeholder="Search here ex. 'man' ">
                  <button type="button" onclick="funSearch()"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            {!! getTopNavCat() !!}
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
  <!-- Start slider -->
  
  @section('container')
  @show      
  
  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Kimironko KG, Kigali</p>
                      <p><span class="fa fa-phone"></span>+250 784 675 848</p>
                      <p><span class="fa fa-envelope"></span>ecommercedataanalysis@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="/">MUKESHIMANA Nadine</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->
  @php
  if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pwd'])){
    $login_email=$_COOKIE['login_email'];
    $login_pwd=$_COOKIE['login_pwd'];
    $is_remember="checked='checked'";
  } else{
    $login_email='';
    $login_pwd='';
    $is_remember="";
  }   

  @endphp    
  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <div id="popup_login">
            <h4>Login or Register</h4>
            <form class="aa-login-form" id="frmLogin">
              <label for="">Email address<span>*</span></label>
              <input type="email" placeholder="Email" name="str_login_email" required value="{{$login_email}}">
              <label for="">Password<span>*</span></label>
              <input type="password" placeholder="Password" name="str_login_password" required value="{{$login_pwd}}">
              <button class="aa-browse-btn" type="submit" id="btnLogin">Login</button>
              <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme" name="rememberme" {{$is_remember}}> Remember me </label>

              <div id="login_msg"></div>

              <p class="aa-lost-password"><a href="javascript:void(0)" onclick="forgot_password()">Lost your password?</a></p>
              
              <div class="aa-register-now">
                Don't have an account?<a href="{{url('registration')}}">Register now!</a>
              </div>
              @csrf
            </form>
          </div>
          <div id="popup_forgot" style="display:none;">
            <h4>Forgot Password</h4>
            <form class="aa-login-form" id="frmForgot">
              <label for="">Email address<span>*</span></label>
              <input type="email" placeholder="Email" name="str_forgot_email" required>
              <button class="aa-browse-btn" type="submit" id="btnForgot">Submit</button>
              <br><br>
              <div id="forgot_msg"></div>
             
              <div class="aa-register-now">
                Login Form?<a href="javascript:void(0)" onclick="show_login_popup()">Login now!</a>
              </div>
              @csrf
            </form>
          </div>

        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="{{asset('front_assets/js/bootstrap.js')}}"></script>  
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.smartmenus.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.smartmenus.bootstrap.js')}}"></script>  
  <script src="{{asset('front_assets/js/sequence.js')}}"></script>
  <script src="{{asset('front_assets/js/sequence-theme.modern-slide-in.js')}}"></script>  
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.simpleLens.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/slick.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/nouislider.js')}}"></script>
  <script src="{{asset('front_assets/js/custom.js')}}">
  
  /** 
  * Template Name: Daily Shop
  * Version: 1.0  
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS
  

  1. CARTBOX
  2. TOOLTIP
  3. PRODUCT VIEW SLIDER 
  4. POPULAR PRODUCT SLIDER (SLICK SLIDER) 
  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  6. LATEST PRODUCT SLIDER (SLICK SLIDER) 
  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  9. PRICE SLIDER  (noUiSlider SLIDER)
  10. SCROLL TOP BUTTON
  11. PRELOADER
  12. GRID AND LIST LAYOUT CHANGER 
  13. RELATED ITEM SLIDER (SLICK SLIDER)

  
**/

jQuery(function ($) {
    /* ----------------------------------------------------------- */
    /*  1. CARTBOX 
  /* ----------------------------------------------------------- */

    jQuery(".aa-cartbox").hover(
        function () {
            jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
        },
        function () {
            jQuery(this).find(".aa-cartbox-summary").fadeOut(500);
        }
    );

    /* ----------------------------------------------------------- */
    /*  2. TOOLTIP
  /* ----------------------------------------------------------- */
    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('[data-toggle2="tooltip"]').tooltip();

    /* ----------------------------------------------------------- */
    /*  3. PRODUCT VIEW SLIDER 
  /* ----------------------------------------------------------- */

    jQuery("#demo-1 .simpleLens-thumbnails-container img").simpleGallery({
        loading_image: "demo/images/loading.gif",
    });

    jQuery("#demo-1 .simpleLens-big-image").simpleLens({
        loading_image: "demo/images/loading.gif",
    });

    /* ----------------------------------------------------------- */
    /*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

    jQuery(".aa-popular-slider").slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

    /* ----------------------------------------------------------- */
    /*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

    jQuery(".aa-featured-slider").slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

    /* ----------------------------------------------------------- */
    /*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */
    jQuery(".aa-latest-slider").slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

    /* ----------------------------------------------------------- */
    /*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

    jQuery(".aa-testimonial-slider").slick({
        dots: true,
        infinite: true,
        arrows: false,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
    });

    /* ----------------------------------------------------------- */
    /*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

    jQuery(".aa-client-brand-slider").slick({
        dots: false,
        infinite: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

    /* ----------------------------------------------------------- */
    /*  9. PRICE SLIDER  (noUiSlider SLIDER)
  /* ----------------------------------------------------------- */

    jQuery(function () {
        if ($("body").is(".productPage")) {
            var skipSlider = document.getElementById("skipstep");

            var filter_price_start = jQuery("#filter_price_start").val();
            var filter_price_end = jQuery("#filter_price_end").val();

            if (filter_price_start == "" || filter_price_end == "") {
                var filter_price_start = 100;
                var filter_price_end = 1700;
            }

            noUiSlider.create(skipSlider, {
                range: {
                    min: 0,
                    "10%": 100,
                    "20%": 300,
                    "30%": 500,
                    "40%": 700,
                    "50%": 900,
                    "60%": 1100,
                    "70%": 1300,
                    "80%": 1500,
                    "90%": 1700,
                    max: 1900,
                },
                snap: true,
                connect: true,
                start: [filter_price_start, filter_price_end],
            });
            // for value print
            var skipValues = [
                document.getElementById("skip-value-lower"),
                document.getElementById("skip-value-upper"),
            ];

            skipSlider.noUiSlider.on("update", function (values, handle) {
                skipValues[handle].innerHTML = values[handle];
            });
        }
    });

    /* ----------------------------------------------------------- */
    /*  10. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

    //Check to see if the window is top if not then display button

    jQuery(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".scrollToTop").fadeIn();
        } else {
            $(".scrollToTop").fadeOut();
        }
    });

    //Click event to scroll to top

    jQuery(".scrollToTop").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 800);
        return false;
    });

    /* ----------------------------------------------------------- */
    /*  11. PRELOADER
  /* ----------------------------------------------------------- */

    jQuery(window).load(function () {
        // makes sure the whole site is loaded
        jQuery("#wpf-loader-two").delay(200).fadeOut("slow"); // will fade out
    });

    /* ----------------------------------------------------------- */
    /*  12. GRID AND LIST LAYOUT CHANGER 
  /* ----------------------------------------------------------- */

    jQuery("#list-catg").click(function (e) {
        e.preventDefault(e);
        jQuery(".aa-product-catg").addClass("list");
    });
    jQuery("#grid-catg").click(function (e) {
        e.preventDefault(e);
        jQuery(".aa-product-catg").removeClass("list");
    });

    /* ----------------------------------------------------------- */
    /*  13. RELATED ITEM SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

    jQuery(".aa-related-item-slider").slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });
});

function change_product_color_image(img, color) {
    jQuery("#color_id").val(color);
    jQuery(".simpleLens-big-image-container").html(
        '<a data-lens-image="' +
            img +
            '" class="simpleLens-lens-image"><img src="' +
            img +
            '" class="simpleLens-big-image"></a>'
    );
}

function showColor(size) {
    jQuery("#size_id").val(size);
    jQuery(".product_color").hide();
    jQuery(".size_" + size).show();
    jQuery(".size_link").css("border", "1px solid #ddd");
    jQuery("#size_" + size).css("border", "1px solid black");
}
function home_add_to_cart(id, size_str_id, color_str_id) {
    jQuery("#color_id").val(color_str_id);
    jQuery("#size_id").val(size_str_id);
    add_to_cart(id, size_str_id, color_str_id);
}
function add_to_cart(id, size_str_id, color_str_id) {
    jQuery("#add_to_cart_msg").html("");
    var color_id = jQuery("#color_id").val();
    var size_id = jQuery("#size_id").val();

    if (size_str_id == 0) {
        size_id = "no";
    }
    if (color_str_id == 0) {
        color_id = "no";
    }
    if (size_id == "" && size_id != "no") {
        jQuery("#add_to_cart_msg").html(
            '<div class="alert alert-danger fade in alert-dismissible mt10"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please select size</div>'
        );
    } else if (color_id == "" && color_id != "no") {
        jQuery("#add_to_cart_msg").html(
            '<div class="alert alert-danger fade in alert-dismissible mt10"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please select color</div>'
        );
    } else {
        jQuery("#product_id").val(id);
        jQuery("#pqty").val(jQuery("#qty").val());

        console.log(jQuery("#frmAddToCart").serialize());

        jQuery.ajax({
            url: "/add_to_cart",
            data: jQuery("#frmAddToCart").serialize(),
            type: "post",
            success: function (result) {
                console.log(result);

                var totalPrice = 0;

                if (result.msg == "not_avaliable") {
                    alert(result.data);
                } else {
                    alert("Product " + result.msg);
                    if (result.totalItem == 0) {
                        jQuery(".aa-cart-notify").html("0");
                        jQuery(".aa-cartbox-summary").remove();
                    } else {
                        jQuery(".aa-cart-notify").html(result.totalItem);
                        var html = "<ul>";
                        jQuery.each(result.data, function (arrKey, arrVal) {
                            totalPrice =
                                parseInt(totalPrice) +
                                parseInt(arrVal.qty) * parseInt(arrVal.price);
                            html +=
                                '<li><a class="aa-cartbox-img" href="#"><img src="' +
                                PRODUCT_IMAGE +
                                "/" +
                                arrVal.image +
                                '" alt="img"></a><div class="aa-cartbox-info"><h4><a href="#">' +
                                arrVal.name +
                                "</a></h4><p> " +
                                arrVal.qty +
                                " * " +
                                arrVal.price +
                                " Rwf </p></div></li>";
                        });
                    }
                    html +=
                        '<li><span class="aa-cartbox-total-title">Total</span><span class="aa-cartbox-total-price">' +
                        totalPrice +
                        " RWF</span></li>";
                    html +=
                        '</ul><a class="aa-cartbox-checkout aa-primary-btn" href="cart">Cart</a>';
                    console.log(html);
                    jQuery(".aa-cartbox-summary").html(html);
                }
            },
        });
    }
}

function deleteCartProduct(pid, size, color, attr_id) {
    jQuery("#color_id").val(color);
    jQuery("#size_id").val(size);
    jQuery("#qty").val(0);
    add_to_cart(pid, size, color);
    //jQuery('#total_price_'+attr_id).html('Rs '+qty*price);
    jQuery("#cart_box" + attr_id).hide();
}

function updateQty(pid, size, color, attr_id, price) {
    jQuery("#color_id").val(color);
    jQuery("#size_id").val(size);
    var qty = jQuery("#qty" + attr_id).val();
    jQuery("#qty").val(qty);
    add_to_cart(pid, size, color);
    jQuery("#total_price_" + attr_id).html(qty * price + " RWF");
}

function sort_by() {
    var sort_by_value = jQuery("#sort_by_value").val();
    jQuery("#sort").val(sort_by_value);
    jQuery("#categoryFilter").submit();
}

function sort_price_filter() {
    jQuery("#filter_price_start").val(jQuery("#skip-value-lower").html());
    jQuery("#filter_price_end").val(jQuery("#skip-value-upper").html());
    jQuery("#categoryFilter").submit();
}

function setColor(color, type) {
    var color_str = jQuery("#color_filter").val();
    if (type == 1) {
        var new_color_str = color_str.replace(color + ":", "");
        jQuery("#color_filter").val(new_color_str);
    } else {
        jQuery("#color_filter").val(color + ":" + color_str);
        jQuery("#categoryFilter").submit();
    }

    jQuery("#categoryFilter").submit();
}

function funSearch() {
    var search_str = jQuery("#search_str").val();
    if (search_str != "" && search_str.length > 3) {
        window.location.href = "/search/" + search_str;
    }
}

jQuery("#frmRegistration").submit(function (e) {
    e.preventDefault();
    jQuery(".field_error").html("");
    jQuery.ajax({
        url: "registration_process",
        data: jQuery("#frmRegistration").serialize(),
        type: "post",
        success: function (result) {
            console.log(result);
            if (result.status == "error") {
                jQuery.each(result.error, function (key, val) {
                    jQuery("#" + key + "_error").html(val[0]);
                });
            }

            if (result.status == "success") {
                jQuery("#frmRegistration")[0].reset();
                jQuery("#thank_you_msg").html(result.msg);
            }
        },
    });
});

jQuery("#frmLogin").submit(function (e) {
    jQuery("#login_msg").html("");
    e.preventDefault();
    jQuery.ajax({
        url: "/login_process",
        data: jQuery("#frmLogin").serialize(),
        type: "post",
        success: function (result) {
            if (result.status == "error") {
                jQuery("#login_msg").html(result.msg);
            }

            if (result.status == "success") {
                window.location.href = window.location.href;
                //jQuery('#frmLogin')[0].reset();
                //jQuery('#thank_you_msg').html(result.msg);
            }
        },
    });
});

function forgot_password() {
    jQuery("#popup_forgot").show();
    jQuery("#popup_login").hide();
}

function show_login_popup() {
    jQuery("#popup_forgot").hide();
    jQuery("#popup_login").show();
}

jQuery("#frmForgot").submit(function (e) {
    jQuery("#forgot_msg").html("Please wait...");

    e.preventDefault();
    jQuery.ajax({
        url: "/forgot_password",
        data: jQuery("#frmForgot").serialize(),
        type: "post",
        success: function (result) {
            console.log(result);
            jQuery("#forgot_msg").html(result.msg);
        },
    });
});

jQuery("#frmUpdatePassword").submit(function (e) {
    jQuery("#thank_you_msg").html("Please wait...");
    jQuery("#thank_you_msg").html("");
    e.preventDefault();
    jQuery.ajax({
        url: "/forgot_password_change_process",
        data: jQuery("#frmUpdatePassword").serialize(),
        type: "post",
        success: function (result) {
            console.log(result);
            jQuery("#frmUpdatePassword")[0].reset();
            jQuery("#thank_you_msg").html(result.msg);
        },
    });
});

function applyCouponCode() {
    jQuery("#coupon_code_msg").html("");
    jQuery("#order_place_msg").html("");
    var coupon_code = jQuery("#coupon_code").val();
    if (coupon_code != "") {
        jQuery.ajax({
            type: "post",
            url: "/apply_coupon_code",
            data:
                "coupon_code=" +
                coupon_code +
                "&_token=" +
                jQuery("[name='_token']").val(),
            success: function (result) {
                console.log(result.status);
                if (result.status == "success") {
                    jQuery(".show_coupon_box").removeClass("hide");
                    jQuery("#coupon_code_str").html(coupon_code);
                    jQuery("#total_price").html(result.totalPrice + " Rwf");
                    jQuery(".apply_coupon_code_box").hide();
                } else {
                }
                jQuery("#coupon_code_msg").html(result.msg);
            },
        });
    } else {
        jQuery("#coupon_code_msg").html("Please enter coupon code");
    }
}

function remove_coupon_code() {
    jQuery("#coupon_code_msg").html("");
    var coupon_code = jQuery("#coupon_code").val();
    jQuery("#coupon_code").val("");
    if (coupon_code != "") {
        jQuery.ajax({
            type: "post",
            url: "/remove_coupon_code",
            data:
                "coupon_code=" +
                coupon_code +
                "&_token=" +
                jQuery("[name='_token']").val(),
            success: function (result) {
                if (result.status == "success") {
                    jQuery(".show_coupon_box").addClass("hide");
                    jQuery("#coupon_code_str").html("");
                    jQuery("#total_price").html("Rwf" + result.totalPrice);
                    jQuery(".apply_coupon_code_box").show();
                } else {
                }
                jQuery("#coupon_code_msg").html(result.msg);
            },
        });
    }
}

jQuery("#frmPlaceOrder").submit(function (e) {
    jQuery("#order_place_msg").html("Please wait...");

    console.log();

    e.preventDefault();
    jQuery.ajax({
        url: "/place_order",
        data: jQuery("#frmPlaceOrder").serialize(),
        type: "post",
        success: function (result) {
            if (result.status == "success") {
                if (result.payment_url != "") {
                    window.location.href = result.payment_url;
                } else {
                    window.location.href = "/order_placed";
                }
            }
            jQuery("#order_place_msg").html(result.msg);
        },
    });
});

jQuery("#frmProductReview").submit(function (e) {
    //jQuery('#thank_you_msg').html("Please wait...");
    //jQuery('#thank_you_msg').html("");
    e.preventDefault();
    jQuery.ajax({
        url: "/product_review_process",
        data: jQuery("#frmProductReview").serialize(),
        type: "post",
        success: function (result) {
            if (result.status == "success") {
                jQuery(".review_msg").html(result.msg);
                jQuery("#frmProductReview")[0].reset();
                setInterval(function () {
                    window.location.href = window.location.href;
                }, 3000);
            }
            if (result.status == "error") {
                jQuery(".review_msg").html(result.msg);
            }
            //jQuery('#frmUpdatePassword')[0].reset();
            //jQuery('#thank_you_msg').html(result.msg);
        },
    });
});

  
  </script> 



  </body>
</html>