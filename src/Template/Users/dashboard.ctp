
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
                                <div class="information-title">My Account</div>
                                <div class="details-wrap">
                                    <div class="block-title alt"> <i class="fa fa-angle-down"></i> My Account</div>
                                    <div class="details-box">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="<?php echo $this->Url->build('/users/edit-account');  ?>">Edit your account information</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $this->Url->build('/users/change-password');  ?>">Change your password</a>
                                            </li>
                                        </ul>
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