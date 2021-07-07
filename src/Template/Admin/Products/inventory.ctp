<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Inventory Details</h4>


                        <br><br>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product</th>
                                    <th>SKU Code</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($sizes as $key => $size) {  ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <img src="<?php echo $this->Url->build('/uploads/products/'.$size['product']['product_image_1']); ?>" height="52">
                                            <p class="d-inline-block align-middle mb-0">
                                                <a href="" class="d-inline-block align-middle mb-0 product-name"><?php echo $size['product']['product_name']; ?></a> 
                                            </p>
                                        </td>  
                                        <td>
                                            <?php echo $size['sku_code']; ?>
                                        </td>  
                                        <td>
                                            <?php echo $size['size']; ?>
                                        </td>  
                                        <td width="5%">
                                            <input type="number" min="1" name="" class="form-control quantity" data-id="<?php echo $size['id']; ?>" value="<?php echo $size['quantity']; ?>">
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
<!-- end page content-->

<script type="text/javascript">
$(document).on('blur','.quantity',function(){

    $.ajax({
              type: "POST",
              url: '<?php echo $this->Url->build('/admin/products/increase-quantity'); ?>',
              dataType: "json",
              data: {quantity:$(this).val(),id:$(this).attr('data-id')},

              success:function(data)
              {     

                    // location.reload();     
                  
              },
              error: function (){ }
        });
     

});
</script>