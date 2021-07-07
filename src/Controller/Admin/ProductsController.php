<?php


namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;

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
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('back_end_dashboard');
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $products = $this->Products->find('all',[
            'contain' => ['ProductCategories', 'ProductSubCategories' => ['ParentProductSubCategories'] , 'Countries' , 'ProductDetailVarients'],
            'conditions' => ['Products.is_deleted' => 0]
        ])->toArray();

        // pr($products); die;

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['ProductCategories', 'ProductSubCategories', 'Countries', 'ProductTags'],
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Tags');
        $this->loadModel('ProductTags');
        $this->loadModel('ProductVarients');
        $this->loadModel('ProductDetailVarients');
        $this->loadModel('ProductSizes');

        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {

            // pr($this->request->getData()); die;


            $product = $this->Products->patchEntity($product, $this->request->getData());


            if(isset($this->request->getData()["product_image_1"]) && !empty($this->request->getData()["product_image_1"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_1']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_1']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_1']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_1 = $uniqueId ."_".$this->request->getData()['product_image_1']['name'];
                    }
            }
            if(isset($this->request->getData()["product_image_2"]) && !empty($this->request->getData()["product_image_2"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_2']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_2']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_2']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_2 = $uniqueId ."_".$this->request->getData()['product_image_2']['name'];
                    }
            }

            if(isset($this->request->getData()["product_image_3"]) && !empty($this->request->getData()["product_image_3"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_3']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_3']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_3']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_3 = $uniqueId ."_".$this->request->getData()['product_image_3']['name'];
                    }
            }

            if(isset($this->request->getData()["product_image_4"]) && !empty($this->request->getData()["product_image_4"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_4']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_4']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_4']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_4 = $uniqueId ."_".$this->request->getData()['product_image_4']['name'];
                    }
            }

            if(isset($this->request->getData()["product_image_5"]) && !empty($this->request->getData()["product_image_5"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_5']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_5']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_5']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_5 = $uniqueId ."_".$this->request->getData()['product_image_5']['name'];
                    }
            }

            if(isset($this->request->getData()["product_image_6"]) && !empty($this->request->getData()["product_image_6"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_6']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_6']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_6']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_6 = $uniqueId ."_".$this->request->getData()['product_image_6']['name'];
                    }
            }


            if(isset($this->request->getData()["product_image_7"]) && !empty($this->request->getData()["product_image_7"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_7']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_7']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_7']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_7 = $uniqueId ."_".$this->request->getData()['product_image_7']['name'];
                    }
            }

            // pr($product); die;


            if ($getProduct = $this->Products->save($product)) {

                if(!empty($this->request->getData()['tags'])){

                    foreach ($this->request->getData()['tags'] as $key => $tag) {
                        $tags = $this->ProductTags->newEntity();
                        $tags->product_id = $getProduct['id'];
                        $tags->tag_id = $tag;
                        $this->ProductTags->save($tags);
                    }

                }

                if(!empty($this->request->getData()['data']['varient'])){
                    foreach ($this->request->getData()['data']['varient'] as $keys => $varients) {
                        if(!empty($varients)){
                            $tags = $this->ProductDetailVarients->newEntity();
                            $tags->product_id = $getProduct['id'];
                            $tags->product_varient_id = $varients;
                            $tags->product_sub_varient_id = $this->request->getData()['data']['sub_varient'][$keys];
                            $this->ProductDetailVarients->save($tags);
                        }
                    }
                }

                if(!empty($this->request->getData()['data_sizes']['sku_code'])){
                    foreach ($this->request->getData()['data_sizes']['sku_code'] as $keys => $sku) {
                        if(!empty($sku)){
                            $product_size = $this->ProductSizes->newEntity();
                            $product_size->product_id = $getProduct['id'];
                            $product_size->sku_code = $sku;
                            $product_size->quantity = $this->request->getData()['data_sizes']['quantity'][$keys];
                            $product_size->size = $this->request->getData()['data_sizes']['size'][$keys];
                            $this->ProductSizes->save($product_size);
                        }
                    }
                }

                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $productCategories = $this->Products->ProductCategories->find('list', []);
        $productSubCategories = $this->Products->ProductSubCategories->find('list',[
            'conditions' => ['ProductSubCategories.product_category_id' => 1]
        ]);
        $tags = $this->Tags->find('list',[]);
        $varients = $this->ProductVarients->find('list',[]);

        $countries = $this->Products->Countries->find('list', []);


        // pr($productCategories); die;
        $this->set(compact('product', 'productCategories', 'productSubCategories', 'countries','tags','varients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Tags');
        $this->loadModel('ProductTags');
        $this->loadModel('ProductVarients');
        $this->loadModel('ProductSubVarients');
        $this->loadModel('ProductDetailVarients');
        $this->loadModel('ProductSizes');


        $product = $this->Products->get($id, [
            'contain' => ['ProductTags','ProductDetailVarients' => ['ProductVarients' , 'ProductSubVarients'] , 'ProductSizes' ],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            // pr($this->request->getData()['new_arrivals']); die;

        
            $product = $this->Products->patchEntity($product, $this->request->getData());


            if(!isset($this->request->getData()['new_arrivals'])){
                $product->new_arrivals = 0;
            }
            if(!isset($this->request->getData()['top_trending'])){
                $product->top_trending = 0;
            }
            if(!isset($this->request->getData()['on_sales'])){
                $product->on_sales = 0;
            }


            if(isset($this->request->getData()["product_image_1"]) && !empty($this->request->getData()["product_image_1"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_1']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_1']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_1']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_1 = $uniqueId ."_".$this->request->getData()['product_image_1']['name'];
                    }
            }else{
                $product->product_image_1 = $this->request->getData()['hid_product_image_1'];
            }


            if(isset($this->request->getData()["product_image_2"]) && !empty($this->request->getData()["product_image_2"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_2']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_2']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_2']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_2 = $uniqueId ."_".$this->request->getData()['product_image_2']['name'];
                    }
            }else{
                $product->product_image_2 = $this->request->getData()['hid_product_image_2'];
            }

            if(isset($this->request->getData()["product_image_3"]) && !empty($this->request->getData()["product_image_3"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_3']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_3']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_3']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_3 = $uniqueId ."_".$this->request->getData()['product_image_3']['name'];
                    }
            }else{
                $product->product_image_3 = $this->request->getData()['hid_product_image_3'];
            }

            if(isset($this->request->getData()["product_image_4"]) && !empty($this->request->getData()["product_image_4"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_4']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_4']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_4']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_4 = $uniqueId ."_".$this->request->getData()['product_image_4']['name'];
                    }
            }else{
                $product->product_image_4 = $this->request->getData()['hid_product_image_4'];
            }

            if(isset($this->request->getData()["product_image_5"]) && !empty($this->request->getData()["product_image_5"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_5']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_5']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_5']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_5 = $uniqueId ."_".$this->request->getData()['product_image_5']['name'];
                    }
            }else{
                $product->product_image_5 = $this->request->getData()['hid_product_image_5'];
            }

            if(isset($this->request->getData()["product_image_6"]) && !empty($this->request->getData()["product_image_6"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_6']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_6']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_6']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_6 = $uniqueId ."_".$this->request->getData()['product_image_6']['name'];
                    }
            }else{
                $product->product_image_6 = $this->request->getData()['hid_product_image_6'];
            }


            if(isset($this->request->getData()["product_image_7"]) && !empty($this->request->getData()["product_image_7"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['product_image_7']['tmp_name'], WWW_ROOT . 'uploads/products' . DS . $uniqueId ."_".$this->request->getData()['product_image_7']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['product_image_7']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $product->product_image_7 = $uniqueId ."_".$this->request->getData()['product_image_7']['name'];
                    }
            }else{
                $product->product_image_7 = $this->request->getData()['hid_product_image_7'];
            }

   


            if ($this->Products->save($product)) {



                if(!empty($this->request->getData()['tags'])){

                    $this->ProductTags->deleteAll(['product_id' => $id]);

                    foreach ($this->request->getData()['tags'] as $key => $tag) {
                        $tags = $this->ProductTags->newEntity();
                        $tags->product_id = $id;
                        $tags->tag_id = $tag;
                        $this->ProductTags->save($tags);
                    }

                }

                if(!empty($this->request->getData()['data']['varient'])){

                    $this->ProductDetailVarients->deleteAll(['product_id' => $id]);

                    foreach ($this->request->getData()['data']['varient'] as $keys => $varients) {
                        if(!empty($varients)){
                            $tags = $this->ProductDetailVarients->newEntity();
                            $tags->product_id = $id;
                            $tags->product_varient_id = $varients;
                            $tags->product_sub_varient_id = $this->request->getData()['data']['sub_varient'][$keys];
                            $this->ProductDetailVarients->save($tags);
                        }
                    }
                }

                if(!empty($this->request->getData()['data_sizes']['sku_code'])){

                    $this->ProductSizes->deleteAll(['product_id' => $id]);

                    foreach ($this->request->getData()['data_sizes']['sku_code'] as $keys => $sku) {
                        if(!empty($sku)){
                            $product_size = $this->ProductSizes->newEntity();
                            $product_size->product_id = $id;
                            $product_size->sku_code = $sku;
                            $product_size->quantity = $this->request->getData()['data_sizes']['quantity'][$keys];
                            $product_size->size = $this->request->getData()['data_sizes']['size'][$keys];
                            $this->ProductSizes->save($product_size);
                        }
                    }
                }


                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $tags = $this->Tags->find('all')->toArray();
        $varients = $this->ProductVarients->find('all')->toArray();

        $sub_varients = $this->ProductSubVarients->find('all')->toArray();


        $productCategories = $this->Products->ProductCategories->find('list', []);
        $productSubCategories = $this->Products->ProductSubCategories->find('list', ['conditions' => ['product_category_id' => $product['product_category_id'] ] ]);
        $countries = $this->Products->Countries->find('list', []);

        $productTags = [];

        foreach ($product['product_tags'] as $key => $tag) {
            $productTags[] = $tag['tag_id'];
        }

        $subVarients = [];
        $i = 0;
        foreach ($sub_varients as $keyVarient => $sub_varient) {
            // $subVarients[$sub_varient['product_varient_id']][] = $sub_varient['id'];
            $subVarients[$sub_varient['product_varient_id']][$sub_varient['id']] = $sub_varient['name'];
            $i++;
        }

        // pr($subVarients); die;

        $this->set(compact('product', 'productCategories', 'productSubCategories', 'countries','tags','productTags','varients','subVarients'));
        // pr($product); die;
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        $product->is_deleted = 1;
         if ($this->Products->save($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function getSubCategory()
    {
        $this->loadModel('ProductSubCategories');

         if($this->request->is('post')) {
          
                $category = $this->ProductSubCategories->find('all', array(
                        'conditions' => array(
                            'product_category_id' => $this->request->getData()['category']
                        ),
                        'order' => 'id ASC'
                    ));

                echo json_encode($category);

                return $this->response;
          }
    }


    public function getSubVariant()
    {
        $this->loadModel('ProductSubVarients');

         if($this->request->is('post')) {
          
                $category = $this->ProductSubVarients->find('all', array(
                        'conditions' => array(
                            'product_varient_id' => $this->request->getData()['variant']
                        ),
                        'order' => 'id ASC'
                    ));

                echo json_encode($category);

                return $this->response;
          }
    }

    public function inventory()
    {
        $this->loadModel('ProductSizes');

        $sizes = $this->ProductSizes->find('all',[
            'contain' => ['Products'],
            'order' => ['ProductSizes.quantity' => 'ASC']
        ])->toArray();

        $this->set(compact('sizes'));

        // pr($sizes); die;
    }

    public function increaseQuantity()
    {
        $this->loadModel('ProductSizes');

        $product_size = $this->ProductSizes->get($this->request->getData()['id']);

        $product_size->quantity = $this->request->getData()['quantity'];


        $this->ProductSizes->save($product_size);

        echo json_encode(['message' => 1]);

        exit;

        // pr($this->request->getData()); die;

    }
}
