
<!-- Page Banner Section Start -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h1>Shop</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="<?php echo $this->Url->build('/') ?>">Home</a></li>
                        <li>New Arrivals</li>
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
            <div class="col-xl-12 col-lg-12 col-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-12">
                        <h1 class="mb-50">New Arrivals <span class="new-products">6 Products</span></h1>
                    </div>
                </div>
                <div class="row">
                    <!-- Product Item Start -->
                    
              <?php foreach ($products as $key => $product) {  ?>
                    <div class="col-xl-3 col-sm-6 col-12 mb-30">
                        <div class="product-item">
                            <!-- Image -->
                            
                        <?php if($product['price'] != $product['cost_per_item']){ ?>
                          <?php if(!empty($product['compare_price'])){ ?>
                            <div class="product-image">
                                <!-- Image -->
                                <a href="<?php echo $this->Url->build('/products/view/'.$product['slug']) ?>" class="image"><img
                                        src="<?php echo $this->Url->build('/uploads/products/'.$product['product_image_1']); ?>" alt=""></a>
                                <?php 
                                  
                                  $discount = ( $product['compare_price']/$product['cost_per_item'] )*100;

                                ?> 
                                <span class="offer"><?php echo round($discount); ?>%</span>
                                <span class="new">New</span>
                                <!-- Product Action -->
                                <div class="product-action">
                                    <a href="<?php echo $this->Url->build('/products/my-cart') ?>" class="cart"><span></span></a>
                                    <a href="<?php echo $this->Url->build('/products/addTowish/'.$product['id']) ?>" class="wishlist"><span></span></a>
                                    <a href="javascript:void(0);" class="quickview"><span></span></a>
                                </div>
                            </div>
                            <?php } else {  }?> 
                            <?php } ?>
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
                    <?php } ?>
                    <!-- Product Item End -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Section End -->
