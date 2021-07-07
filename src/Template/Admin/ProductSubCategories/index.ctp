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
                        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Main Category</th>
                                    <th>Sub Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($productSubCategories as $key => $category) {  ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $category['name']; ?></td>                                        
                                        <td><?= $category->has('product_category') ? $this->Html->link($category->product_category->name, ['controller' => 'ProductSubCategories', 'action' => 'edit', $category->product_category->id]) : '' ?></td>
                                        <td><?= $category->has('parent_product_sub_category') ? $this->Html->link($category->parent_product_sub_category->name, ['controller' => 'ProductSubCategories', 'action' => 'edit', $category->parent_product_sub_category->id]) : '' ?>
                                            
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo $this->Url->build('/admin/product-sub-categories/edit/'.$category->id); ?>" type="button" class="btn btn-outline-secondary btn-sm"><i class="far fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div><!-- container -->

    <?php echo $this->element('back_end/footer'); ?>  
</div>
<!-- end page content