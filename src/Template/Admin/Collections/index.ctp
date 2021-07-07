<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Collection Details</h4>

                         <div class="card-body">                 
                                         
                        </div>
                        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Collection Image</th>
                                    <th>Category Pointed</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($collections as $key => $collection) {  ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <img class="img-responsive" src="<?php echo $this->Url->build('/uploads/collections/'.$collection['image']); ?>" alt="" width="100px">
                                        </td>
                                        <td><?php echo $collection['product_sub_category']['name']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo $this->Url->build('/admin/collections/edit/'.$collection->id); ?>" type="button" class="btn btn-outline-secondary btn-sm"><i class="far fa-edit"></i></a>
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