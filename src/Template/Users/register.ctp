

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
                        <h3>Get more things done with Loggin platform.</h3>
                        <p>Access to the most powerfull tool in the entire design and web industry.</p>

                        <a data-toggle="modal" class="btn btn-primary" data-target="#login_register" class="custom_hover">Login &amp; Regiser</a>
                        <!-- <div class="page-links">
                            <a href="<?php echo $this->Url->build('/users/login'); ?>">Login</a><a href="#" class="active">Register</a>
                        </div>   

                        <?= $this->Form->create($user,['novalidate' => false]) ?>
                        
                        <?php echo $this->Form->control('name',['type' => 'text' , 'placeholder' => 'Full Name' , 'class' => 'form-control' , 'label' => false]); ?>
                         
                         <?php echo $this->Form->control('email',[ 'placeholder' => 'Email' , 'class' => 'form-control' , 'label' => false]); ?>
                        
                         <?php echo $this->Form->control('password',[ 'placeholder' => 'Password' , 'class' => 'form-control' , 'label' => false]); ?>

                         <?php echo $this->Form->control('mobile',[ 'placeholder' => 'Mobile Number' , 'type' => 'number' , 'class' => 'form-control' , 'label' => false]); ?>
                         
                            <div class="form-button">
                                <?= $this->Form->button(__('Register'),['class' => 'ibtn']) ?>
                             </div>
                        <?= $this->Form->end() ?>
                        <div class="other-links">
                            <span>Or register with</span>
                              <a href="<?php echo $this->Url->build('/users/facebook-login'); ?>"><i class="fa fa-facebook"></i></a>
                              <a href="<?php echo $this->Url->build('/users/google-login'); ?>"><i class="fa fa-google"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    </section>
    
   
  </div>


<script type="text/javascript">
$(document).ready(function(){
    $('#login_register').modal('show');
})

</script>