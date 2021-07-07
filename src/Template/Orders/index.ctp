
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

                                         $status = [0 => 'Order Received' , 1 => 'Order Confirmed' , 2 => 'Order Shipped' , 3 => 'Order Delivered' , 4 => 'Order Cancelled' , 5 => 'Order Returned' , 6 => 'Amount Returned' ];

                                         foreach ($orders as $key => $value) { ?>
                                        <form class="form-horizontal" role="form">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label">Order ID</label>
                                                    <div class="col-sm-8 col-xs-12">
                                                        <?php echo $value['order_number']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label">Total</label>
                                                    <div class="col-sm-8 col-xs-12">
                                                        ₹ <?php echo $value['order_total']; ?> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label">Ordered on</label>
                                                    <div class="col-xs-12">
                                                         <?php echo date( 'd F Y' , strtotime($value['created'])); ?> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label">Current Status</label>
                                                    <div class="col-xs-12">
                                                        <?php echo $status[$value['invoice_status']]; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-xs-12 control-label"></label>
                                                    <div class="col-xs-12">
                                                           <a
                                                            href="<?php echo $this->Url->build('/orders/view/'.$value['id']); ?>" class="btn btn-theme btn-theme-dark">View Order</a>
                                                             <a
                                                            href="<?php echo $this->Url->build('/orders/track-order/'.$value['id']); ?>" class="btn btn-theme btn-theme-dark">Track Order</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </form>
                                        <?php } ?>
                                    </div>
                                    <div class="desktop_order_history">
                                      <div class="details-box orders">
                                          <table class="table">
                                              <thead>
                                                  <tr>
                                                      <th>Order ID</th>
                                                          <th>Order Total</th>
                                                          <th>Ordered on</th>
                                                          <th>Current Status</th>
                                                          <th></th>
                                                  </tr>
                                              </thead>
                                               <tbody>
                                                      <?php

                                                       $status = [0 => 'Order Received' , 1 => 'Order Confirmed' , 2 => 'Order Shipped' , 3 => 'Order Delivered' , 4 => 'Order Cancelled' , 5 => 'Order Returned' , 6 => 'Amount Returned' ];

                                                       foreach ($orders as $key => $value) { ?>
                                                      <tr>
                                                          <td class="description">
                                                              <?php echo $value['order_number']; ?>
                                                          </td>
                                                          <td class="total">₹ <?php echo $value['order_total']; ?> </td>
                                                          <td class="diliver-date"> <?php echo date( 'd F Y' , strtotime($value['created'])); ?> </td>
                                                          <td><?php echo $status[$value['invoice_status']]; ?></td>
                                                          <td class="order-status">
                                                             <!--  <a href="return.html"
                                                                  class="btn btn-theme btn-theme-dark">Return Order</a>
                                                                   <a
                                                                  href="#" class="btn btn-theme btn-theme-dark">Re Order</a>  -->
                                                                  <a
                                                                  href="<?php echo $this->Url->build('/orders/view/'.$value['id']); ?>" class="btn btn-theme btn-theme-dark">View Order</a>
                                                                   <a
                                                                  href="<?php echo $this->Url->build('/orders/track-order/'.$value['id']); ?>" class="btn btn-theme btn-theme-dark">Track Order</a>
                                                          </td>
                                                      </tr>
                                                      <?php } ?>
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