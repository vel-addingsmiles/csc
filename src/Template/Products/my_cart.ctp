
<!-- Page Banner Section Start -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h1>Cart</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="<?php echo $this->Url->build('/'); ?>">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Banner Section End -->

<!-- Cart Section Start -->
<div
    class="cart-section section position-relative pt-90 pb-60 pt-lg-80 pb-lg-50 pt-md-70 pb-md-40 pt-sm-60 pb-sm-30 pt-xs-50 pb-xs-20 fix">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="javascript:void(0);">
                    <!-- Cart Table -->
                    <div class="cart-table table-responsive mb-30">
                        <table class="table">

                          <?php if(!empty($products)){  ?>
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                          <?php } ?>
                            <tbody>
                            
                              <?php if(!empty($products)){ $total = 0; foreach ($products as $key => $product) { ?>

                                <tr>
                                    <td class="pro-thumbnail"><a href="javascript:void(0);"><img src="<?php echo $this->Url->build('/uploads/products/'.$product['image']); ?>"
                                                alt="Product"></a></td>
                                    <td class="pro-title"><a href="javascript:void(0);"><?php echo $product['product_name']; ?></a></td>
                                    <td class="pro-price"><span>$<?php echo $product['price'];  ?></span></td>
                                    <td class="pro-quantity">
                                        <div class="pro-qty"><input type="text" value="<?php echo $product['quantity']; ?>"></div>
                                    </td>
                                    <td class="pro-subtotal"><span>$<?php echo  $product['quantity']*$product['price']; 
                                                $total += $product['quantity']*$product['price'];
                                                ?></span></td>
                                    <td class="pro-remove"><a href="<?php echo $this->Url->build('/products/removeCart/'.$key); ?>" onclick="return confirm('Are you sure, do you want to remove this product from your cart ?')"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                              <?php }} else{ echo "No products on your cart"; } ?> 
                            </tbody>
                        </table>
                    </div>
                </form>

                
              <?php if(!empty($products)){  ?>
                <div class="row">
                    <div class="col-lg-6 col-12 mb-5">
                        <!-- Calculate Shipping -->
                        <div class="calculate-shipping">
                            <h4>Calculate Shipping</h4>
                            <form action="javascript:void(0);">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-25">
                                        <select class="nice-select">
                                            <option>Bangladesh</option>
                                            <option>China</option>
                                            <option>country</option>
                                            <option>India</option>
                                            <option>Japan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb-25">
                                        <select class="nice-select">
                                            <option>Dhaka</option>
                                            <option>Barisal</option>
                                            <option>Khulna</option>
                                            <option>Comilla</option>
                                            <option>Chittagong</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb-25">
                                        <input type="text" placeholder="Postcode / Zip">
                                    </div>
                                    <div class="col-md-6 col-12 mb-25">
                                        <input type="submit" value="Estimate">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Discount Coupon -->
                        <div class="discount-coupon">
                            <h4>Discount Coupon Code</h4>
                            <form action="javascript:void(0);">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-25">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="col-md-6 col-12 mb-25">
                                        <input type="submit" value="Apply Code">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Cart Summary -->
                    <div class="col-lg-6 col-12 mb-30 d-flex">
                        <div class="cart-summary">
                            <div class="cart-summary-wrap"><?php $product['quantity']*$product['price']; 
                                                //$total += $product['quantity']*$product['price'];
                                                ?>
                                <h4>Cart Summary</h4>
                                <p>Sub Total <span>$<?php echo $total; ?></span></p>
                                <p>Shipping Cost <span>$00.00</span></p>
                                <h2>Grand Total <span>$<?php echo $total; ?></span></h2>
                            </div>
                            <div class="cart-summary-button">
                                <button class="checkout-btn"><a href="<?php echo $this->Url->build('/products/check-out'); ?>">Checkout</a></button>
                                <button class="update-btn">Update Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
              <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Cart Section End -->

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
