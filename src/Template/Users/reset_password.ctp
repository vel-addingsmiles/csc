

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
                            <a href="#"  class="active">Reset Password</a>
                        </div>   
                        
                        <?= $this->Form->create('login',['novalidate' => true]) ?>
                            

                            <?php echo $this->Form->control('password',[ 'placeholder' => 'Enter Your Password' , 'class' => 'form-control' , 'label' => false]); ?>

                            <div class="form-button">
                                <?= $this->Form->button(__('Login'),['class' => 'ibtn']) ?>
                             </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    </section>
    
   
  </div>
 