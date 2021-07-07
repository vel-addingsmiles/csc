<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Collection Details</h4>

                         <div class="card-body">                 

                            <?= $this->Form->create($collection,['novalidate' => true , 'type' => 'file' ]) ?>
                                <div class="form-group">
                                    <label for="exampleInputText">Image pointed to (select category)</label>

                                    <?php echo $this->Form->control('product_sub_category_id',[ 'options' => $productCategories , 'class' => 'form-control select2' , 'label' => false]); ?>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputText">Collection Image</label>

                                    <?php echo $this->Form->control('image',[ 'placeholder' => 'Collection' , 'class' => 'form-control' , 'label' => false , 'type' => 'file']); ?>


                                    <?php if(!empty($collection['image'])){ ?>

                                        <img class="img-responsive" src="<?php echo $this->Url->build('/uploads/collections/'.$collection['image']); ?>" alt="" width="100px">

                                        <input type="hidden" name="image_hidden" value="<?php echo $collection['image']; ?>">

                                    <?php } ?>

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