  <section class="sub-bnr desktop_banner" data-stellar-background-ratio="0.5" style="background: url('<?php echo $this->Url->build('/uploads/collections/'.$category['image']); ?>') no-repeat;">


    <div class="position-center-center">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="<?php echo $this->Url->build('/'); ?>">Home</a></li>
        </ol>
      </div>
    </div>
  </section>

  <?php if($category['mobile_image'] != ''){ $image = $category['mobile_image']; }else{ $image = $category['image'];}?>

  <section class="sub-bnr mobile_banner" data-stellar-background-ratio="0.5" style="background: url('<?php echo $this->Url->build('/uploads/collections/'.$image); ?>') no-repeat !important;background-size: cover !important;">
  <!--   <div class="position-center-center">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="<?php echo $this->Url->build('/'); ?>">Home</a></li>
        </ol>
      </div>
    </div> -->
  </section>

  <!-- Content -->
  <div id="content"> 
    
    <!-- Products -->
    <section class="shop-page padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="row"> 
          
          <?php echo $this->element('front_end/sidebar'); ?>         
          <!-- Item Content -->
          <div class="col-sm-9">
            
            <!-- Popular Item Slide -->
            <div class="papular-block row"> 
                                   <!-- Item -->

              <?php foreach ($products as $key => $product) {  ?>
              <div class="col-md-4">
                    <!-- Item -->
                  <div class="item"> 
                    <?php if($product['price'] != $product['cost_per_item']){ ?>
                      <?php if(!empty($product['compare_price'])){?>
                      <div class="on-sale">
                          <?php 
                            
                            $discount = ( $product['compare_price']/$product['cost_per_item'] )*100;

                            echo round($discount).'% <span>OFF</span>'; ?> 
                      </div><?php } else {  }?> 
                      <?php } ?>
                    <!-- Item img -->
                      <div class="item-img">
                        <img class="img-1" src="<?php echo $this->Url->build('/uploads/products/'.$product['product_image_1']); ?>" alt="" > 
                        <img class="img-2" src="<?php echo $this->Url->build('/uploads/products/'.$product['product_image_2']); ?>" alt="" >         
                           <!-- Overlay -->
                        <div class="overlay">
                          <div class="position-center-center">
                             <div class="inn">
                              <!-- <a href="<?php echo $this->Url->build('/products/view/'.$product['slug']) ?>" data-lighter><i class="icon-magnifier"></i></a>  -->
                              <!-- <a href="<?php echo $this->Url->build('/products/view/'.$product['slug']) ?>"><i class="icon-basket"></i></a> -->

                              <a href="<?php echo $this->Url->build('/products/view/'.$product['slug']) ?>"><i class="icon-eye"></i></a>


                              <a href="<?php echo $this->Url->build('/products/addTowish/'.$product['id']) ?>" title="Add to wish list"><i class="icon-heart"></i></a>

                               <!-- <a href="<?php echo $this->Url->build('/products/view/'.$product['slug']) ?>" ><i class="icon-heart"></i></a> -->
                             </div>
                          </div>
                        </div>
                      </div>
                       
                      <!-- Item Name -->
                     <div class="item-name"> 
                        <a href="<?php echo $this->Url->build('/products/view/'.$product['slug']) ?>"><?php echo $product['product_sub_category']['name']; ?></a>      <!-- <p></p> -->
                      </div>
                      <span class="price"><small>&#8377;</small><?php echo $product['price']; ?>  <strike><small>&#8377;</small><?php echo $product['cost_per_item']; ?></strike></span>          
         
                    </div>
         
                  
 
              </div>

         
               <?php } ?>

            </div>

            
            <!-- Pagination -->
      <!--      <div class="dataTables_paginate paging_simple_numbers pull-right" id="example1_paginate"><ul class="pagination">
                  <li class="paginate_button previous disabled" id="example1_previous">
                 
	            </li>
                  
                  </ul>
            </div> -->

            <center>
              <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </center>
            <?php if(!empty($this->Paginator->numbers())){ ?>
             <div class="paginator pull-left">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
            </div>
          <?php } ?>


          </div>
        </div>
      </div>
    </section>
    
    
    
    <?php echo $this->element('front_end/about'); ?>
  </div>