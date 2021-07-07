<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  

        <?= $this->Form->create($product,['novalidate' => false , 'type' => 'file' ]) ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body"> 
                        <h4 class="mt-0 header-title">Add Product</h4>
                        <p class="text-muted mb-4">Parsley is a javascript form validation
                            library. It helps you provide your users with feedback on their form
                            submission before sending it to your server.
                        </p>  
                        <div class="form-group">
                            <label>Product Name</label>
                            <?php echo $this->Form->control('product_name',[ 'placeholder' => 'Product Name' , 'class' => 'form-control' , 'label' => false]); ?>
                        </div> 
                        <div class="form-group">
                            <label>Main Catagory</label>
                            <?php echo $this->Form->control('product_category_id',[ 'class' => 'select2 form-control mb-3 custom-select category' , 'label' => false , 'options' => $productCategories ]); ?>                            
                        </div> 
                        <div class="form-group">
                            <label>Sub Catagory</label>
                            <?php echo $this->Form->control('product_sub_category_id',[ 'class' => 'select2 form-control mb-3 custom-select' , 'label' => false , 'id' => 'sub_category' , 'options' => $productSubCategories ]); ?>                            
                        </div> 
                        <div class="form-group">
                            <label>TAGS</label>
                            <?php echo $this->Form->control('tags[]',[ 'class' => 'select2 form-control mb-3 custom-select' , 'multiple' , 'label' => false , 'options' => $tags , 'data-placeholder' => 'choose tags']); ?>
                        </div> 
                        <div class="form-group">
                            <label>Product Features</label>                            
                            <?php echo $this->Form->control('product_features',[ 'id' => 'elm1' , 'type' => 'textarea' ,  'label' => false]); ?>
                        </div> 

                        <div class="form-group">
                            <label>Product Description</label>
                            <?php echo $this->Form->control('product_description',[ 'id' => 'elm1' , 'type' => 'textarea' ,  'label' => false]); ?>
                        </div> 

                        <div class="form-group">
                             <h4 class="mt-0 header-title">Product Image</h4>
                            <input type="file" name="product_image_1" id="input-file-now" class="dropify" required="" />
                        </div> 
                        <div class="form-group">
                             <h4 class="mt-0 header-title">Product Image</h4>
                            <input type="file" name="product_image_2" id="input-file-now" class="dropify" required=""/>
                        </div> 

                        <div class="form-group">
                             <h4 class="mt-0 header-title">Product Image</h4>
                            <input type="file" name="product_image_3" id="input-file-now" class="dropify" required=""/>
                        </div> 
                        <div class="form-group">
                             <h4 class="mt-0 header-title">Product Image</h4>
                            <input type="file" name="product_image_4" id="input-file-now" class="dropify" required=""/>
                        </div> 
                        <div class="form-group">
                             <h4 class="mt-0 header-title">Product Image</h4>
                            <input type="file" name="product_image_5" id="input-file-now" class="dropify" />
                        </div> 
                        <div class="form-group">
                             <h4 class="mt-0 header-title">Product Image</h4>
                            <input type="file" name="product_image_6" id="input-file-now" class="dropify" />
                        </div> 
                        <div class="form-group">
                             <h4 class="mt-0 header-title">Product Image</h4>
                            <input type="file" name="product_image_7" id="input-file-now" class="dropify" />
                        </div>  


                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                    <p class="text-muted mb-4">Parsley is a javascript form validation
                            library. It helps you provide your users with feedback on their form
                            submission before sending it to your server.
                        </p>     
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                <label>Sale Price</label>
                                <?php echo $this->Form->control('price',[ 'placeholder' => 'Sale Price' , 'class' => 'form-control' , 'label' => false , 'required' => true]); ?>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-4 mb-3">
                                <label for="validationTooltip02">Discount Price</label>
                                <?php echo $this->Form->control('compare_price',[ 'placeholder' => 'Discount Price' , 'class' => 'form-control' , 'label' => false]); ?>
                            </div><!--end col-->
                            <div class="col-md-4 mb-3">
                                <label for="validationTooltipUsername">Actual Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend">Rs</span>
                                    <?php echo $this->Form->control('cost_per_item',[ 'placeholder' => 'Actual Price' , 'class' => 'form-control' , 'label' => false]); ?>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div> 

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationTooltip01">Country</label>
                                <?php echo $this->Form->control('country_id',[ 'class' => 'select2 form-control mb-3 custom-select' , 'label' => false , 'options' => $countries ]); ?>
                            </div><!--end col-->
                            <div class="col-md-6 mb-3">
                                <label for="validationTooltip02">HS Code</label>
                                <?php echo $this->Form->control('hs_code',[ 'placeholder' => 'Harmonized System' , 'class' => 'form-control' , 'label' => false]); ?>
                            </div><!--end col-->
                        </div> 
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <div class="custom-control custom-checkbox">
                                   <input type="checkbox" id="check_newarrival" name="new_arrivals" class="custom-control-input checkboxCustom" >
                                    <label class="custom-control-label" for="check_newarrival">NEW ARRIVALS</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-4 mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="check_toptrending" name="top_trending" class="custom-control-input checkboxCustom" >
                                    <label class="custom-control-label" for="check_toptrending">TOP TRENDING</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-4 mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="check_on_sales" name="on_sales" class="custom-control-input checkboxCustom">
                                    <label class="custom-control-label" for="check_on_sales">ON SALE</label>
                                </div>
                            </div><!--end col-->
                        </div> 



                        <div class="form-group row">
                         <!--end fieldset-->
                            <table class="table table-bordered physical_product_size box" id="dynamicTable_sku" >  
                                <tbody>
                                    <tr>
                                        <th><label class="control-label">SKU Code</label></th>
                                        <th> <label class="control-label">Size</label></th>
                                        <th> <label class="control-label">Quantity</label></th>
                                        <th><button type="button" id="add_more_sku" class="btn btn-success">Add More</button> 
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo $this->Form->control('data_sizes[sku_code][]',[ 'placeholder' => 'SKU Code' , 'class' => 'form-control' , 'label' => false , 'required']); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->Form->control('data_sizes[size][]',[ 'placeholder' => 'Size' , 'class' => 'form-control' , 'label' => false , 'required']); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->Form->control('data_sizes[quantity][]',[ 'placeholder' => 'Quantity' , 'class' => 'form-control' , 'label' => false , 'required']); ?>
                                        </th>
                                        <th>
                                           <!--  <button type="button" id="remove_1" class="btn btn-danger remove-tr">Remove</button> -->
                                        </th>
                                    </tr>  
                                </tbody>
                            </table> 
                        </div><!--end form-group-->

                        <div class="form-group track_quantity box row">


                            <div class="col-md-6 mb-3">
                             <label for="validationTooltipsku">Sold Quantity</label>
                                <?php echo $this->Form->control('sold_quantity',[ 'placeholder' => 'Sold Quantity' , 'class' => 'form-control' , 'label' => false]); ?>
                            </div><!--end col-->

                             <div class="col-md-6 mb-3">
                                <label for="validationTooltipUsername">Barcode (ISBN, UPC, GTIN</label>
                                <div class="input-group">
                                    <?php echo $this->Form->control('barcode',[ 'placeholder' => 'Barcode' , 'class' => 'form-control' , 'label' => false]); ?>
                                </div>
                            </div><!--end col-->

                        </div>

                        <div class="form-group track_quantity box row">
                            <div class="col-md-6 mb-3">
                                <label for="validationTooltipUsername">Weight (optional) </label>
                                <div class="input-group">
                                    <label>Used to calculate shipping rates at checkout and label prices during fulfillment. Country of origin</label>
                                    <?php echo $this->Form->control('weight',[ 'placeholder' => 'Product Weight' , 'class' => 'form-control' , 'type' => 'number' , 'label' => false]); ?>
                                </div>
                            </div>                                    
                        </div>


                        <div class="form-group row">
                           <div class="col-md-6 mb-3">
                             <label for="validationTooltipShip">VARIANTS ( optional )</label>
                            </div>                      
                                     
                         <!--end fieldset-->
                            <table class="table table-bordered physical_product_size box" id="dynamicTable" >  
                                <tbody>
                                    <tr>
                                        <th><label class="control-label">Product Option</label></th>
                                        <th> <label class="control-label">Options</label></th>
                                        <th><button type="button" name="add" id="add_more" class="btn btn-success">Add More</button> 
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo $this->Form->control('data[varient][]',[ 'class' => ' form-control selectVariant mb-3 custom-select'  , 'label' => false , 'options' => $varients ,  'empty' => 'Select Varient'  ]); ?>
                                        </th>
                                        <th>
                                            <select class="form-control sub_variant" id="sub_varient_1" name="data[sub_varient][]">
                                            </select>
                                        </th>
                                        <th>
                                           <!--  <button type="button" id="remove_1" class="btn btn-danger remove-tr">Remove</button> -->
                                        </th>
                                    </tr>  
                                </tbody>
                            </table> 
                        </div><!--end form-group-->

                        <div class="form-group">
                             <h4 class="mt-0 header-title">Meta Title</h4>
                             <?php echo $this->Form->control('meta_title',[ 'id' => 'elm1' , 'type' => 'textarea' ,  'label' => false]); ?>
                        </div> 
                        <div class="form-group">
                             <h4 class="mt-0 header-title">Meta Description</h4>
                             <?php echo $this->Form->control('meta_description',[ 'id' => 'elm1' , 'type' => 'textarea' ,  'label' => false]); ?>
                        </div>  

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </div>
            </div> <!-- end col --> 
        </div>
        <?= $this->Form->end() ?>
    </div><!-- container -->

    <?php echo $this->element('back_end/footer'); ?>  
</div>