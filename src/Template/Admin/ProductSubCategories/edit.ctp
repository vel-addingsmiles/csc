<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Product Catagory Details</h4>

                         <div class="card-body">                 

                            <?= $this->Form->create($productSubCategory,['novalidate' => true ]) ?>
                                <div class="form-group">
                                    <label for="exampleInputText">Select Main Product Catagory</label>

                                    <?php echo $this->Form->control('product_category_id',['options' => $productCategories , 'class' => 'form-control' , 'label' => false]); ?>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Select Product Catagory</label>

                                    <?php echo $this->Form->control('parent_id',['options' => $parentProductSubCategory , 'class' => 'form-control' , 'label' => false]); ?>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Sub Product Catagory Name</label>

                                    <?php echo $this->Form->control('name',[ 'placeholder' => 'Product Catagory' , 'class' => 'form-control' , 'label' => false]); ?>

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