
<!-- Page Banner Section Start -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h1>Checkout</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="<?php echo $this->Url->build('/') ?>">Home</a></li>
                        <li>Checkout</li>
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
                <!-- Checkout Form s-->
                <div action="javascript:void(0);" class="checkout-form">
                <?= $this->Form->create('proceedToCheckout',['novalidate' => true , 'url' => '/orders/create-order' ]) ?>
                    <div class="row row-40">
                        <div class="col-lg-7">
                            <!-- Billing Address -->
                            <div id="billing-form" class="mb-10">
                                <h4 class="checkout-title">Billing Address</h4>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>First Name*</label>
                                        <?php echo $this->Form->control('billing_name',[ 'placeholder' => 'First Name', 'class' => '' , 'label' => false , 'value' => $auth['name'] ]); ?>
                                        <!-- <input type="text" placeholder="First Name"> -->
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Last Name*</label>
                                        <input type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Email Address*</label>
                                        <?php echo $this->Form->control('billing_email',[ 'placeholder' => 'Email Address', 'class' => '' , 'label' => false , 'value' => $auth['email'] , 'required' => true]); ?>
                                        <!-- <input type="email" placeholder="Email Address"> -->
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Phone no*</label>
                                    <?php echo $this->Form->control('billing_contact_1',[ 'placeholder' => 'Phone number', 'class' => '' , 'label' => false , 'value' => $auth['mobile'] , 'required' => true]); ?>
                                        <!-- <input type="text" placeholder="Phone number"> -->
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="Company Name">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Address*</label>
                                    <?php echo $this->Form->control('billing_street',[ 'placeholder' => 'Address line 1', 'class' => '' , 'label' => false , 'required' => true]); ?>
                                        <!-- <input type="text" placeholder="Address line 1"> -->
                                        <input type="text" placeholder="Address line 2">
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Country*</label>
                                    <?php echo $this->Form->control('country_id',[ 'options' => $countries , 'class' => 'nice-select country' , 'label' => false ]); ?>
                                        <!-- <select class="nice-select">
                                            <option>Bangladesh</option>
                                            <option>China</option>
                                            <option>country</option>
                                            <option>India</option>
                                            <option>Japan</option>
                                        </select> -->
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Town/City*</label>
                                    <?php echo $this->Form->control('billing_city',[ 'placeholder' => 'Town/City', 'class' => '' , 'label' => false , 'required' => true]); ?>
                                        <!-- <input type="text" placeholder="Town/City"> -->
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>State*</label>
                                    <?php echo $this->Form->control('state_id',[ 'options' => $states , 'class' => 'nice-select state_id' , 'label' => false ]); ?>
                                        <!-- <input type="text" placeholder="State"> -->
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Zip Code*</label>
                                    <?php echo $this->Form->control('billing_pincode',[ 'placeholder' => 'Zip Code', 'class' => '' , 'label' => false  , 'required' => true]); ?>
                                        <!-- <input type="text" placeholder="Zip Code"> -->
                                    </div>
                                    <div class="col-12 mb-20">
                                        <div class="check-box">
                                            <input type="checkbox" id="create_account">
                                            <label for="create_account">Create an Acount?</label>
                                        </div>
                                        <div class="check-box">
                                            <input type="checkbox" id="shiping_address" data-shipping>
                                            <label for="shiping_address">Ship to Different Address</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Shipping Address -->
                            <div id="shipping-form">
                                <h4 class="checkout-title">Shipping Address</h4>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>First Name*</label>
                                        <input type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Last Name*</label>
                                        <input type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address">
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Phone no*</label>
                                        <input type="text" placeholder="Phone number">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="Company Name">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Address*</label>
                                        <input type="text" placeholder="Address line 1">
                                        <input type="text" placeholder="Address line 2">
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Country*</label>
                                        <select class="nice-select">
                                            <option>Bangladesh</option>
                                            <option>China</option>
                                            <option>country</option>
                                            <option>India</option>
                                            <option>Japan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Town/City*</label>
                                        <input type="text" placeholder="Town/City">
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>State*</label>
                                        <input type="text" placeholder="State">
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Zip Code*</label>
                                        <input type="text" placeholder="Zip Code">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row">
                                <!-- Cart Total -->
                                <div class="col-12 mb-60">
                                    <h4 class="checkout-title">Cart Total</h4>
                                    <div class="checkout-cart-total">
                                        <h4>Product <span>Total</span></h4>
                                        <ul>
                                        <?php $total = 0 ; foreach ($products as $key => $product) { ?>
                                            <li><?php echo $product['product_name']; ?> <span>$<?php 
                                                echo $product['price']*$product['quantity']; 
                                                $total += $product['price']*$product['quantity'];
                                                ?>.00</span></li>
                                                <?php } ?>
                                        </ul>
                                        <p>Sub Total <span>$<?php echo $total; ?>.00</span></p>
                                        <input type="hidden" name="total_cost" class="total_cost" value="<?php echo $total; ?>.00">
                                        <p>Shipping Fee <span>$00.00</span></p>
                                        <h4>Grand Total <span>$<?php echo $total; ?>.00</span></h4>
                                    </div>
                                </div>
                                <!-- Payment Method -->
                                <div class="col-12 mb-30">
                                    <h4 class="checkout-title">Payment Method</h4>
                                    <div class="checkout-payment-method">
                                        <div class="single-method">
                                            <input type="radio" id="payment_check" name="payment-method" value="check">
                                            <label for="payment_check">Check Payment</label>
                                            <p data-method="check">Please send a Check to Store name with Store Street,
                                                Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        <div class="single-method">
                                            <input type="radio" id="payment_bank" name="payment-method" value="bank">
                                            <label for="payment_bank">Direct Bank Transfer</label>
                                            <p data-method="bank">Please send a Check to Store name with Store Street,
                                                Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        <div class="single-method">
                                            <input type="radio" id="payment_cash" name="payment-method" value="cash">
                                            <label for="payment_cash">Cash on Delivery</label>
                                            <p data-method="cash">Please send a Check to Store name with Store Street,
                                                Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        <div class="single-method">
                                            <input type="radio" id="payment_paypal" name="payment-method"
                                                value="paypal">
                                            <label for="payment_paypal">Paypal</label>
                                            <p data-method="paypal">Please send a Check to Store name with Store Street,
                                                Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        <div class="single-method">
                                            <input type="radio" id="payment_payoneer" name="payment-method"
                                                value="payoneer">
                                            <label for="payment_payoneer">Payoneer</label>
                                            <p data-method="payoneer">Please send a Check to Store name with Store
                                                Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        <div class="single-method">
                                            <input type="checkbox" id="accept_terms">
                                            <label for="accept_terms">I’ve read and accept the terms &
                                                conditions</label>
                                        </div>
                                    </div>
                                    <button class="place-order btn btn-lg btn-round">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
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
