<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Home Page Sub Banners</h4>

                         <div class="card-body">                 

                            <?= $this->Form->create($homepageSubBanner,['novalidate' => true , 'type' => 'file' ]) ?>
                                <div class="form-group">
                                    <label for="exampleInputText">Banner Title</label>

                                    <?php echo $this->Form->control('title',[ 'placeholder' => 'Banner Title' , 'class' => 'form-control' , 'label' => false]); ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputText">Banner Sub Title</label>

                                    <?php echo $this->Form->control('sub_title',[ 'placeholder' => 'Banner Sub Title' , 'class' => 'form-control' , 'label' => false]); ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputText">Category</label>

                                    <?php echo $this->Form->control('product_sub_category_id',[ 'placeholder' => 'Banner Sub Title' , 'class' => 'form-control' , 'label' => false , 'options' => $productSubCategories]); 
                                     ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputText">Banner Image</label>

                                    <?php echo $this->Form->control('sub_banner',[ 'class' => 'form-control' , 'label' => false , 'type' => 'file']); ?>

                                    <input type="hidden" name="image_hid" value="<?php echo $homepageSubBanner['sub_banner']; ?>">
                                    <img src="<?php echo $this->Url->build('/uploads/slider/'.$homepageSubBanner['sub_banner']); ?>" width="150">
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