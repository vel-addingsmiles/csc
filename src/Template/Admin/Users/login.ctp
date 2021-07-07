<!--Log In page -->
<div class="row vh-100">
    <div class="col-lg-3  pr-0">
        <div class="card mb-0 shadow-none">
            <div class="card-body">
                
                <div class="px-3">
                    <div class="media">
                        <a href="#" class="logo logo-admin"><img src="<?php echo $this->Url->build('/front_end/assets/images/logo.png'); ?>" height="55" alt="logo" class="my-3"></a>
                        <div class="media-body ml-3 align-self-center">                                                                                                                       
                            <h4 class="mt-0 mb-1">Login on CSC</h4>
                            <p class="text-muted mb-0">Sign in to continue to CSC.</p>
                        </div>
                    </div>                            

                    <?php echo $this->Flash->render(); ?>
                    <?= $this->Form->create('login',['novalidate' => true , 'class' => 'form-horizontal my-4']) ?>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                               
                                     <?php echo $this->Form->control('email',['type' => 'text' , 'placeholder' => 'Enter username' , 'class' => 'form-control' , 'label' => false]); ?>
                                 </div>
                            </div>                                    
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
                                    <?php echo $this->Form->control('password',[ 'placeholder' => 'Enter password' , 'class' => 'form-control form-control-lg' , 'label' => false]); ?>
                                </div>
                            </div>                                
                        </div>
    <!-- 
                            <div class="form-group row mt-4">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href="#" class="text-muted font-13"><i class="mdi mdi-lock"></i> Forgot your password?</a>                                    
                                </div>
                            </div> -->

                        <div class="form-group mb-0 row">
                            <div class="col-12 mt-2">
                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                            </div>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            <!--     <div class="account-social text-center">
                    <h6 class="my-4">Or Login With</h6>
                    <ul class="list-inline mb-4">
                        <li class="list-inline-item">
                            <a href="" class="">
                                <i class="fab fa-facebook-f facebook"></i>
                            </a>                                    
                        </li>
                        <li class="list-inline-item">
                            <a href="" class="">
                                <i class="fab fa-twitter twitter"></i>
                            </a>                                    
                        </li>
                        <li class="list-inline-item">
                            <a href="" class="">
                                <i class="fab fa-google google"></i>
                            </a>                                    
                        </li>
                    </ul>
                </div>
                <div class="m-3 text-center bg-light p-3 text-primary">
                    <h5 class="">Don't have an account ? </h5>
                    <p class="font-13">Join <span>Chennis</span> Now</p>
                    <a href="#" class="btn btn-primary btn-round waves-effect waves-light">Free Resister</a>                
                </div>   -->                      
            </div>
        </div>
    </div>
    <div class="col-lg-9 p-0 d-flex justify-content-center">
        <div class="accountbg d-flex align-items-center"> 
            <div class="account-title text-white text-center">
                <img src="<?php echo $this->Url->build('/front_end/assets/images/logo.png'); ?>" alt="" class="thumb-sm">
                <h4 class="mt-3">Welcome To CSC</h4>
                <div class="border w-25 mx-auto border-primary"></div>
                <h1 class="">Let's Get Started</h1>
             <!--    <p class="font-14 mt-3">Don't have an account ? <a href="" class="text-primary">Sign up</a></p> -->
               
            </div>
        </div>
    </div>
</div>
<!-- End Log In page