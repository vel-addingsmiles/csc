<!-- Header Section Start -->
<div class="header-section section bg-theme">
    <div class="container">
        <div class="row">
            <!-- Header Logo -->
            <div class="col">
                <div class="header-logo">
                    <a href="<?php echo $this->Url->build('/'); ?>">
                        <img src="<?php echo $this->Url->build('/front_end/assets/images/logo.png'); ?>" alt="">
                    </a>
                </div>
            </div>
            <!-- Main Menu -->
            <div class="col d-none d-lg-block">
                <nav class="main-menu">
                    <ul>
                        <li><a href="<?php echo $this->Url->build('/'); ?>">Home</a></li>
                        <li><a href="<?php echo $this->Url->build('/products'); ?>">Shop</a>
                            <ul class="mega-menu">
                                <li class="col"><a href="javascript:void(0);">Shop Grid Pages</a>
                                    <ul>
                                        <li><a href="<?php echo $this->Url->build('/products/view/collagen'); ?>">Collagen</a></li>
                                        <li><a href="<?php echo $this->Url->build('/products/view/hair-vitamins'); ?>">Hair Vitamins</a></li>
                                        <li><a href="<?php echo $this->Url->build('/products/view/kidney-detox'); ?>">Kidney Detox</a></li>
                                        <li><a href="<?php echo $this->Url->build('/products/view/lung-detox'); ?>">Lung Detox</a></li>
                                    </ul>
                                </li>
                                <li class="col"><a href="javascript:void(0);">Shop List Pages</a>
                                    <ul>
                                        <li><a href="<?php echo $this->Url->build('/products/view/zinc-cream'); ?>">Zinc Cream</a></li>
                                        <li><a href="<?php echo $this->Url->build('/products/view/liquid-chalk'); ?>">Liquid Chalk</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?php echo $this->Url->build('/products/new-arrivals'); ?>">New Arrivals</a></li>
                        <li><a href="<?php echo $this->Url->build('/products/new-arrivals'); ?>">Best Sellers</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Header Action -->
            <div class="col">
                <div class="header-action">
                    <!-- Wishlist -->
                    <a href="wishlist.php" class="header-wishlist"><span class="icon">wishlist</span></a>
                    <!-- Cart Wrap Start-->
                    <div class="header-cart-wrap">
                        <!-- Cart Toggle -->
                        <button class="header-cart-toggle"><span class="icon">cart</span><span
                                class="number"><?php echo $get_count_cart; ?></span><span class="price">
                                <?php $total = 0 ; foreach ($products as $key => $product) { ?>
                                            <?php $total += $product['price']*$product['quantity']; ?></span>
                                                <?php } ?>
                                                
                                                $<?php echo $total; ?></span></button>
                        <!-- Header Mini Cart Start -->
                        <div class="header-mini-cart">
                            <!-- Mini Cart Head -->
                            <div class="mini-cart-head">
                                <h3>Your cart</h3>
                            </div>
                            <!-- Mini Cart Body -->
                            <div class="mini-cart-body">
                                <div class="mini-cart-body-inner custom-scroll">
                                    <ul>
                                        <!-- Mini Cart Product -->
                                        <li class="mini-cart-product">
                                            <div class="image">
                                                <a href="javascript:void(0);"><img
                                                        src="assets/images/product/product-1.jpg" alt=""></a>
                                                <button class="remove"><i class="fa fa-trash-o"></i></button>
                                            </div>
                                            <div class="content">
                                                <a href="product-details.php" class="title">Teritory
                                                    Quentily</a>
                                                <span>2 x $35.00</span>
                                            </div>
                                        </li>
                                        <!-- Mini Cart Product -->
                                        <li class="mini-cart-product">
                                            <div class="image">
                                                <a href="javascript:void(0);"><img
                                                        src="assets/images/product/product-2.jpg" alt=""></a>
                                                <button class="remove"><i class="fa fa-trash-o"></i></button>
                                            </div>
                                            <div class="content">
                                                <a href="product-details.php" class="title">Adurite
                                                    Silocone</a>
                                                <span>1 x $59.00</span>
                                            </div>
                                        </li>
                                        <!-- Mini Cart Product -->
                                        <li class="mini-cart-product">
                                            <div class="image">
                                                <a href="javascript:void(0);"><img
                                                        src="assets/images/product/product-3.jpg" alt=""></a>
                                                <button class="remove"><i class="fa fa-trash-o"></i></button>
                                            </div>
                                            <div class="content">
                                                <a href="product-details.php" class="title">Baizidale
                                                    Momone</a>
                                                <span>1 x $78.00</span>
                                            </div>
                                        </li>
                                        <!-- Mini Cart Product -->
                                        <li class="mini-cart-product">
                                            <div class="image">
                                                <a href="javascript:void(0);"><img
                                                        src="assets/images/product/product-4.jpg" alt=""></a>
                                                <button class="remove"><i class="fa fa-trash-o"></i></button>
                                            </div>
                                            <div class="content">
                                                <a href="product-details.php" class="title">Makorone
                                                    Cicile</a>
                                                <span>2 x $65.00</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Mini Cart Footer -->
                            <div class="mini-cart-footer">
                                <h4>Subtotal: $272.00</h4>
                                <div class="buttons">
                                    <a href="cart.php">View cart</a>
                                    <a href="checkout.php">Checkout</a>
                                </div>
                            </div>
                        </div>
                        <!-- Header Mini Cart End -->
                    </div>
                    <!-- Cart Wrap End-->
                </div>
            </div>
            <div class="col-12 d-block d-lg-none">
                <div class="mobile-menu"></div>
            </div>
        </div>
    </div>
</div>
<!-- Header Section End -->