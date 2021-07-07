
<!-- Page Banner Section Start -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h1>Product Details</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="<?php echo $this->Url->build('/'); ?>">Home</a></li>
                        <li>Bottom Thumbnail</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Banner Section End -->

<!-- Product Section Start -->
<div
    class="product-section section pt-90 pb-90 pt-lg-80 pb-lg-80 pt-md-70 pb-md-70 pt-sm-60 pb-sm-60 pt-xs-50 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-12 order-1 order-lg-2 mb-sm-50 mb-xs-50">
                <div class="product-details mb-50">
                    <!-- Image -->
                    <div class="product-image bottom-thumbnail mb-xs-20">
                        <!-- Image -->
                        <div class="product-slider single-product-slider-syn">
                          <?php if(!empty($single_product['product_image_1'])){ ?>
                            <div class="item"><img src="<?php echo $this->Url->build('/uploads/products/'.$single_product['product_image_1']); ?>" alt=""></div>
                          <?php } ?>
                          <?php if(!empty($single_product['product_image_1'])){ ?>
                            <div class="item"><img src="<?php echo $this->Url->build('/uploads/products/'.$single_product['product_image_2']); ?>" alt=""></div>
                          <?php } ?>
                          <?php if(!empty($single_product['product_image_1'])){ ?>
                            <div class="item"><img src="<?php echo $this->Url->build('/uploads/products/'.$single_product['product_image_3']); ?>" alt=""></div>
                          <?php } ?>
                            <!-- <div class="item"><img src="assets/images/product/product-4.jpg" alt=""></div>
                            <div class="item"><img src="assets/images/product/product-5.jpg" alt=""></div> -->
                        </div>
                        <div class="product-slider single-product-thumb-slider-syn">
                          <?php if(!empty($single_product['product_image_1'])){ ?>
                            <div class="item"><img src="<?php echo $this->Url->build('/uploads/products/'.$single_product['product_image_1']); ?>" alt=""></div>
                          <?php } ?>
                          <?php if(!empty($single_product['product_image_1'])){ ?>
                            <div class="item"><img src="<?php echo $this->Url->build('/uploads/products/'.$single_product['product_image_2']); ?>" alt=""></div>
                          <?php } ?>
                          <?php if(!empty($single_product['product_image_1'])){ ?>
                            <div class="item"><img src="<?php echo $this->Url->build('/uploads/products/'.$single_product['product_image_3']); ?>" alt=""></div>
                          <?php } ?>
                            <!--<div class="item"><img src="assets/images/product/product-4.jpg" alt=""></div>
                            <div class="item"><img src="assets/images/product/product-5.jpg" alt=""></div> -->
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="product-content">
                        <div class="product-content-inner">
                            <div class="head">
                                <!-- Title-->
                                <div class="top">
                                    <h4 class="title"><?php echo $single_product['product_name']; ?></h4>
                                </div>
                                <!-- Price & Ratting -->
                                <div class="bottom">
                                    <span class="price">$<?php echo $single_product['price']; ?> <span class="old">$<?php echo $single_product['cost_per_item']; ?></span></span>
                                    <span class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="body">
                                <p>We provide the best Beard oil all over the worldd. We are the worldd best store for
                                    Beard Oil. You can buy our product without any are hegitation because we always
                                    consus about our product quality and always maintain it properly so your can trust.
                                    We are the worldd best store for Beard Oil product.</p>

                                <div class="size">
                                    <h4>Size:</h4>
                                    <button>small</button>
                                    <button>medium</button>
                                    <button>large</button>
                                </div>
                                <div class="vitamin">
                                    <h4>Vitamins:</h4>
                                    <button>Vitamin E</button>
                                    <button>Vitamin C</button>
                                    <button>Vitamin D</button>
                                </div>
                                <div class="quantity">
                                    <h4>Quantity:</h4>
                                    <div class="pro-qty"><input type="text" value="1"></div>
                                </div>
                                <!-- Product Action -->
                                <div class="product-action">
                                    <a href="<?php echo $this->Url->build('/products/my-cart') ?>" class="cart"><span></span></a>
                                    <a href="<?php echo $this->Url->build('/products/addTowish/'.$product['id']) ?>" class="wishlist"><span></span></a>
                                    <a href="javascript:void(0);" class="quickview"><span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="product-details-tab-list nav">
                    <li><a class="active" data-toggle="tab" href="#description">Description</a></li>
                    <li><a data-toggle="tab" href="#specification">Specification</a></li>
                    <li><a data-toggle="tab" href="#reviews">Reviews(15)</a></li>
                </ul>
                <div class="product-details-tab-content tab-content">
                    <div class="tab-pane active" id="description">
                        <p>We provide the best Beard oil all over the world. We are the worldd best store for Beard Oil.
                            You can buy our product without any hegitation because we always consus about our product
                            quality and always maintain it properly so your can trust and this is our main goal we
                            belive that.</p>
                        <p>We provide the best Beard oil all over the world. We are the worldd best store for Beard Oil.
                            You can buy our product without any hegitation because we always consus about our product
                            quality and always maintain it properly so your can trust and this is our main goal we
                            belive that.</p>
                        <p>We provide the best Beard oil all over the world. We are the worldd best store for Beard Oil.
                            You can buy our product without any hegitation because we always consus about our product
                            quality </p>
                    </div>
                    <div class="tab-pane" id="specification">
                        <ul class="specification">
                            <li>We provide the best Beard oil all over the world</li>
                            <li>We are the worldd best store for Beard Oil</li>
                            <li>You can buy our product without any hegitation.</li>
                            <li>We always consus about our product quality</li>
                            <li>Your can trust our product and this is our main goal.</li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="reviews">
                        <div class="review-list">
                            <div class="review">
                                <h4 class="name">Joe Flores <span>9 March 2018</span></h4>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam.</p>
                                </div>
                            </div>
                            <div class="review">
                                <h4 class="name">Amber Roberts <span>9 March 2018</span></h4>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost
                                        rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="review-form">
                            <h3>Give your Review:</h3>
                            <form action="javascript:void(0);">
                                <div class="ratting">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="row row-10">
                                    <div class="col-md-6 col-12 mb-20"><input type="text" placeholder="Name"></div>
                                    <div class="col-md-6 col-12 mb-20"><input type="email" placeholder="Email"></div>
                                    <div class="col-12 mb-20"><textarea placeholder="Review"></textarea></div>
                                    <div class="col-12"><input type="submit" value="Submit"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Product Slider 3 Column Start-->
                <div class="row mt-50">
                    <div class="section-title left section col mb-40 mb-xs-30">
                        <h1>Related Product</h1>
                    </div>
                    <div class="product-slider product-slider-3 section">
                    
              <?php foreach ($products as $key => $product) {  ?>
                        <!-- Product Item Start -->
                        <div class="col">
                            <div class="product-item">
                                <!-- Image -->
                                <div class="product-image">
                                    <!-- Image -->
                                    <a href="<?php echo $this->Url->build('/products/view/'.$product['slug']) ?>" class="image"><img
                                            src="<?php echo $this->Url->build('/uploads/products/'.$product['product_image_1']); ?>" alt=""></a>
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
                                        <!-- Title-->
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
                        <!-- Product Item End -->
                        <?php } ?>

                    </div>
                </div>
                <!-- Product Slider 3 Column End-->
            </div>
            <div class="col-xl-3 col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-md-15 pr-xs-15">
                <div class="sidebar">
                    <h4 class="sidebar-title">Search</h4>
                    <div class="sidebar-search">
                        <form action="javascript:void(0);">
                            <input type="text" placeholder="Enter key words">
                            <input type="submit" value="search">
                        </form>
                    </div>
                </div>
                <div class="sidebar">
                    <h4 class="sidebar-title">Brand</h4>
                    <ul class="sidebar-list">
                        <li><a href="javascript:void(0);">Baizidale Momone</a></li>
                        <li><a href="javascript:void(0);">Murikhete Paris</a></li>
                        <li><a href="javascript:void(0);">Vortahole Valohoi</a></li>
                        <li><a href="javascript:void(0);">Origeno Veledita</a></li>
                        <li><a href="javascript:void(0);">Buffekhete Parbi</a></li>
                        <li><a href="javascript:void(0);">Makorone Cicile</a></li>
                    </ul>
                </div>
                <div class="sidebar">
                    <h4 class="sidebar-title">Price</h4>
                    <div id="price-range"></div>
                </div>
                <div class="sidebar">
                    <div class="banner"><a href="javascript:void(0);"><img src="assets/images/banner/banner-3.jpg"
                                alt=""></a></div>
                </div>
                <div class="sidebar">
                    <h4 class="sidebar-title">Tags</h4>
                    <div class="tag-cloud">
                        <a href="javascript:void(0);">Oil</a>
                        <a href="javascript:void(0);">Beard oil</a>
                        <a href="javascript:void(0);">Beard</a>
                        <a href="javascript:void(0);">Stylish</a>
                        <a href="javascript:void(0);">Ecommerce</a>
                        <a href="javascript:void(0);">Shop</a>
                        <a href="javascript:void(0);">Shopping</a>
                        <a href="javascript:void(0);">Store</a>
                        <a href="javascript:void(0);">Online Store</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Section End -->

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
