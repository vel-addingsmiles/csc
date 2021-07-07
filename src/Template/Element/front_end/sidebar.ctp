<!-- Shop SideBar -->
<div class="col-sm-3">
  <div class="shop-sidebar"> 
    
    <!-- Category -->
    <h5 class="shop-tittle margin-bottom-30">category</h5>
    <ul class="shop-cate">
      <?php  foreach ($sub_category_intial as $key => $suBCategory) { ?>
        <li><a href="<?php echo $this->Url->build('/products/category/'.$suBCategory['slug']); ?>">
      <?php echo $suBCategory['name']; ?>	<span>

        <?php

                $count = 0;

                foreach ($suBCategory['child_product_sub_categories'] as $key => $value) {
                   $count += count($value['products']);
                }

                echo $count;

         ?>
          


        </span></a></li>
     <?php } ?>
    </ul>
    
    <!-- FILTER BY PRICE -->
    <!-- <h5 class="shop-tittle margin-top-60 margin-bottom-30">FILTER BY PRICE</h5> -->
        <!-- BRAND -->
    <h5 class="shop-tittle margin-top-60 margin-bottom-30">brands</h5>
    <ul class="shop-cate">
    
      <?php foreach ($sub_category_intial_brand as $key => $sub_category_intial_brands) { ?>

            <?php if(count($sub_category_intial_brands['products']) > 0){ ?>
              <li>
                <a href="<?php echo $this->Url->build('/products/category/'.$sub_category_intial_brands['slug']); ?>">
                    <?php echo $sub_category_intial_brands['name']; ?>
                    <span><?php echo count($sub_category_intial_brands['products']); ?></span></a>
              </li>
            <?php } ?>
                              

     <?php } ?>                         
                                             
      
    </ul>
    <!-- TAGS -->
    <!-- <h5 class="shop-tittle margin-top-60 margin-bottom-30">FILTER BY COLORS</h5>
    <ul class="colors">
      <li><a href="#." style="background:#958170;"></a></li>
      <li><a href="#." style="background:#c9a688;"></a></li>
      <li><a href="#." style="background:#c9c288;"></a></li>
      <li><a href="#." style="background:#a7c988;"></a></li>
      <li><a href="#." style="background:#9ed66b;"></a></li>
      <li><a href="#." style="background:#6bd6b1;"></a></li>
      <li><a href="#." style="background:#82c2dc;"></a></li>
      <li><a href="#." style="background:#8295dc;"></a></li>
      <li><a href="#." style="background:#9b82dc;"></a></li>
      <li><a href="#." style="background:#dc82d9;"></a></li>
      <li><a href="#." style="background:#dc82a2;"></a></li>
      <li><a href="#." style="background:#e04756;"></a></li>
      <li><a href="#." style="background:#f56868;"></a></li>
      <li><a href="#." style="background:#eda339;"></a></li>
      <li><a href="#." style="background:#edd639;"></a></li>
      <li><a href="#." style="background:#daed39;"></a></li>
      <li><a href="#." style="background:#a3ed39;"></a></li>
      <li><a href="#." style="background:#f56868;"></a></li>
    </ul> -->
    
    <!-- TAGS -->
    <h5 class="shop-tittle margin-top-60 margin-bottom-30">POPULAR TAGS</h5>
    <ul class="shop-tags">
      <?php foreach ($sidebar_tags as $key => $sidebar_tag) { ?>
        <li><a href="<?php echo $this->Url->build('/products/tags/'.$sidebar_tag['id']); ?>"><?php echo $sidebar_tag['name']; ?><span>24</span></a></li>
      <?php } ?>
    </ul>
    

    
    <!-- SIDE BACR BANER -->

    <?php foreach ($sidebars as $key => $sidebar) { ?>
      <a href="<?php echo $this->Url->build('/products/category/'.$sidebar['product_sub_category']['slug']); ?>">
        <div class="side-bnr margin-top-50"> <img class="img-responsive" src="<?php echo $this->Url->build('/uploads/collections/'.$sidebar['image']); ?>" alt="">
          <div class="position-center-center"> <span class="price"><small>&#8377;</small><?php echo $sidebar['price']; ?></span>
            <div class="bnr-text"><?php echo $sidebar['text']; ?></div>
          </div>
        </div>
      </a>
    <?php } ?>



  </div>
</div> 