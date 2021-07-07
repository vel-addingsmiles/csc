<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Product Details</h4>

                        <a href="<?php echo $this->Url->build('/admin/products/add'); ?>" class="btn btn-primary">Product Add</a>

                        <br><br>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product</th>
                                    <!-- <th>Main Category</th> -->
                                    <th>Sub Category</th>
                                    <!-- <th>Product Category</th> -->
                                    <th>Price</th>
                                    <!-- <th>Status</th> -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($products as $key => $product) {  ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <img src="<?php echo $this->Url->build('/uploads/products/'.$product->product_image_1); ?>" height="52">
                                            <p class="d-inline-block align-middle mb-0">
                                                <a href="" class="d-inline-block align-middle mb-0 product-name"><?php echo $product['product_name']; ?></a> 
                                            </p>
                                        </td>                                      
                                        
                                   <!--      <td><?= $product->has('product_category') ? $product->product_category->name : '' ?></td> -->
                                        <td><?= $product->has('product_sub_category') ? $product->product_sub_category->name : '' ?></td>

                                   <!--      <td><?= $product->has('product_sub_category') ? $product->product_sub_category->parent_product_sub_category->name : '' ?></td> -->
                                        <td><?php echo $product['price']; ?></td>
                                       <!--  <td><?php if($product->quantity_count >0 ){ ?><span class="badge badge-soft-warning">Stock</span><?php }else{ ?>
                                        <span class="badge badge-soft-info">Out of Stock</span> <?php } ?></td> -->
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo $this->Url->build('/admin/products/edit/'.$product->id); ?>" type="button" class="btn btn-outline-secondary btn-sm"><i class="far fa-edit"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <?= $this->Form->postLink(__('<i class="far fa-trash-alt"></i>'),['action' => 'delete', $product->id],[ 'class' => 'btn btn-outline-secondary btn-sm' , 'escape' => false,  'confirm' => __('Are you sure you want to delete ?')])
                                                ?>
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