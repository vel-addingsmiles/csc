
<section class="sub-bnr desktop_banner" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <!-- <h4>Shop now to witness the Trendy fashion</h4> -->
        <!-- <p>, consectetur adipiscing elit. Donec faucibus maximus vehicula. 
          Sed feugiat, tellus vel tristique posuere, diam</p> -->
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">User Panel</a></li>
        </ol>
      </div>
    </div>
  </section>

  <section class="sub-bnr mobile_banner" data-stellar-background-ratio="0.5">
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- WRAPPER -->
        <div class="wrapper">

            <!-- CONTENT AREA -->
            <div class="content-area">
                <section class="page-section">
                    <div class="wrap container-fluid">
                        <div class="row">
                            <!--start sidebar-->
                            <?php echo $this->element('front_end/account_sidebar'); ?>
                           
                            <!--end sidebar-->

                            <!--start main contain of page-->
                            <div class="col-lg-9 col-md-9 col-sm-8">
                                  <?php echo $this->Flash->render(); ?>
                                <div class="information-title">Your Order History</div>
                                <div class="details-wrap">
                                    <div class="mobile_order_history">
                                      <?php

                                          $total = 0; 
                                          foreach ($order['order_products'] as $key => $order_product) { ?>
                                        <form class="form-horizontal" role="form">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label">Image</label>
                                                    <div class="col-sm-8 col-xs-12">
                                                        <img class="image" src="<?php echo $this->Url->build('/uploads/products/'.$order_product['product']['product_image_1']); ?>" width="50">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label">Item</label>
                                                    <div class="col-sm-8 col-xs-12">
                                                        <?php echo $order_product['product']['product_name']; ?> ( SIZE - <?php echo $order_product['ProductSizes']['size']; ?> )
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label">Quantity</label>
                                                    <div class="col-sm-8 col-xs-12">
                                                         <?php echo $order_product['quantity']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label">Varients</label>
                                                    <div class="col-xs-12">
                                                           <?php foreach ($order_product['order_varients'] as $key => $varients) {
                                                                             echo "<b>".$varients['product_sub_varient']['product_varient']['name']."</b> - ".$varients['product_sub_varient']['name']."<br>";
                                                                        } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label">Unit Cost</label>
                                                    <div class="col-xs-12">
                                                       ₹ <?php echo $order_product['product']['price']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label">Total</label>
                                                    <div class="col-xs-12">
                                                          ₹ <?php echo $order_product['product']['price']*$order_product['quantity']; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>
                                        </form> <hr>
                                        <?php $total += $order_product['product']['price']*$order_product['quantity']; } ?>
                                        <form class="form-horizontal" role="form">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label">Sub Total</label>
                                                    <div class="col-xs-12">
                                                         ₹ <?php echo $total; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label">Discounts</label>
                                                    <div class="col-xs-12">
                                                        <?php if(empty($getDiscount)){
                                                                    echo "0.00%";
                                                                }else{  if($getDiscount['discount_type'] == 1){ echo $getDiscount['discount']."%"; }else{ echo "₹ ".$getDiscount['discount']; }  } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label">Total</label>
                                                    <div class="col-xs-12">
                                                         ₹ <?php echo $order['order_total']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="desktop_order_history">
                                      <div class="details-box orders">
                                          <table class="table">
                                              <thead>
                                                  <tr>
                                                      <th>Image</th>
                                                        <th>Item</th>   
                                                        <th>Quantity</th>
                                                        <th>Varients</th>                                                   
                                                        <th>Unit Cost</th>
                                                        <th>Total</th>
                                                  </tr>
                                              </thead>
                                               <tbody>
                                                    <?php $total = 0; foreach ($order['order_products'] as $key => $order_product) { ?>
                                                                <tr>
                                                                    <th>
                                                                        <img class="image" src="<?php echo $this->Url->build('/uploads/products/'.$order_product['product']['product_image_1']); ?>" width="50">
                                                                     </th>
                                                                    <th><?php echo $order_product['product']['product_name']; ?> ( SIZE - <?php echo $order_product['ProductSizes']['size']; ?> ) </th>
                                                                    <td><?php echo $order_product['quantity']; ?></td>
                                                                    <td>
                                                                        
                                                                        <?php foreach ($order_product['order_varients'] as $key => $varients) {
                                                                             echo "<b>".$varients['product_sub_varient']['product_varient']['name']."</b> - ".$varients['product_sub_varient']['name']."<br>";
                                                                        } ?>

                                                                    </td>
                                                                    <td>₹ <?php echo $order_product['product']['price']; ?></td>
                                                                    <td>₹ <?php echo $order_product['product']['price']*$order_product['quantity']; ?></td>
                                                                </tr>
                                                            <?php $total += $order_product['product']['price']*$order_product['quantity']; } ?>
                                                            <tr>                                                        
                                                                <td colspan="4" class="border-0"></td>
                                                                <td class="border-0 font-14"><b>Sub Total</b></td>
                                                                <td class="border-0 font-14"><b>₹ <?php echo $total; ?></b></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="4" class="border-0"></th>                                                        
                                                                <td class="border-0 font-14"><b>Discount</b></td>
                                                                <td class="border-0 font-14"><b>
                                                                <?php if(empty($getDiscount)){
                                                                    echo "0.00%";
                                                                }else{  if($getDiscount['discount_type'] == 1){ echo $getDiscount['discount']."%"; }else{ echo "₹ ".$getDiscount['discount']; }  } ?>
                                                                

                                                                </b></td>
                                                            </tr>
                                                            <tr class="">
                                                                <th colspan="4" class="border-0"></th>                                                        
                                                                <td class="border-0 font-14"><b>Total</b></td>
                                                                <td class="border-0 font-14"><b>₹<?php echo $order['order_total']; ?></b></td>
                                                            </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                            </div>
                            <!--end main contain of page-->
                        </div>

                    </div>
                </section>
            </div>
            <!-- /CONTENT AREA -->


        </div>
        <!-- /WRAPPER -->
    
    
</div>