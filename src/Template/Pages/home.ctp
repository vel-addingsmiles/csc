
<!-- Hero Section Start -->
<div class="hero-slider section">

  <?php foreach ($banners as $key => $banner) { ?>
    <!-- Hero Item Start -->
    <div class="hero-item" style="background-image: url('<?php echo $this->Url->build('/uploads/slider/'.$banner['image']); ?>')">
        <!-- <div class="container">
            <div class="row">
                <div class="hero-content-wrap col">
                    <div class="hero-content text-center">
                        <h2>BEARD OIL</h2>
                        <h1>FOR GLOSSY AND <br>STYLISH BEARD</h1>
                        <a class="btn btn-round btn-lg btn-theme" href="shop.php">SHOP NOW</a>
                    </div>
                    <div class="hero-image">
                        <img src="assets/images/slider/slider-product-1.png" alt="">
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    
  <?php } ?>
    

</div>
<!-- About Section Start -->
<div
    class="about-section section position-relative pt-90 pb-60 pt-lg-80 pb-lg-50 pt-md-70 pb-md-40 pt-sm-60 pb-sm-30 pt-xs-50 pb-xs-20 fix">
    <!-- About Section Shape -->
    <div class="about-shape one rellax" data-rellax-speed="-5" data-rellax-percentage="0.5"><img
            src="<?php echo $this->Url->build('/front_end/assets/images/shape/about-shape-1.png') ?>" alt=""></div>
    <div class="about-shape two rellax" data-rellax-speed="3" data-rellax-percentage="0.5"><img
            src="<?php echo $this->Url->build('/front_end/assets/images/shape/about-shape-2.png') ?>" alt=""></div>
    <div class="container">
        <div class="row align-items-center">
            <!-- About Image Start -->
            <div class="col-lg-6 col-12 order-1 order-lg-2 mb-30">
                <div class="about-image masonry-grid row row-7">
                    <div class="col-6 col"><img src="<?php echo $this->Url->build('/front_end/assets/images/about/about-1-1.jpg') ?>" alt=""></div>
                    <div class="col-6 col"><img src="<?php echo $this->Url->build('/front_end/assets/images/about/about-1-2.jpg') ?>" alt=""></div>
                    <div class="col-6 col"><img src="<?php echo $this->Url->build('/front_end/assets/images/about/about-1-3.jpg') ?>" alt=""></div>
                    <div class="col-6 col"><img src="<?php echo $this->Url->build('/front_end/assets/images/about/about-1-4.jpg') ?>" alt=""></div>
                </div>
            </div>
            <!-- About Image End -->
            <!-- About Content Start -->
            <div class="col-lg-6 col-12 mr-auto order-2 order-lg-1 mb-30">
                <div class="about-content about-content-1">
                    <h3>Provide the best</h3>
                    <h1>Beard Oil For You</h1>
                    <div class="desc">
                        <p>We provide the best Beard oil all over the worl. We are the world best store for Beard Oil.
                            You can buy our product witho ut any hegitation because we always consus about our product
                            quality and always maintain it properly so your can trust</p>
                        <p>Some of our customer say’s that they trust us and buy our product without any hagitation
                            because they belive</p>
                    </div>
                    <a href="<?php echo $this->Url->build('/about-us'); ?>" class="btn btn-lg btn-round">Learn More</a>
                </div>
            </div>
            <!-- About Content End -->
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Product Section Start -->
<div class="product-section section pb-90 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <!-- Section Title Start -->
        <div class="row">
            <div class="col">
                <div class="section-title left mb-60 mb-xs-40">
                    <h1>New Arrivals</h1>
                    <p>Some of our customer say’s that they trust us and buy our product without any hagitation because
                        they belive us and always happy to buy our product.</p>
                </div>
            </div>
        </div>
        <!-- Section Title End -->
        <div class="row">
            <!-- Product Slider 4 Column Start-->
            <div class="product-slider product-slider-4 section">
                <!-- Product Item Start -->
                
              <?php foreach ($products as $key => $product) {  ?>
                <div class="col">
                    <div class="product-item">
                        <!-- Image -->
                        <div class="product-image">
                            <!-- Image -->
                            <a href="<?php echo $this->Url->build('/products/view/'.$product['slug']) ?>" class="image"><img src="<?php echo $this->Url->build('/uploads/products/'.$product['product_image_1']); ?>"
                                    alt=""></a>
                            <!-- Product Action -->
                            <div class="product-action">
                                <a href="<?php echo $this->Url->build('/products/my-cart') ?>" class="cart"><span></span></a>
                                <a href="<?php echo $this->Url->build('/products/addTowish/'.$product['id']) ?>" class="wishlist"><span></span></a>
                                <a href="javascript:void(0);" class="quickview"><span></span></a>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="product-content">
                            <div class="head">
                                <!-- Title -->
                                <div class="top">
                                    <h4 class="title"><a href="<?php echo $this->Url->build('/products/view/'.$product['slug']) ?>"><?php echo $product['product_name']; ?></a></h4>
                                </div>
                                <!-- Price & Ratting -->
                                <div class="bottom">
                                    <span class="price">$<?php echo $product['price']; ?> <span class="old">$<?php echo $product['cost_per_item']; ?></span></span>
                                    <span class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <?php } ?>
                <!-- Product Item End -->
            </div>
            <!-- Product Slider 4 Column Start-->
        </div>
    </div>
</div>
<!-- Product Section End -->

<!-- Banner Section Start -->
<div class="banner-section section pb-90 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner"><a href="javascript:void(0);"><img src="<?php echo $this->Url->build('/front_end/assets/images/banner/banner-1.jpg') ?>"
                            alt=""></a></div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->

<!-- Subscribe Section Start -->
<div
    class="subscribe-section section position-relative pt-70 pb-70 pt-md-60 pb-md-60 pt-sm-50 pb-sm-50 pt-xs-50 pb-xs-50 fix">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="subscribe-wrap">
                    <h3>Special <span>Offers</span> for Subscription</h3>
                    <h1>GET INSTANT DISCOUNT FOR MEMBERSHIP</h1>
                    <p>Subscribe our newsletter and get all latest news abot our latest <br> products, promotions,
                        offers and discount</p>
                    <form id="mc-form" class="mc-form subscribe-form">
                        <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email here" />
                        <button id="mc-submit">submit</button>
                    </form>
                    <!-- mailchimp-alerts Start -->
                    <div class="mailchimp-alerts text-centre">
                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                    </div>
                    <!-- mailchimp-alerts end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Subscribe Section End -->

<!-- Testimonial Section Start -->
<div
    class="testimonial-section section pt-90 pb-90 pt-lg-80 pb-lg-80 pt-md-70 pb-md-70 pt-sm-60 pb-sm-60 pt-xs-50 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial-section-title section-title">
                    <h1>Our Clients Review</h1>
                </div>
            </div>
            <div class="col-lg-5 col-12 pl-40">
                <div class="testimonial-image-slider">
                    <div class="testimonial-image"><img src="<?php echo $this->Url->build('/front_end/assets/images/testimonial/testimonial-1.jpg') ?>" alt=""></div>
                    <div class="testimonial-image"><img src="<?php echo $this->Url->build('/front_end/assets/images/testimonial/testimonial-2.jpg') ?>" alt=""></div>
                </div>
            </div>
            <div class="col-lg-7 col-12">
                <div class="testimonial-content-slider">
                    <div class="testimonial-content">
                        <p>We provide the best Beard oil all over the worl. We are the world best store for Beard Oil.
                            You can buy our product without any hegitation because we always consus about our product
                            quality and always maintain it properly so your can trust and this is our main goal we
                            belive that...</p>
                        <h4>Zachary Harrison</h4>
                        <span>CEO, ASEKHA</span>
                    </div>
                    <div class="testimonial-content">
                        <p>We provide the best Beard oil all over the worl. We are the world best store for Beard Oil.
                            You can buy our product without any hegitation because we always consus about our product
                            quality and always maintain it properly so your can trust and this is our main goal we
                            belive that...</p>
                        <h4>Justin Ramos</h4>
                        <span>COO, ASEKHA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Section End -->

<!-- Brand Section Start -->
<div class="brand-section section pb-90 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="brand-slider section">
                <div class="brand-item col"><img src="assets/images/brands/brand-1.png" alt=""></div>
                <div class="brand-item col"><img src="assets/images/brands/brand-2.png" alt=""></div>
                <div class="brand-item col"><img src="assets/images/brands/brand-3.png" alt=""></div>
                <div class="brand-item col"><img src="assets/images/brands/brand-4.png" alt=""></div>
                <div class="brand-item col"><img src="assets/images/brands/brand-5.png" alt=""></div>
            </div>
        </div>
    </div>
</div>
<!-- Brand Section End -->

<!-- Service Section Start -->
<div class="service-section section pl-15 pr-15 pl-lg-30 pr-lg-30 pl-md-30 pr-md-30">
    <div class="service-container">
        <div class="row ml-0 mr-0">
            <div class="service col-xl-3 col-md-6 col-12">
                <div class="icon"></div>
                <div class="content">
                    <h3>Free home delivery</h3>
                    <p>Provide free home delivery for all product over $100</p>
                </div>
            </div>
            <div class="service col-xl-3 col-md-6 col-12">
                <div class="icon"></div>
                <div class="content">
                    <h3>Quality Products</h3>
                    <p>We ensure the product quality that is our main goal</p>
                </div>
            </div>
            <div class="service col-xl-3 col-md-6 col-12">
                <div class="icon"></div>
                <div class="content">
                    <h3>3 Days Return</h3>
                    <p>Return product within 3 days for any product you buy</p>
                </div>
            </div>
            <div class="service col-xl-3 col-md-6 col-12">
                <div class="icon"></div>
                <div class="content">
                    <h3>Online Support</h3>
                    <p>We ensure the product quality that you can trust easily</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service Section End -->
