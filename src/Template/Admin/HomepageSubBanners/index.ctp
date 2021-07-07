<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Sub Banner Details</h4>

                         <div class="card-body">                 
                         
                        </div>
                        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($homepageSubBanners as $key => $homepageBanner) {  ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><img src="<?php echo $this->Url->build('/uploads/slider/'.$homepageBanner['sub_banner']); ?>" width="150"></td>
                                        <td><?php echo $homepageBanner['title']; ?></td>

                                        <td><?= $homepageBanner->has('product_sub_category') ? $homepageBanner->product_sub_category->name : '' ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo $this->Url->build('/admin/homepage-sub-banners/edit/'.$homepageBanner->id); ?>" type="button" class="btn btn-outline-secondary btn-sm"><i class="far fa-edit"></i></a>
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