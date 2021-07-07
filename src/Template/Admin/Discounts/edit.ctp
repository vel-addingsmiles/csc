<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Discout Details</h4>

                         <div class="card-body">                 

                            <?= $this->Form->create($discount,['novalidate' => true ]) ?>
                                <div class="form-group">
                                    <label for="exampleInputText">Discout Code</label>

                                    <?php echo $this->Form->control('code',[ 'placeholder' => 'Discout Code' , 'class' => 'form-control' , 'label' => false]); ?>

                                </div>

                                <div class="form-group">


                                  
                                    <div class="row" >
                                        <div class="col-sm-4">
                                            <label for="exampleInputText">Discount</label>
                                            <?php echo $this->Form->control('discount',[ 'placeholder' => 'Enter Your discount' , 'class' => 'form-control' , 'label' => false , 'min' =>1]); ?>
                                        </div><!--end col-->
                                        
                                        <div class="col-sm-4">
                                            <label>Discount Type</label>
                                            <?php echo $this->Form->control('discount_type',[ 'class' => 'form-control' , 'label' => false , 'options' => [1 => 'Percentage' , 2 => 'Amount' ] ]); ?>
                                        </div><!--end col-->

                                        <div class="col-sm-4">
                                            <label>Expiry Date</label>
                                            <input type="date" name="expiry_date" class="form-control" value="<?php echo date('Y-m-d',strtotime($discount['expiry_date'])); ?>">
                                        </div>
                                    </div>


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