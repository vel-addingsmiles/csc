<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Main Banner Details</h4>

                         <div class="card-body">                 
                            <a href="<?php echo $this->Url->build('/admin/homepage-banners/add'); ?>" class="btn btn-primary">Add Banner</a>  
                        </div>
                        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($homepageBanners as $key => $homepageBanner) {  ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><img src="<?php echo $this->Url->build('/uploads/slider/'.$homepageBanner['image']); ?>" width="150"></td>
                                        <td><?php echo $homepageBanner['title']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo $this->Url->build('/admin/homepage-banners/edit/'.$homepageBanner->id); ?>" type="button" class="btn btn-outline-secondary btn-sm"><i class="far fa-edit"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <?= $this->Form->postLink(__('<i class="far fa-trash-alt"></i>'),['action' => 'delete', $homepageBanner->id],[ 'class' => 'btn btn-outline-secondary btn-sm' , 'escape' => false,  'confirm' => __('Are you sure you want to delete {0}?', $homepageBanner->title)])
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