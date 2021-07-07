<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Change Your Password</h4>

                         <div class="card-body">                 

                            <?= $this->Form->create('changePassword',['novalidate' => true ]) ?>
                                <div class="form-group">
                                    <label for="exampleInputText">Old Password</label>

                                    <?php echo $this->Form->control('old_password',[ 'placeholder' => 'Old Password' , 'class' => 'form-control' , 'label' => false , 'type' => 'password']); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">New Password</label>

                                    <?php echo $this->Form->control('password',[ 'placeholder' => 'New Password' , 'class' => 'form-control' , 'label' => false]); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Confirm Password</label>

                                    <?php echo $this->Form->control('confirm_password',[ 'placeholder' => 'Confirm Password' , 'class' => 'form-control' , 'label' => false , 'type' => 'password']); ?>
                                </div>
                                
                                 
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-danger">Cancel</button>
                            <?= $this->Form->end() ?>                                          
                        </div>
                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div><!-- container -->

    <?php echo $this->element('back_end/footer'); ?>  
</div>
<!-- end page content