
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <h4>My Orders</h4>
        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. 
          Sed feugiat, tellus vel tristique posuere, diam</p>-->
        <ol class="breadcrumb">
          <li><a href="<?php echo $this->Url->build('/'); ?>">Home</a></li>
          <li><a href="<?php echo $this->Url->build('/products'); ?>">SHOP</a></li>
          <li class="active">My Orders</li>
        </ol>
      </div>
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-100 padding-bottom-100">
      <div class="container"> 
        
     <div class="account-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-sm-8">
                        <?php echo $this->Flash->render(); ?>
                            <!-- HTML -->
                            <div id="accordion">

                                <?php $i = 1; foreach ($orders as $key => $order) {  ?>
                                <h4 class="accordion-toggle"><span><?php echo $i; ?></span> Invoice Number : <?php echo $order['order_number']; ?></h4>
                                <div class="accordion-content default">                                    
                                    <div class="details-box">
                                        <ul>
                                            <li>                                                
                                                <a href="#"> <i class="fa fa-edit"></i> Edit your account information</a>
                                            </li>
                                            <li>                                               
                                                <a href="<?php echo $this->Url->build('/users/change-password'); ?>"> <i class="fa fa-edit"></i> Change your password</a>
                                            </li>
                                            <li>                                              
                                                <a href="#"> <i class="fa fa-edit"></i> Modify your address book entries</a>
                                            </li>
                                        </ul>
                                    </div>                                    
                                </div>
                                <div class="clearfix"></div>
                                <?php } ?>
                                                           
                            </div>

                            <center>
                              <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                            </center>
                            <?php if(!empty($this->Paginator->numbers())){ ?>
                             <div class="paginator pull-left">
                                <ul class="pagination">
                                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('next') . ' >') ?>
                                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                                </ul>
                            </div>
                          <?php } ?>
                        </div>

                          <?php echo $this->element('front_end/account_sidebar'); ?>
                    </div>
                </div>
            </div>     
      </div>
    </section>
    
    
