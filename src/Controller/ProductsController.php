<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['category','view','collections','newArrivals','index','tags','checkProductAvailability','addToCart','myCart','test','updateCart','removeCart']);
    }


    public function addTowish($id = null)
    {
        $this->loadModel('WishLists');

        $checkWishList = $this->WishLists->find('all',[
            'conditions' => ['product_id' => $id , 'user_id' => $this->Auth->User('id')]
        ])->toArray();

        if(empty($checkWishList)){

            $wishList = $this->WishLists->newEntity();

            $wishList->product_id = $id;
            $wishList->user_id = $this->Auth->User('id');

            $this->WishLists->save($wishList);

        }

        return $this->redirect($this->referer());
    }

    public function category($id = null)
    {
        $this->loadModel('Products');
        $this->loadModel('ProductSubCategories');

        $category = $this->ProductSubCategories->find('all')->where([ 'slug' => $id])->first();


        if(empty($category)){
           return $this->redirect('/');
        }

        $category_child = $this->ProductSubCategories->find('all')->where([ 'parent_id' => $category['id']])->toArray();

        if(empty($category_child)){
            $category_child = $this->ProductSubCategories->find('all')->where([ 'id' => $category['id']])->toArray();
        }

        $categoryId = [];

        foreach ($category_child as $key => $value) {
             $categoryId[] = $value['id'];
        }

// pr($categoryId); die;
        $this->paginate = [
            'conditions' => [
                'Products.product_sub_category_id IN' => $categoryId,
                'Products.is_deleted' => 0 
            ],
            'contain' => ['ProductCategories', 'ProductSubCategories', 'Countries'],
            'order' => ['Products.id' => 'DESC']
            // 'limit' => 1
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products','category'));

        // pr($products); die;

        
    }


    public function view($id = null)
    {

        $this->loadModel('ProductDetailVarients');


        $single_product = $this->Products->find('all', [
            'conditions' => ['Products.slug' => $id , 'Products.is_deleted' => 0 ],
            'contain' => ['ProductCategories', 'ProductSubCategories', 'Countries', 'ProductTags', 'ProductDetailVarients','ProductSizes'],
        ])->first();

        if(empty($single_product)){
            return $this->redirect('/');
        }

        $products = $this->Products->find('all',[
            'conditions' => [ 'is_deleted' => 0],
            'contain' => ['ProductSubCategories'],
            'limit' => 10,
            'order' => ['Products.id' => 'DESC']
        ])->toArray();

   

        $varients = $this->ProductDetailVarients->find('all',[
            'conditions' => ['ProductDetailVarients.product_id' => $single_product['id']],
            'contain' => ['ProductVarients'  ,'ProductSubVarients']
        ])->toArray();

        $varients = json_encode( $varients);
        $varients = json_decode( $varients, TRUE );

        $checkarray = [0];

        $varient_array = [];

        foreach ($varients as $key => $varient) {


            if(in_array( $varient['product_varient_id'] , $checkarray )){
             

                $varient_array[$varient['product_varient_id']]['product_sub_varient'][$varient['product_sub_varient']['id']] = $varient['product_sub_varient']['name'];  
            }else{

                $checkarray[] = $varient['product_varient_id'];  

                $varient_array[$varient['product_varient_id']] = $varient['product_varient'];  

                $varient_array[$varient['product_varient_id']]['product_sub_varient'][$varient['product_sub_varient']['id']] = $varient['product_sub_varient']['name'];  
            }
            
        }
// pr($varient_array); die;

        $this->set('single_product', $single_product);
        $this->set('varient_array', $varient_array);
        $this->set('products', $products);
    }


    public function collections()
    {
        $this->loadModel('Collections');

        $products = $this->Products->find('all',[
            'conditions' => ['top_trending' => 1 , 'is_deleted' => 0],
            'contain' => ['ProductSubCategories'],
            'limit' => 10,
            'order' => ['Products.id' => 'DESC']
        ])->toArray();

        $collections = $this->Collections->find('all',[
            'contain' => ['ProductSubCategories']
        ])->toArray();

        // pr($collections); die;

        $this->set('products', $products);
        $this->set('collections', $collections);
    }

    public function newArrivals()
    {
        $this->loadModel('Products');
        $this->loadModel('ProductSubCategories');

        $this->paginate = [
            'conditions' => [
                'Products.new_arrivals' => 1,
                'Products.is_deleted' => 0
            ],
            'contain' => ['ProductCategories', 'ProductSubCategories', 'Countries'],
            'order' => ['Products.id' => 'DESC']
            // 'limit' => 1
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        
    }

    public function index()
    {
        $this->loadModel('Products');
        $this->loadModel('ProductSubCategories');

        $this->paginate = [
            'conditions' => [
                'Products.is_deleted' => 0 , 'on_sales' => 1
            ],
            'contain' => ['ProductCategories', 'ProductSubCategories', 'Countries'],
            'order' => ['Products.id' => 'DESC']
            // 'limit' => 1
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        
    }


    public function tags($id = null)
    {
        $this->loadModel('Products');
        $this->loadModel('ProductTags');
        $this->loadModel('Tags');
        $this->loadModel('ProductSubCategories');


        $tag = $this->Tags->get($id);

        if(empty($tag)){
           return $this->redirect('/');
        }

        $product_tags = $this->ProductTags->find('all')->where(['tag_id' => $id])->toArray();

        $tagId = [0];

        foreach ($product_tags as $key => $product_tag) {
            $tagId[] = $product_tag['product_id'];
        }

        $this->paginate = [
            'conditions' => [
                'Products.is_deleted' => 0,
                'Products.id IN' => $tagId
            ],
            'contain' => ['ProductCategories', 'ProductSubCategories', 'Countries'],
            'order' => ['Products.id' => 'DESC']
            // 'limit' => 1
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        
    }


    public function checkProductAvailability()
    {
        $this->loadModel('ProductSizes');

        $checkSizes = $this->ProductSizes->get($this->request->getData()['size_id']);
// pr($this->request->getData()); die;
        $cartItems = $this->request->getSession()->read('Cart.Products');
// pr($cartItems); die;
        if(!empty($cartItems)){
            if (array_key_exists($this->request->getData()['product_id']."_".$this->request->getData()['size_id'], $cartItems)) {
                
                // $checkProduct = $cartItems[$this->request->getData()['product_id']];

                // if($checkProduct['size_id'] == $this->request->getData()['size_id']){
                //     $inCart = 1;
                // }else{
                //     $inCart = 0;
                // }
                $inCart = 1;

            }else{
                $inCart = 0;            
            }
        }else{
            $inCart = 0;
        }
      

        echo json_encode(['availability' => $checkSizes , 'inCart' => $inCart]);

        exit;
    }

    public function addToCart()
    {
       
        $data = $this->request->getData();

        $cartArray = [];

        $cartArray['product_id'] = $this->request->getData()['product_id'];
// pr($this->request->getData()['size_id']); die;
        
        $cartArray['size_id'] = $this->request->getData()['size_id'];

        $cartArray['quantity'] = 1;

        if(!empty($data['varients_data'])){
            foreach ($data['varients_data'] as $key => $value) {
                $cartArray['varient_array'][] = $value['value'];
            }
        }else{
            $data['varients_data']= [];
        }
      
        $this->Cart->add_product($cartArray);

        $count_items = $this->Cart->get_whole_cart();

        if(!empty($count_items)){
            if(!empty($count_items['Products'])){
                $get_count_cart = count($count_items['Products']);
            }else{
                $get_count_cart = 0;
            }
            
        }else{
            $get_count_cart = 0;
        }

        // pr($count_items);die;

        echo json_encode([ 'cart_count' => $get_count_cart]);    

        exit;
    }

    public function myCart()
    {

        $this->loadModel('Products');
        $this->loadModel('ProductSubVarients');
        $this->loadModel('ProductSizes');

        $cartItems = $this->request->getSession()->read('Cart.Products');
// pr($cartItems); die;    
        $products = [];

        if(!empty($cartItems)){
            foreach ($cartItems as $key => $value) {

                $product = $this->Products->get($value['product_id']); 

                $product_size = $this->ProductSizes->get($value['size_id']);

                // pr($varients);
                // die;

                $products[$key]['product_name'] = $product['product_name'];
                $products[$key]['image'] = $product['product_image_1'];
                $products[$key]['price'] = $product['price'];
                $products[$key]['size'] = $product_size['size'];
                $products[$key]['size_id'] = $product_size['id'];
                $products[$key]['quantity'] = $value['quantity'];

                // if( isset($value['varient_array']) && !empty($value['varient_array'])){ 
                    
                //     $varients = $this->ProductSubVarients->find('all',[
                //         'conditions' => ['id IN' => $value['varient_array']]
                //     ])->toArray();

                // }else{
                //     $varients = [];
                //  }

                // if(isset($varients) && !empty($varients)){

                //     foreach ($varients as $keys => $varient) {
                //         $products[$key]['varients'][$keys] = $varient['name'];
                //     }
                // }else{
                //     $products[$key]['varients'] = [];
                // }

             
            }
        }

        $this->set(compact('products'));
        // pr($products);
        //     die;
        // pr($cartItems);die;
    }


    public function checkOut()
    {
        $this->loadModel('Countries');
        $this->loadModel('States');

        $cartItems = $this->request->getSession()->read('Cart.Products');

        $this->request->getSession()->write('Cart.Coupons');
// pr($cartItems); die;    
        $products = [];

        if(!empty($cartItems)){
            foreach ($cartItems as $key => $value) {

                $product = $this->Products->get($value['product_id']); 

                $products[$key]['product_name'] = $product['product_name'];
                $products[$key]['price'] = $product['price'];
                $products[$key]['quantity'] = $value['quantity'];

             
            }
        }

        $countries = $this->Products->Countries->find('list', []);
        $states = $this->States->find('list', [
            'conditions' => ['country_id' => 1]
        ]);

        $auth = $this->Auth->User();
        // pr($auth);die;
        $this->set(compact('countries','states','auth','products'));
    }

    public function updateCart()
    {
        $this->loadModel('ProductSizes');

        $cartItems = $this->request->getSession()->read('Cart.Products');

        $data = $this->request->getData();

        $getsize = $this->ProductSizes->get($data['size_id']);

        if($getsize['quantity'] >= $data['quantity']){



            if (array_key_exists( $data['product_id'] , $cartItems)) {

                $cartItems[$data['product_id']]['quantity'] = $data['quantity'];
                    
                    // $cartItems[ $data['product_id']['quantity'] ] = $data['quantity'];
                    
                    $this->request->getSession()->write('Cart.Products', $cartItems);
            }

            $this->Flash->success('Cart quantity has been updated');

        }else{

            $this->Flash->error('Updated quantity not available, please proceed with previous quantity');

        }

        echo json_encode([ 'message' => 1]);    

        exit;
    }


     /*Removing product from cart*/
    public function removeCart($id = null)
    {
        $data['product_id'] = $id;
        $this->Cart->remove_item($data);            

        $this->Flash->success('Product has been removed from your cart');
        $this->redirect(['action' => 'myCart']);
        
    }

    public function getStates()
    {
        $this->loadModel('States');

        $state = $this->States->find('all')->where(['country_id' => $this->request->getData()['country_id']])->toArray();

        echo json_encode(['states' => $state]);
        exit;
    }

    public function checkCoupons()
    {
        $this->loadModel('Discounts');
        $this->loadModel('Orders');

        $getcoupon = $this->Discounts->find('all',[
            'conditions' => ['code' => $this->request->getData()['coupon_code'] , 'expiry_date >=' => date('Y-m-d') ]
        ])->first();

        if(!empty($getcoupon)){

            $orders = $this->Orders->find('all',[
                'conditions' => [
                    'discount_id' => $getcoupon['id'],
                    'user_id' => $this->Auth->User('id'),
                    'status' => 1
                ]
            ])->toArray();

            if(empty($orders)){

                echo json_encode(['status' => 2 , 'coupons' => $getcoupon]);

                 $this->request->getSession()->write('Cart.Coupons', ['coupon_id' => $getcoupon['id']] );

            }else{
                echo json_encode(['status' => 1]);
            }

        }else{

                echo json_encode(['status' => 0]);

        }

        exit;
    }

    public function test()
    {
        $cartItems = $this->request->getSession()->read('Cart');
pr($cartItems);
        die;
        $data = ['product_id' => 23 , 'size_id' => 8 , 'quantity' => 1 , 'varients' => [1,2,3] ];
        $this->Cart->add_product($data);
            $count_items = $this->Cart->count_items();
            $retArr = array('message' => 'success', 'code' => 1, 'cart_count' => $count_items);
             echo json_encode($retArr); 

             die;

        // pr($data); die;
    }
}
