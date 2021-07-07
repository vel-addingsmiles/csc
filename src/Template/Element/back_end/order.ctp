<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body mb-0">
                <div class="row">                                            
                    <div class="col-8 align-self-center">
                        <div class="">
                            <h4 class="mt-0 header-title">Total Products</h4>
                            <h2 class="mt-0 font-weight-bold text-dark"><?php echo count($totalProducts); ?></h2> 
                            <!-- <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span> Up From Last Week</p> -->
                        </div>
                    </div><!--end col-->
                    <div class="col-4 align-self-center">
                        <div class="icon-info text-right">
                            <i class="dripicons-cart bg-soft-warning"></i>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
            <div class="card-body overflow-hidden p-0">
                <div class="d-flex mb-0 h-100 dash-info-box">
                    <div class="w-100">                                                
                        <div class="apexchart-wrapper">
                            <div id="dash_spark_1" class="chart-gutters"></div>
                        </div>
                    </div>
                </div>
            </div><!--end card-body-->                                                                    
        </div><!--end card-->
    </div><!--end col-->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body mb-0">
                <div class="row">                                            
                    <div class="col-8 align-self-center">
                        <div class="">
                            <h4 class="mt-0 header-title">Total Revenue</h4>
                            <h2 class="mt-0 font-weight-bold text-dark">₹ <?php echo number_format($order_total[0]['total']); ?></h2> 
                            <!-- <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span> Up from yesterday</p> -->
                        </div>
                    </div><!--end col-->
                    <div class="col-4 align-self-center">
                        <div class="icon-info text-right">
                            <i class="dripicons-wallet bg-soft-success"></i>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
            <div class="card-body overflow-hidden p-0">
                <div class="d-flex mb-0 h-100 dash-info-box">
                    <div class="w-100">                                                
                        <div class="apexchart-wrapper">
                            <div id="apex_column1" class="chart-gutters"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->                                                                    
        </div><!--end card-->
    </div><!--end col-->
    <div class="col-lg-4">
        <div class="card carousel-bg-img">
            <div class="card-body dash-info-carousel mb-0">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row"> 
                                <div class="col-8 align-self-center">
                                    <div class="">
                                        <h4 class="mt-0 header-title">Unconfirmed</h4>
                                        <h2 class="mt-0 font-weight-bold text-dark"><?php echo count($unconfirmed_orders); ?></h2> 
                                        <!-- <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span> Up from yesterday</p> -->
                                    </div>
                                </div><!--end col-->
                                <div class="col-4 align-self-center">
                                    <div class="icon-info text-right">
                                        <i class="dripicons-wallet bg-soft-success"></i>
                                    </div>
                                </div><!--end col-->                                                        
                            </div><!--end row-->                                                    
                        </div><!--end carousel-item-->
                        <div class="carousel-item">
                            <div class="row"> 
                                <div class="col-8 align-self-center">
                                    <div class="">
                                        <h4 class="mt-0 header-title">Unshipped</h4>
                                        <h2 class="mt-0 font-weight-bold text-dark"><?php echo count($unshipped_orders); ?></h2> 
                                        <!-- <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span> Up from yesterday</p> -->
                                    </div>
                                </div><!--end col-->
                                <div class="col-4 align-self-center">
                                    <div class="icon-info text-right">
                                        <i class="dripicons-wallet bg-soft-success"></i>
                                    </div>
                                </div><!--end col-->                                                        
                            </div><!--end row-->                                                   
                        </div><!--end carousel-item-->

                        <div class="carousel-item">
                            <div class="row"> 
                                <div class="col-8 align-self-center">
                                    <div class="">
                                        <h4 class="mt-0 header-title">Delivered</h4>
                                        <h2 class="mt-0 font-weight-bold text-dark"><?php echo count($delivered_orders); ?></h2> 
                                        <!-- <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span> Up from yesterday</p> -->
                                    </div>
                                </div><!--end col-->
                                <div class="col-4 align-self-center">
                                    <div class="icon-info text-right">
                                        <i class="dripicons-wallet bg-soft-success"></i>
                                    </div>
                                </div><!--end col-->                                                        
                            </div><!--end row-->                                                    
                        </div><!--end carousel-item-->

                        <div class="carousel-item">
                            <div class="row"> 
                                <div class="col-8 align-self-center">
                                    <div class="">
                                        <h4 class="mt-0 header-title">Unpaid C/R</h4>
                                        <h2 class="mt-0 font-weight-bold text-dark"><?php echo count($unpaid_orders); ?></h2> 
                                        <!-- <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span> Up from yesterday</p> -->
                                    </div>
                                </div><!--end col-->
                                <div class="col-4 align-self-center">
                                    <div class="icon-info text-right">
                                        <i class="dripicons-wallet bg-soft-success"></i>
                                    </div>
                                </div><!--end col-->                                                        
                            </div><!--end row-->                                                    
                        </div><!--end carousel-item-->
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div><!--end card-body-->                                                                                                        
        </div><!--end card-->
    </div><!--end col-->                            
</div><!--end row-->