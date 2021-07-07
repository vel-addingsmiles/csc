<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Discount Details</h4>

                        <a href="<?php echo $this->Url->build('/admin/discounts/add'); ?>" class="btn btn-primary">Discount Add</a>

                        <br><br>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                <tr>
                                    <th>Id</th>
                                    <th class="text-center">Discount Code</th>
                                    <th class="text-center">Expiry Date</th>
                                    <th class="text-center">Discount</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($discounts as $key => $discount) {  ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td class="text-center">
                                            <?php echo $discount['code']; ?>
                                        </td>       
                                         <td class="text-center">
                                            <?php echo date('d F Y',strtotime($discount['expiry_date'])); ?>
                                        </td>  
                                         <td class="text-center">
                                            <?php echo $discount['discount']; ?>
                                            <?php if($discount['discount_type'] == 1){ echo "%"; }else{ echo "₹"; } ?>
                                        </td>                                 
                                        
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="<?php echo $this->Url->build('/admin/discounts/edit/'.$discount->id); ?>" type="button" class="btn btn-outline-secondary btn-sm"><i class="far fa-edit"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <?= $this->Form->postLink(__('<i class="far fa-trash-alt"></i>'),['action' => 'delete', $discount->id],[ 'class' => 'btn btn-outline-secondary btn-sm' , 'escape' => false,  'confirm' => __('Are you sure you want to delete ?')])
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