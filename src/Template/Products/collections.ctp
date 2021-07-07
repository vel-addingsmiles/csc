<main>
 <!-- HOME MAIN  -->
    <section class="home-slider simple-head1 mobile_banner collections_banner" data-stellar-background-ratio="0.5"> 
      
      <!-- Container Fluid -->
      <div class="container-fluid">
        <div class="position-center-center"> 
          
          <!-- Header Text -->
          <div class="col-lg-7 col-lg-offset-5">
           <span class="price"><small></small></span>
           <!--  <h4>The Latest Product from ecoshop</h4>
            <h1 class="extra-huge-text">look hot
              with style</h1> -->
            <!-- <div class="text-center"> <a href="#" class="btn btn-round margin-top-40"></a> </div> -->
          </div>
        </div>
      </div>
    </section>
    
    <!-- Content -->
    <div id="content"> 
      
      <!-- Popular Products -->
      <section class="padding-top-150">
        <div class="container"> 
          
          <!-- Main Heading -->
          <div class="heading text-center">
            <h4>Summer Colllections</h4>
            <span>Take a tropical fashion tour this summer with chennis.</span> </div>
          
          <!-- NEW ARRIVAL -->
          <div class="new-arrival-list">
            <ul class="row">
              
              <!-- SHOP_ITEMS -->
              <li class="col-md-6"> 
                
                <!-- SHOP ITEM 1 -->
                <article> <a href="<?php echo $this->Url->build('/products/category/'.$collections[0]['product_sub_category']['slug']); ?>"><img class="img-responsive" src="<?php echo $this->Url->build('/uploads/collections/'.$collections[0]['image']); ?>" alt=""></a>
                   <!-- <div class="position-center-center">
                   <h4><a href="sale.php">leather bag</a></h4> 
                    <a href="sale.php" class="btn btn-small btn-round"></a> </div>-->
                </article>
                
                <!-- SHOP ITEM 3 -->
                <article> <a href="<?php echo $this->Url->build('/products/category/'.$collections[2]['product_sub_category']['slug']); ?>"><img class="img-responsive" src="<?php echo $this->Url->build('/uploads/collections/'.$collections[2]['image']); ?>" alt=""></a>
                  <!--<div class="position-center-center">
                     <h4><a href="sale.php">graphiti tshirt</a></h4> 
                    <a href="sale.php" class="btn btn-small btn-round">Shop Now</a> </div>-->
                </article>
              </li>
              <li class="col-md-6"> 
                
                <!-- SHOP_ITEM 2 -->
                <article> <a href="<?php echo $this->Url->build('/products/category/'.$collections[1]['product_sub_category']['slug']); ?>"><img class="img-responsive" src="<?php echo $this->Url->build('/uploads/collections/'.$collections[1]['image']); ?>" alt=""></a>
                  <!--<div class="position-center-center">
                     <h4><a href="sale.php">leather bag</a></h4> 
                    <a href="sale.php" class="btn btn-small btn-round">Shop Now</a> </div>-->
                </article>
                
                <!-- SHOP_ITEM 4 -->
                <article> <a href="<?php echo $this->Url->build('/products/category/'.$collections[3]['product_sub_category']['slug']); ?>"><img class="img-responsive" src="<?php echo $this->Url->build('/uploads/collections/'.$collections[3]['image']); ?>" alt=""></a>
                  <!--<div class="position-center-center">
                    <h4><a href="sale.php">female tshirt</a></h4> 
                    <a href="sale.php" class="btn btn-small btn-round">Shop Now</a> </div>-->
                </article>
              </li>
            </ul>
            
            <!-- SHOW MORE 
            <div class="text-center margin-top-50"> <a href="sale.php" class="btn btn-small btn-round"></a> </div> -->
          </div>
        </div>
      </section>
    
    
    
    <div class="container"><a href="<?php echo $this->Url->build('/products/category/'.$collections[4]['product_sub_category']['slug']); ?>">
      <section class="special-offers-section" style="margin-top: 100px;background: #f7f7f7 url('<?php echo $this->Url->build('/uploads/collections/'.$collections[4]['image']); ?>') top center no-repeat;background-size: cover;padding: 19% 0;">
        
          <div class="col-md-8 center-block">
            <!-- <h4>special</h4>
            <h1 class="extra-huge-text"> men’s
              sale </h1> --> 
              </div>
       
      </section></a>
     </div>
    <div class="container"><a href="<?php echo $this->Url->build('/products/category/'.$collections[5]['product_sub_category']['slug']); ?>">
    <section class="special-offers-section" style="margin-top: 100px;background: #f7f7f7 url('<?php echo $this->Url->build('/uploads/collections/'.$collections[5]['image']); ?>') top center no-repeat;background-size: cover;padding: 19% 0;">
        
          <div class="col-md-8 center-block">
            <!-- <h4>special</h4>
            <h1 class="extra-huge-text"> men’s
              sale </h1> -->
            <!-- <a href="sale.php" > </a>--> </div> 
       
      </section></a>
     </div>
     
     
     <div class="container"><a href="<?php echo $this->Url->build('/products/category/'.$collections[6]['product_sub_category']['slug']); ?>">
    <section class="special-offers-section" style="margin-top: 100px;background: #f7f7f7 url('<?php echo $this->Url->build('/uploads/collections/'.$collections[6]['image']); ?>') top center no-repeat;background-size: cover;padding: 19% 0;">
      
          <div class="col-md-8 center-block">
            <!-- <h4>special</h4>
            <h1 class="extra-huge-text"> men’s

              sale </h1> -->
            <!-- <a href="sale.php" > </a> --> 
          </div>
        
      </section></a>
    </div>
    <br/>
    <br/>
      
      <!-- Popular Products -->
      <section class="padding-bottom-150">
        <div class="container"> 
          
          <!-- Main Heading -->
          <div class="heading text-center">
            <h4>TOP TRENDING</h4>
            <span>Start your fashion journey with our classic products and cherish your shopping experience</span> </div>
          
          <!-- Popular Item Slide -->
          <div class="papular-block block-slide"> 
            
         
         
          <?php foreach ($products as $key => $product) {  ?>
            <!-- Item -->
            <div class="item"> 
              <?php if(!empty($product['compare_price'])){?>
                 <div class="on-sale">
                      <?php 

                        $discount=($product['compare_price']-$product['price']);
                  
                        $percentage=(($discount/$product['compare_price'])*100);
                                  
                        echo round($percentage).'% <span>OFF</span>'; ?> 
                  </div><?php } else {  }?> 
            <!-- Item img -->
              <div class="item-img">
                <img class="img-1" src="<?php echo $this->Url->build('/uploads/products/'.$product['product_image_1']); ?>" alt="" > 
                <img class="img-2" src="<?php echo $this->Url->build('/uploads/products/'.$product['product_image_2']); ?>" alt="" >         
                   <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                     <div class="inn">
                        <!-- <a href="<?php echo $this->Url->build('/products/view/'.$product['slug']) ?>" data-lighter><i class="icon-magnifier"></i></a>  -->
                        <a href="<?php echo $this->Url->build('/products/view/'.$product['slug']) ?>"><i class="icon-basket"></i></a>
                         <!-- <a href="<?php echo $this->Url->build('/products/view/'.$product['slug']) ?>" ><i class="icon-heart"></i></a> -->
                       </div>
                  </div>
                </div>
              </div>
               
              <!-- Item Name -->
             <div class="item-name"> 
                <a href="<?php echo $this->Url->build('/products/view/'.$product['slug']) ?>"><?php echo $product['product_sub_category']['name']; ?></a>      <!-- <p></p> -->
              </div>
              <span class="price"><small>&#8377;</small><?php echo $product['price']; ?>  <strike><small>&#8377;</small><?php echo $product['compare_price']; ?></strike></span>          
 
            </div>
            <!-- Price --> 
                 
            <?php } ?>
            <!-- Item -->
        </div>
        </div>
      </section>
      
 
     
  </main>
