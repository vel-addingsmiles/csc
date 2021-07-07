<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">SideBar Details</h4>

                         <div class="card-body">                 

                            <?= $this->Form->create($sidebar,['novalidate' => true , 'type' => 'file' ]) ?>
                                <div class="form-group">
                                    <label for="exampleInputText">Image pointed to (select category)</label>

                                    <?php echo $this->Form->control('product_sub_category_id',[ 'options' => $productCategories , 'class' => 'form-control select2' , 'label' => false]); ?>

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputText">Price</label>

                                    <?php echo $this->Form->control('price',[ 'placeholder' => 'Enter Price' , 'class' => 'form-control select2' , 'label' => false]); ?>

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputText">Image pointed to (select category)</label>

                                    <?php echo $this->Form->control('text',[ 'placeholder' => 'Enter Text' , 'class' => 'form-control' , 'label' => false]); ?>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputText">SideBar Image</label>

                                    <?php echo $this->Form->control('image',[  'class' => 'form-control' , 'label' => false , 'type' => 'file']); ?>

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