
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

  <!--======= SUB BANNER =========-->
   
  
  <!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-100 padding-bottom-100">
       <div class="form-body">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <!-- <img class="logo-size" src="<?php echo $this->Url->build('/uploads/collections/logo-light.svg'); ?>" alt=""> -->
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">

                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <?php echo $this->Flash->render(); ?>
                        <h3>Get more things done with Loggin platform.</h3>
                        <p>Access to the most powerfull tool in the entire design and web industry.</p>
                        <div class="page-links">
                            <a href="#"  class="active">Forgot Password</a>
                        </div>   
                        
                        <?= $this->Form->create('login',['novalidate' => true]) ?>
                            

                            <?php echo $this->Form->control('email',['type' => 'text' , 'placeholder' => 'Submit Your Email' , 'class' => 'form-control' , 'label' => false]); ?>

                            <div class="form-button">
                                <?= $this->Form->button(__('Submit'),['class' => 'ibtn']) ?>
                             </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    </section>
    
   
  </div>
 