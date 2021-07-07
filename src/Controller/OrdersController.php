<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

use Cake\Event\Event;


use Cake\Mailer\MailerAwareTrait;

use Cake\Mailer\Email;


/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['payment','paymentReturn']);
    }

    protected function _sendEmailMessage($to = null, $email_body = null, $subject = null, $bcc = null, $cc = null)
    {
        $email = new Email('default');
        $email->setEmailFormat('both');
        $email->setFrom('admin@chennis.com');
        $email->setSender('admin@chennis.com');
        $email->setTo($to);
        $email->setSubject($subject);
        if ($email->send($email_body)) {
            return true;
        }
        return false;
    }

    public function sendMessage($phone,$message)
    {

            $messagecontent = "This is test message from chennis "; //Type Of Your Message
            $message = urlencode($message);
            $url="http://site.bulksmsnagpur.net/sendsms?uname=chenis12&pwd=chenis12&senderid=CHENIS&to=".$phone."&msg=".$message."&route=PD";
            // $response = curl($url);


             $ch = curl_init();
             // http://site.bulksmsnagpur.net/sendsms?uname=chenis12&pwd=chenis12&senderid=CHENIS&to=9597028953&msg=yourMessage&route=PD
             curl_setopt($ch, CURLOPT_URL, $url);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
             $data = curl_exec($ch);
             curl_close($ch);
             
             return true;

    }
   
    public function createOrder()
    {
        $this->loadModel('OrderInvoices');
        $this->loadModel('Orders');
        $this->loadModel('OrderProducts');
        $this->loadModel('OrderVarients');
        $this->loadModel('Products');
        $this->loadModel('ProductSizes');
        $this->loadModel('CronJobs');
        $this->loadModel('Discounts');


        $invoices = $this->OrderInvoices->newEntity();

   
        if ($this->request->is('post')) {



            // pr($this->request->getData()); die;

            $invoices = $this->OrderInvoices->patchEntity($invoices, $this->request->getData());

            if(!empty($invoices->getErrors())){
                /*Displaying errors*/
                foreach ($invoices->getErrors() as $key => $value) {
                    foreach ($value as $key => $values) {
                        $this->Flash->error(__($values));
                    }
                }


                 return $this->redirect($this->referer());

            }else{ 


                $cartItems = $this->request->getSession()->read('Cart.Products');

                $couponCart = $this->request->getSession()->read('Cart.Coupons');
        // pr($couponCart); die;    
                $products = [];

                if(!empty($cartItems)){
                    foreach ($cartItems as $key => $value) {

                        $product = $this->Products->get($value['product_id']); 

                        $product_size = $this->ProductSizes->get($value['size_id']);

                        $products[$key]['product_name'] = $product['product_name'];
                        $products[$key]['product_id'] = $value['product_id'];
                        $products[$key]['price'] = $product['price'];
                        $products[$key]['quantity'] = $value['quantity'];
                        $products[$key]['size_id'] = $product_size['id'];

                        $products[$key]['varient_array'] = $value['varient_array'];

                     
                    }
                

                    // pr($products); die;

                    if(empty($couponCart)){
                        $couponId = 0;
                    }else{
                        $couponId = $couponCart['coupon_id'];
                    }


                    $order = $this->Orders->newEntity();
                    $product_orderNumber = rtrim(base64_encode(md5(microtime())),"=");
                    $order->order_number = "CHN-".uniqid();
                    $order->user_id = $this->Auth->User('id');
                    $order->discount_id = $couponId;


                    $saveOrder = $this->Orders->save($order);

                    $total_price = 0 ;

                    foreach ($products as $key => $product) {
                       
                        $order_products = $this->OrderProducts->newEntity();

                        $order_products->product_id = $product['product_id'];
                        $order_products->price = $product['price'];
                        $order_products->quantity = $product['quantity'];
                        $order_products->product_size_id = $product['size_id'];
                        $order_products->order_id = $saveOrder['id'];

                        $total_price += $product['price']*$product['quantity'];


                        $orderProduct = $this->OrderProducts->save($order_products);


                        if(isset($product['varient_array']) && !empty($product['varient_array'])){

                            $vareints_save = [];

                            foreach ($product['varient_array'] as $keys => $varients) { 


                                $vareints_save[$keys]['product_sub_varient_id'] = $varients;
                                $vareints_save[$keys]['order_product_id'] = $orderProduct['id'];


                            }


                            $varient_data = TableRegistry::getTableLocator()->get('OrderVarients');
                            $entities = $varient_data->newEntities($vareints_save);
                             $varient_data->saveMany($entities);

                        }


                    }


                    $invoices->order_id = $saveOrder['id'];


                    $discount = $this->Discounts->find('all',[
                        'conditions' => ['id' => $couponId]
                    ])->first();


                    if(!empty($discount)){
                        if($discount['discount_type'] == 1){

                            $calculated  = ( $discount['discount'] / 100 ) * $total_price ;

                            $final_amount = $total_price - $calculated;


                          }else{

                            $final_amount  = $total_price - $discount['discount'] ;


                          }
                    }else{
                        $final_amount = $total_price;
                    }

                    // echo $final_amount;die;
                   

                    if ($this->OrderInvoices->save($invoices)) {


                        $update_price = $this->Orders->get($saveOrder['id']);

                        $update_price->order_total = $final_amount;

                        $this->Orders->save($update_price);


                        

                        return $this->payment($this->request->getData(),$final_amount,$update_price['order_number'],$saveOrder['id']);

                        


                    }else{                

                        $this->Flash->error(__('The order could not be saved. Please, try again.'));

                    }


                }else{

                    $this->Flash->error(__('Session Expired.'));

                    return $this->redirect(['controller' => 'Users','action' => 'dashboard']);

                }
           
                

               

            }
            // if ($this->OrderInvoices->save($invoices)) {
            //     $this->Flash->success(__('The order has been saved.'));

            //     return $this->redirect(['action' => 'index']);
            // }
            // $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }


    }

    public function payment($data , $amount , $order_id , $order_saved_id)
    {
        $data['name'] = $data['billing_name'];
        $data['email'] = $data['billing_email'];
        $data['amount'] = $amount;
        // $data['amount'] = 25;
        $data['tid'] = round(microtime(true) * 1000);
        $data['merchant_id'] = 66558;
        $data['order_id'] = $order_id;
        $data['language'] = 'EN';
        $data['currency'] = 'INR';
        $data['redirect_url'] = 'http://chennis.com/orders/paymentReturn';
        $data['cancel_url'] = 'http://chennis.com/orders/paymentReturn?cancel=true&order_id='.$order_saved_id.'';
        // pr($data); die;
        $merchant_id = 66558;    // Replace 00000 with your merchant ID
        $working_key = '2EA44FF51D1DED7E0DCEE34693EC98F9'; // Add your working key
        $access_code = 'AVIA05CE27CF10AIFC'; 

        foreach ($data as $key => $value) {
            $merchant_id .= $key . '=' . $value . '&';
        }

        $encrypted_data = $this->Avenue->encrypt($merchant_id, $working_key);
// pr($encrypted_data); die;
        $this->set(compact('encrypted_data','access_code'));
    }


    public function paymentReturn()
    {
        $this->loadModel('Orders');
        $this->loadModel('CronJobs');
        $this->loadModel('Discounts');
        $this->loadModel('WebsiteSettings');
        $this->loadModel('ProductSizes');

        if(isset($_GET['cancel']))
        {
            // die("User manually cancelled the payment.");
            $this->Flash->error(__('your order has been cancelled.'));

            return $this->redirect(['controller' => 'products','action' => 'checkOut']);

        }else{

            // Catch the Payment Response
            $encResponse = htmlentities($_POST["encResp"], ENT_QUOTES, 'utf-8'); //This is the response sent by the CCAvenue Server
            $rcvdString = $this->Avenue->decrypt($encResponse, '2EA44FF51D1DED7E0DCEE34693EC98F9'); //Crypto Decryption used as per the specified working key.
            
            // Preparing decrypted data
            $order_status = "";
            $decryptValues = explode('&', $rcvdString);
            $dataSize = sizeof($decryptValues);

            // Process the decrypted data
            for($i = 0; $i < $dataSize; $i++) 
            {
                $information = explode('=', $decryptValues[$i]);

                if($i == 3)
                {
                    $order_status = $information[1];
                }
            }
            // Response Data
            $payment_data = array();

            for($i = 0; $i < $dataSize; $i++) 
            {
                $information = explode('=', $decryptValues[$i]);
                $payment_data[$information[0]] = $information[1];
            }

            // pr($payment_data); die;

             if($order_status === "Success")
            {
                $get_order = $this->Orders->find('all',[
                    'conditions' => ['id' => $payment_data['order_id']]
                ])->first();

                $get_order->status = 1;

                $this->Orders->save($get_order);


                // $crons = $this->CronJobs->newEntity();

                // $crons->order_id = $get_order['id'];

                // $this->CronJobs->Save($crons);

                $this->request->getSession()->write('Cart.Products');

                $this->request->getSession()->write('Cart.Coupons');




                $total = 0;
           
                $order = $this->Orders->get($payment_data['order_id'],[

                    'contain' => ['OrderProducts' => ['Products'] ,'OrderInvoices','Users']

                ]);

                $discount = $this->Discounts->find('all')->where(['id' => $order['discount_id']])->first();


                $html = '';

                foreach ($order['order_products'] as $key => $order_product) {


                    $product_size = $this->ProductSizes->get($order_product['product_size_id']);

                    $product_size->quantity = $product_size->quantity-$order_product['quantity'];

                    $this->ProductSizes->save($product_size);

                    $total += $order_product['price']*$order_product['quantity'];

                    // <img src='". Configure::read("APP_BASE_URL")."/uploads/products/".$order_product['product']['product_image_1']."' width='50'>

                    $html .= "<tr><td>".$order_product['product']['product_name']."</td><td> ₹ ".$order_product['price']."</td><td> Qty : ".$order_product['quantity']."</td><td> ₹ ".$total."</td></tr><hr>";              

                }

                $final_amount = $total;

                $discount_get = " 0 %";

                if(!empty($discount)){
                    if($discount['discount_type'] == 1){

                        $calculated  = ( $discount['discount'] / 100 ) * $total ;

                        $final_amount = $total - $calculated;

                        $discount_get = $discount['discount']." % ";

                      }else{

                        $final_amount  = $total - $discount['discount'] ;

                        $discount_get =  " ₹ ".$discount['discount'] ;

                      }
                }

                $html .= "<tr><td></td><td></td><td>Sub Total</td><td><b> ₹ ".$total."</b></td></tr><hr>";
                $html .= "<tr><td></td><td></td><td>Discount</td><td><b>".$discount_get."</b></td></tr><hr>";
                $html .= "<tr><td></td><td></td><td>Total Amount</td><td><b> ₹ ".$final_amount."</b></td></tr>";


                $settings = $this->WebsiteSettings->get(3);

                $settings['email_templates'] = str_replace(array('#NAME','#EMAILTEMPLATES'), array(
                                            $order['order_invoice']['billing_name'],
                                            $html
                                            ), $settings['email_templates']
                                          ); 

                $this->_sendEmailMessage($order['order_invoice']['billing_email'], $settings['email_templates'], 'Chennis :: Your order details');


                $message = "Hi ".$order['order_invoice']['billing_name']." , Your order has been placed successfully, Your order total will be Rs: ".$final_amount." , Regards , CHENNIS TEAM. ";


                $this->sendMessage($order['order_invoice']['billing_contact_1'],$message);



                $order->order_total = $final_amount;

                $this->Orders->save($order);






                // pr($payment_data); die;

                $this->Flash->success(__('your order has been placed successfully.'));

                return $this->redirect(['controller' => 'Users','action' => 'dashboard']);
            
            }else{

                $this->Flash->error(__('Something went wrong please try again later'));

                return $this->redirect(['controller' => 'products','action' => 'checkOut']);

            }


            
        }
    }


    public function index()
    {
        $orders = $this->Orders->find('all',[
            'conditions' => ['user_id' => $this->Auth->User('id'), 'Orders.status' => 1],
            'order' => ['id' => 'DESC']
        ])->toArray();
// pr($orders); die;
        $this->set(compact('orders'));
    }


    public function trackOrder($id = null)
    {
        $order = $this->Orders->find('all',[
            'conditions' => ['Orders.user_id' => $this->Auth->User('id'), 'Orders.id' => $id , 'Orders.status' => 1],
            'contain' => ['OrderInvoices']
        ])->first();

        if(empty($order )){
            return $this->redirect(['action' => 'index']);
        }

        // pr($order); die;

        $this->set(compact('order'));
    }


    public function view($id = null)
    {
        $order = $this->Orders->find('all',[
            'conditions' => ['Orders.user_id' => $this->Auth->User('id'), 'Orders.id' => $id, 'Orders.status' => 1],
            'contain' => [ 'Users', 'OrderInvoices' => ['Countries','States'] , 'OrderProducts' => [ 'Products' , 'productSizes' , 'OrderVarients' => ['ProductSubVarients' => ['ProductVarients'] ] ]],
        ])->first();

        if(empty($order )){
            return $this->redirect(['action' => 'index']);
        }

        // pr($order); die;

        $this->set(compact('order'));
    }
}
