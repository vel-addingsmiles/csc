<!-- Page Content-->
                <div class="page-content">
                    <div class="container-fluid"> 
                        <?php echo $this->element('back_end/order'); ?>  
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body new-user order-list">
                                        <h4 class="header-title mt-0 mb-3">Order List</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="border-top-0">Invoice Number</th>
                                                        <th class="border-top-0">User Name</th>
                                                        <th class="border-top-0">User Mobile</th>
                                                        <th class="border-top-0">Order Date</th>
                                                        <th class="border-top-0">Order Total</th>
                                                        <th class="border-top-0">Order Status</th>
                                                    </tr><!--end tr-->
                                                </thead>
                                                <tbody>
                                                    <?php $status = [0 => 'Order Received' , 1 => 'Order Confirmed' , 2 => 'Order Shipped' , 3 => 'Order Delivered' , 4 => 'Order Cancelled' , 5 => 'Order Returned' , 6 => 'Amount Returned' ]; ?>
                                                    <?php foreach ($recent_orders as $key => $recent_order) { ?>
                                                    <tr>
                                                        <td><?php echo $recent_order['order_number']; ?></td>
                                                        <td><?php echo $recent_order['user']['name']; ?></td>
                                                        <td><?php echo $recent_order['user']['mobile']; ?></td>
                                                        <td><?php echo $recent_order['created']; ?></td>
                                                        <td>₹ <?php echo $recent_order['order_total']; ?></td>
                                                        <td>
                                                              <span class="badge badge-boxed  badge-soft-success"><?php echo $status[$recent_order['invoice_status']]; ?></span>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>                                                
                                                </tbody>
                                            </table> <!--end table-->                                               
                                        </div><!--end /div-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

                    </div><!-- container -->

                     <?php echo $this->element('back_end/footer'); ?>  
                </div>
                <!-- end page content -->