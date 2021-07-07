   <!-- Page Content-->
                <div class="page-content">
                    <div class="container-fluid"> 
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body invoice-head"> 
                                        <div class="row">
                                            <div class="col-md-4 align-self-center">                                                
                                                <img src="<?php echo $this->Url->build('/img/logo.png'); ?>" alt="logo-small" class="logo-sm mr-2" height="38">                                                                                          
                                            </div>
                                            <div class="col-md-8">
                                                   
                                                <ul class="list-inline mb-0 contact-detail float-right">                                                   
                                                    <li class="list-inline-item">
                                                        <div class="pl-3">
                                                            <i class="mdi mdi-web"></i>
                                                            <p class="text-muted mb-0">www.chennis.com</p>
                                                        </div>                                                
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <div class="pl-3">
                                                            <i class="mdi mdi-phone"></i>
                                                            <p class="text-muted mb-0">+91-9598963214</p>
                                                        </div>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <div class="pl-3">
                                                            <i class="mdi mdi-map-marker"></i>
                                                            <p class="text-muted mb-0">Chennis Team,</p>
                                                            <p class="text-muted mb-0">Coimbatore , TamilNadu - India.</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> 
                                    </div><!--end card-body-->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="">
                                                    <h6 class="mb-0"><b>Order Date :</b> <?php echo date('d F Y', strtotime($order['created']) ); ?></h6>
                                                    <h6><b>Order ID :</b> <?php echo $order['order_number']; ?> </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-4">                                            
                                                <div class="float-left">
                                                    <address class="font-13">
                                                        <strong class="font-14">Billed To :</strong><br>
                                                        <?php echo $order['order_invoice']['billing_name']; ?><br>
                                                         <?php 
                                                            echo $order['order_invoice']['billing_street']." , "; 
                                                        if(!empty($order['order_invoice']['billing_location'])){
                                                            echo $order['order_invoice']['billing_location']." , ";
                                                         } 

                                                            echo $order['order_invoice']['billing_city'];
                                                         ?>
                                                         <br>
                                                        <?php echo $order['order_invoice']['state']['stateName']." , ".$order['order_invoice']['country']['name']." , ".$order['order_invoice']['billing_pincode']; ?><br>
                                                        <abbr title="Phone">P:</abbr> <?php echo $order['order_invoice']['billing_contact_1']; ?>
                                                        <?php if(!empty($order['order_invoice']['billing_contact_2'])){ ?>
                                                        <abbr title="Phone">P:</abbr> <?php echo $order['order_invoice']['billing_contact_2']; ?>
                                                        <?php } ?>
                                                    </address>
                                                </div>
                                            </div>                                       
                                            
                                            <div class="col-md-4">
                                                <div class="text-center bg-light p-3 mb-3">
                                                    <h5 class="bg-primary mt-0 p-2 text-white d-sm-inline-block">Payment Methods</h5>
                                                    <h6 class="font-13">CCAvenue & Cards Payments :</h6>
                                                    <p class="mb-0 text-muted">Visa, Master Card, Credit Card</p>
                                                </div>                                              
                                            </div>                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-0">
                                                        <thead>
                                                            <tr>

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
                                                                <td colspan="3" class="border-0"></td>
                                                                <td class="border-0 font-14"><b>Sub Total</b></td>
                                                                <td class="border-0 font-14"><b>₹ <?php echo $total; ?></b></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="3" class="border-0"></th>                                                        
                                                                <td class="border-0 font-14"><b>Discount</b></td>
                                                                <td class="border-0 font-14"><b>
                                                                <?php if(empty($getDiscount)){
                                                                    echo "0.00%";
                                                                }else{  if($getDiscount['discount_type'] == 1){ echo $getDiscount['discount']."%"; }else{ echo "₹ ".$getDiscount['discount']; }  } ?>
                                                                

                                                                </b></td>
                                                            </tr>
                                                            <tr class="bg-dark text-white">
                                                                <th colspan="3" class="border-0"></th>                                                        
                                                                <td class="border-0 font-14"><b>Total</b></td>
                                                                <td class="border-0 font-14"><b>₹<?php echo $order['order_total']; ?></b></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>                                            
                                            </div>                                        
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <h5 class="mt-4">Terms And Condition :</h5>
                                                <ul class="pl-3">
                                                    <li><small>All accounts are to be paid within 7 days from receipt of invoice. </small></li>
                                                    <li><small>To be paid by cheque or credit card or direct payment online.</small></li>
                                                    <li><small> If account is not paid within 7 days the credits details supplied as confirmation<br> of work undertaken will be charged the agreed quoted fee noted above.</small></li>                                            
                                                </ul>
                                            </div>                                        
                                            <div class="col-lg-6 align-self-end">
                                                <div class="w-25 float-right">
                                                    <small>Account Manager</small>
                                                    <img src="assets/images/signature.png" alt="" class="" height="48">
                                                    <p class="border-top">Signature</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
                                                <div class="text-center text-muted"><small>Thank you very much for doing business with us. Thanks !</small></div>
                                            </div>
                                            <div class="col-lg-12 col-xl-4">
                                                <div class="float-right d-print-none">
                                                    <a href="javascript:window.print()" class="btn btn-info text-light"><i class="fa fa-print"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!-- container -->

                    <footer class="footer text-center text-sm-left">
                        &copy; 2019 Frogetor <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
                    </footer>
                </div>
                <!-- end page content -->