<div class="left-sidenav">
                    
    <ul class="metismenu left-sidenav-menu" id="side-nav">

        <li class="menu-title">Main</li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-monitor"></i><span>Dashboards</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level collapse" aria-expanded="false">
                <li><a href="<?php echo $this->Url->build('/admin/users/dashboard'); ?>">Dashboard</a></li>
                
            </ul>
        </li>
         <li>
           <a href="javascript: void(0);" aria-expanded="false"><i class="mdi mdi-cart-arrow-right"></i><span>Products</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
           
            <ul class="nav-second-level collapse" aria-expanded="false">
                <li><a href="<?php echo $this->Url->build('/admin/products'); ?>">Products</a></li>
                <li><a href="<?php echo $this->Url->build('/admin/products/inventory'); ?>">Inventory</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-dump-truck"></i><span>Orders</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level collapse" aria-expanded="false">
                <li><a href="<?php echo $this->Url->build('/admin/orders'); ?>"><span>Orders</span></a></li>
                <li><a href="<?php echo $this->Url->build('/admin/orders/confirmed-orders'); ?>"><span>Confirmed Orders</span></a></li>
                <li><a href="<?php echo $this->Url->build('/admin/orders/shipped-orders'); ?>"><span>Shipped Orders</span></a></li>
                <li><a href="<?php echo $this->Url->build('/admin/orders/delivered-orders'); ?>"><span>Delivered Orders</span></a></li>
                <li><a href="<?php echo $this->Url->build('/admin/orders/cancelled-orders'); ?>"><span>Cancelled Orders</span></a></li>
                <li><a href="<?php echo $this->Url->build('/admin/orders/returned-orders'); ?>"><span>Returned Orders</span></a></li>
                <li><a href="<?php echo $this->Url->build('/admin/orders/money-returned-orders'); ?>"><span>Money Returned</span></a></li>
                <li><a href="<?php echo $this->Url->build('/admin/orders/abandoned-checkouts'); ?>"><span>Abandoned Checkouts</span></a></li>
                           
            </ul>
        </li>
         

         

     <!--    <li>
            <a href="javascript: void(0);"><i class="mdi mdi-cards-playing-outline"></i><span>Discounts</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level collapse" aria-expanded="false">
                
                <li><a href="all_discounts.php">Discount Code</a></li>                                
                <li><a href="ui-buttons.html">Automatic Discounts</a></li>
                <li><a href="ui-cards.html">Gift Card</a></li>                                
               
                
                
                
            </ul>
        </li> -->
     <!--    <li>
        <a href="javascript: void(0);" aria-expanded="false"><i class="mdi mdi-target-account"></i><span>Customer</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                         <ul class="nav-second-level collapse" aria-expanded="false">
                        <li><a href="ui-other-animation.html">Membership</a></li>
                        <li><a href="ui-other-avatar.html">Loyalty Program</a></li>
                        
                    </ul>
                </li>
        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-buffer"></i><span>Analytics</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level collapse" aria-expanded="false">
                <li><a href="advanced-rangeslider.html">Overview Dashboard</a></li>
              
            </ul>
        </li> -->

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-settings-outline"></i><span>Settings</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level collapse" aria-expanded="false">
                <li><a href="<?php echo $this->Url->build('/admin/discounts'); ?>">Manage Discounts</a></li>

                <li><a href="<?php echo $this->Url->build('/admin/collections'); ?>">Manage Collections</a></li>

                <li><a href="<?php echo $this->Url->build('/admin/sidebars'); ?>">Manage Sidebars</a></li>

                <li><a href="<?php echo $this->Url->build('/admin/tags'); ?>">Manage Tag</a></li>
                <li><a href="<?php echo $this->Url->build('/admin/product-varients'); ?>">Manage Variant</a></li>
                <li><a href="<?php echo $this->Url->build('/admin/product-sub-varients'); ?>">Manage Sub Variant</a></li>
                <li><a href="<?php echo $this->Url->build('/admin/product-categories'); ?>">Manage Product Catagory</a></li>
                <li><a href="<?php echo $this->Url->build('/admin/product-sub-categories'); ?>">Manage Sub Product Catagory</a></li>
                <li><a href="<?php echo $this->Url->build('/admin/homepage-banners'); ?>">Manage Slider</a></li>
                <li><a href="<?php echo $this->Url->build('/admin/homepage-sub-banners'); ?>">Manage SubBanner</a></li>
                <!-- <li><a href="all_subbanner_right.php">Manage SubBanner Right</a></li>
                <li><a href="forms-advanced.html">Side Banners</a></li>
                <li><a href="forms-validation.html">Integrations</a></li>
                <li><a href="forms-wizard.html">Payment Gateway</a></li>
                <li><a href="forms-editors.html">SMS Gateway</a></li>
                <li><a href="forms-repeater.html">Emails</a></li>
                <li><a href="forms-x-editable.html">Wallets</a></li> -->
                
            </ul>
        </li>

       <!--  <li>
            <a href="javascript: void(0);"><i class="mdi mdi-poll"></i><span>Your list</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level collapse" aria-expanded="false">
                <li><a href="charts-apex.html">Shopping List</a></li>
                <li><a href="charts-morris.html">Creating wish List</a></li>
                
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-format-list-bulleted-type"></i><span>Account</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level collapse" aria-expanded="false">
                <li><a href="tables-basic.html">Your Profile</a></li>
                <li><a href="tables-datatable.html">Payment options</a></li>
                 
            </ul>
        </li> -->
    </ul>
</div>