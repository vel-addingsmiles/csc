<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Product Varient Details</h4>

                         <div class="card-body">                 

                            <?= $this->Form->create($productSubVarient,['novalidate' => true ]) ?>
                                <div class="form-group">
                                    <label for="exampleInputText">Main Varient Name</label>

                                    <?php echo $this->Form->control('product_varient_id', ['options' => $productVarients ,'class' => 'form-control' , 'label' => false]); ?>

                                    <small id="textHelp" class="form-text text-muted">Ex: T-shirt, Vasty, Shirt .</small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputText">Sub Varient Name</label>

                                    <?php echo $this->Form->control('name',[ 'placeholder' => 'Sub Varient' , 'class' => 'form-control' , 'label' => false]); ?>

                                    <small id="textHelp" class="form-text text-muted">Ex: T-shirt, Vasty, Shirt .</small>
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