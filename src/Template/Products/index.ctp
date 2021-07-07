
<!-- Page Banner Section Start -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h1>Shop</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="<?php echo $this->Url->build('/') ?>">Home</a></li>
                        <li>Shop</li>
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
            <div class="col-xl-9 col-lg-8 col-12 order-1 order-lg-2">
                <!-- Shop Toolbar Start -->
                <div class="row">
                    <div class="col">
                        <div class="shop-toolbar">
                            <div class="product-view-mode">
                                <button class="grid" data-mode="grid"><span>grid</span></button>
                                <button class="list active" data-mode="list"><span>list</span></button>
                            </div>
                            <div class="product-showing mr-auto">
                                <p>Showing 9 of 72</p>
                            </div>
                            <div class="product-short">
                                <p>Short by</p>
                                <select class="nice-select">
                                    <option value="trending">Trending items</option>
                                    <option value="sales">Best sellers</option>
                                    <option value="rating">Best rated</option>
                                    <option value="date">Newest items</option>
                                    <option value="price-asc">Price: low to high</option>
                                    <option value="price-desc">Price: high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Shop Toolbar End -->
                <div class="shop-product-wrap list row">
                    <!-- Product Item Start -->
                    <!-- <php pr($products); die; ?> -->
              <?php foreach ($products as $key => $product) {  ?>
                    <div class="col-xl-4 col-sm-6 col-12 mb-30">
                        <div class="product-item list">
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
                                <div class="body">
                                    <p>We provide the best Beard oil all over the worldd. We are the worldd best store
                                        for Beard Oil. You can buy our product without any are hegitation because we
                                        always consus about our product quality and always maintain it properly so your
                                        can trust </p>
                                    <ul>
                                        <li>We provide the best</li>
                                        <li>Beard oil all over the worldd</li>
                                        <li>We are the worldd best</li>
                                    </ul>
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
                    
                    <?php } ?>
                    <!-- Product Item End -->

                </div>
                <!-- <div class="row mt-20">
                    <div class="col">
                        <ul class="page-pagination">
                            <li><a href="javascript:void(0);"><i class="fa fa-angle-left"></i>Back</a></li>
                            <li class="active"><a href="javascript:void(0);">1</a></li>
                            <li><a href="javascript:void(0);">2</a></li>
                            <li><a href="javascript:void(0);">3</a></li>
                            <li>-----</li>
                            <li><a href="javascript:void(0);">18</a></li>
                            <li><a href="javascript:void(0);">19</a></li>
                            <li><a href="javascript:void(0);">20</a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i>Next</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
            <div class="col-xl-3 col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-md-15 pr-xs-15">
                <div class="sidebar">
                    <h4 class="sidebar-title">Search</h4>
                    <div class="sidebar-search">
                        <form action="#">
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
