<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;

use Cake\Mailer\MailerAwareTrait;

use Cake\Mailer\Email;


/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['home','payment','test','message','cron','aboutUs','termsAndConditions','privacyPolicy','returnPolicy','paymentOptions','contactUs']);
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

    public function test()
    {
        // Handling Manual Cancellation
        if(isset($_GET['cancel']))
        {
            die("User manually cancelled the payment.");
        }

        // Catch the Payment Response
        $encResponse = htmlentities($_POST["encResp"], ENT_QUOTES, 'utf-8'); //This is the response sent by the CCAvenue Server
        $rcvdString = $this->Avenue->decrypt($encResponse, $working_key); //Crypto Decryption used as per the specified working key.
        
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

        // Show user order message / response
        if($order_status === "Success")
        {
            echo "Thank you for shopping with us. Your payment is processed successfully.";
        }
        else if($order_status === "Aborted")
        {
            echo "Hey! Looks like you canceled your payment.";
        }
        else if($order_status === "Failure")
        {
            echo "Thank you for shopping with us. However, the transaction has been declined by your card or bank authority.";
        }
        else
        {
            die("Security Error. Illegal access detected");
        }


        // Response Data
        $payment_data = array();

        for($i = 0; $i < $dataSize; $i++) 
        {
            $information = explode('=', $decryptValues[$i]);
            $payment_data[$information[0]] = $information[1];
        }

    // Print the securely processed payment data for further usage.
    // print_r($payment_data);
        pr($payment_data); die;
    }




    public function payment()
    {
        $data['name'] = 'Aruldass';
        $data['email'] = 'aruldass@gmail.com';
        $data['amount'] = 10;
        $data['tid'] = round(microtime(true) * 1000);
        $data['merchant_id'] = '66558';
        $data['order_id'] = '89862738';
        $data['language'] = 'EN';
        $data['currency'] = 'INR';
        $data['redirect_url'] = 'http://chennis.com/pages/test';
        $data['cancel_url'] = 'http://chennis.com/pages/test?cancel=true';

        $merchant_id = 66558;    // Replace 00000 with your merchant ID
        $working_key = 'EE185B33037A5841C361FCEF26FF7696'; // Add your working key
        $access_code = 'AVDI78FF68BN95IDNB'; 

        foreach ($data as $key => $value) {
            $merchant_id .= $key . '=' . $value . '&';
        }

        $encrypted_data = $this->Avenue->encrypt($merchant_id, $working_key);

        $this->set(compact('encrypted_data','access_code'));
    }

    public function payments()
    {
        // $ccavenue = $this->Payment( '6558', '05CC990BF106022BCD39BDB7BAA7EA5C', 'http://localhost/chennis/pages/test' );

        // // set details 
        // $ccavenue->setAmount( '10' );
        // $ccavenue->setOrderId( uniqid() );
        // $ccavenue->setBillingName( 'Aruldass' );
        // $ccavenue->setBillingAddress( 'Middle Street' );
        // $ccavenue->setBillingCity( 'Rajapalayam' );
        // $ccavenue->setBillingZip( '626117' );
        // $ccavenue->setBillingState( 'Tamil Nadu' );
        // $ccavenue->setBillingCountry( 'India' );
        // $ccavenue->setBillingEmail( 'aruldass359@gmail.com' );
        // $ccavenue->setBillingTel( '+919597028953' );
        // $ccavenue->setBillingNotes( 'Payment Gateway' );

        // copy all the billing details to chipping details
        // $this->Payment->billingSameAsShipping();

        // get encrpyted data to be passed
        $data = $this->Payment->getEncryptedData();

        // merchant id to be passed along the param
        $merchant = $this->Payment->getMerchantId();

        $this->set(compact('data','merchant'));
// pr($data);pr($merchant);
//         die;
    }




    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function home()
    {
        $this->loadModel('HomepageBanners');
        $this->loadModel('HomepageSubBanners');
        $this->loadModel('Products');

        $banners = $this->HomepageBanners->find('all')->toArray();
        $sub_banners = $this->HomepageSubBanners->find('all')->contain(['ProductSubCategories'])->toArray();

        $products = $this->Products->find('all',[
            'conditions' => ['new_arrivals' => 1],
            'contain' => ['ProductSubCategories'],
            'limit' => 10,
            'order' => ['Products.id' => 'DESC']
        ])->toArray();

        // pr($products); die;

        $this->set(compact('banners','sub_banners','products'));
    }

    // public function test()
    // {
    //     $array = [


            

         

    //         ['Beryl Palladium - A_Dhothi' , 3 , 9 , '<p>Chennis White Dhoti incorporates our Tradition with finest fashion. <br />Made with the finest quality, our dhotis enhances the comfort glorifies the the ethnic modality.</p>' , 'Beryl Palladium - A (1).jpg' , 'Beryl Palladium - A (2).jpg' , 'Beryl Palladium - A (3).jpg' , 'Beryl Palladium - A (1).jpg' , 'Beryl Palladium - A (2).jpg' , 'Beryl Palladium - A (3).jpg' , 'Beryl Palladium - A (1).jpg' , 360 , '<p>Chennis White colour mustard border Dhoti</p>' , 460 , 360 , 4 ] ,

    //         ['CR0002' , 2 , 8 , '<p>This stylish Sky blue<br /> T-Shirt ennobles the class look. The fit gives you the ultimate comfort and makes you relish your styling. <br />Style with comfort is our ultimate priority. Hence feel the style with comfort.</p>', 'CR0002 (1).jpg' , 'CR0002 (2).jpg' , 'CR0002 (3).jpg' , 'CR0002 (4).jpg' , 'CR0002 (5).jpg' , 'CR0002 (1).jpg' , 'CR0002 (3).jpg' ,599,'<p>Chennis Slim Fit Sky blue</p>',0,599,4],

    //         ['CR0005_T-shirt' , 2 , 8 , '<p>This stylish Red blue<br /> T-Shirt ennobles the class look. The fit gives you the ultimate comfort and makes you relish your styling. <br />Style with comfort is our ultimate priority. Hence feel the style with comfort.</p>', 'CR0005 (1).jpg' , 'CR0005 (2).jpg' , 'CR0005 (3).jpg' , 'CR0005 (4).jpg' , 'CR0005 (5).jpg' , 'CR0005 (1).jpg' , 'CR0005 (3).jpg' ,599,'<p>Chennis Slim Fit Red blue</p>',0,599,4],

    //         ['CR0006_T-shirt' , 2 , 8 , '<p>This stylish White blue<br /> T-Shirt ennobles the class look. The fit gives you the ultimate comfort and makes you relish your styling. <br />Style with comfort is our ultimate priority. Hence feel the style with comfort.</p>', 'CR0006 (1).jpg' , 'CR0006 (2).jpg' , 'CR0006 (3).jpg' , 'CR0006 (4).jpg' , 'CR0006 (5).jpg' , 'CR0006 (1).jpg' , 'CR0006 (3).jpg' ,599,'<p>Chennis Slim Fit White blue</p>',0,599,4],

    //         ['CR0007_T-shirt' , 2 , 8 , '<p>This stylish Orange blue<br /> T-Shirt ennobles the class look. The fit gives you the ultimate comfort and makes you relish your styling. <br />Style with comfort is our ultimate priority. Hence feel the style with comfort.</p>', 'CR0007 (1).jpg' , 'CR0007 (2).jpg' , 'CR0007 (3).jpg' , 'CR0007 (4).jpg' , 'CR0007 (5).jpg' , 'CR0007 (1).jpg' , 'CR0007 (3).jpg' ,599,'<p>Chennis Slim Fit Orange blue</p>',0,599,4],

    //         ['DT0002_Jeans',2,16,'<p>Check out the Chennis classy Blue denim.<br />Denim always enlivens the fashion quotient to the acme.<br />Time to witness classy Chennis denim.</p>','DT0002 (1).jpg','DT0002 (2).jpg','DT0002 (3).jpg','DT0002 (4).jpg','DT0002 (5).jpg','DT0002 (1).jpg','DT0002 (2).jpg',1499,'<p>Chennis Slim Fit Blue denim.</p>',1599,1499,4],

    //         ['DT0003_Jeans',2,16,'<p>Check out the Chennis classy Blue denim.<br />Denim always enlivens the fashion quotient to the acme.<br />Time to witness classy Chennis denim.</p>','DT0003 (1).jpg','DT0003 (2).jpg','DT0003 (3).jpg','DT0003 (4).jpg','DT0003 (5).jpg','DT0003 (1).jpg','DT0003 (2).jpg',1499,'<p>Chennis Slim Fit Blue denim.</p>',1599,1499,4],

    //         ['DT0001_Jeans',2,16,'<p>Check out the Chennis classy Blue denim.<br />Denim always enlivens the fashion quotient to the acme.<br />Time to witness classy Chennis denim.</p>','DT0002 (1).jpg','DT0002 (2).jpg','DT0002 (3).jpg','DT0002 (4).jpg','DT0002 (5).jpg','DT0002 (1).jpg','DT0002 (2).jpg',1499,'<p>Chennis Slim Fit Blue denim.</p>',1599,1499,4],

    //         ['ES 0130_Casual',2,13 , '<p>This chic MUSTARD chennis shirt, provides the finest comfort with scintillating fashion. It defines fashion and redefines your style.<br />Try out and redefine your style.</p>' , 'ES 0130 (1).jpg','ES 0130 (2).jpg','ES 0130 (3).jpg' , 'ES 0130 (4).jpg','ES 0130 (5).jpg','ES 0130 (6).jpg','ES 0130 (1).jpg',1499,'<p>Chennis Slim Fit MUSTARD Shirt.</p>',1599,1499,4],

    //         ['ES 0131_Casual',2,13 , '<p>This chic MUSTARD chennis shirt, provides the finest comfort with scintillating fashion. It defines fashion and redefines your style.<br />Try out and redefine your style.</p>' , 'ES 0131 (1).jpg','ES 0131 (2).jpg','ES 0131 (3).jpg' , 'ES 0131 (4).jpg','ES 0131 (5).jpg','ES 0131 (6).jpg','ES 0131 (1).jpg',1499,'<p>Chennis Slim Fit MUSTARD Shirt.</p>',1599,1499,4]
       


    //     ];

    //     $this->loadModel('Products');

    //     foreach ($array as $key => $value) {
            
    //        $product = $this->Products->newEntity();

    //        $product->product_name = $value[0];
    //        $product->product_category_id = $value[1];
    //        $product->product_sub_category_id = $value[2];
    //        $product->product_description = $value[3];
    //        $product->product_image_1 = $value[4];
    //        $product->product_image_2 = $value[5];
    //        $product->product_image_3 = $value[6];
    //        $product->product_image_4 = $value[7];
    //        $product->product_image_5 = $value[8];
    //        $product->product_image_6 = $value[9];
    //        $product->product_image_7 = $value[10];
    //        $product->price = $value[11];
    //        $product->product_features = $value[12];
    //        $product->compare_price = $value[13];
    //        $product->cost_per_item = $value[14];
    //        $product->country_id = $value[15];

    //        $this->Products->save($product);
    //     }


    //     die;
    // }


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


    public function cron()
    {
        $this->loadModel('CronJobs');
        $this->loadModel('Orders');
        $this->loadModel('Discounts');
        $this->loadModel('WebsiteSettings');

        $crons = $this->CronJobs->find('all')->toArray();


        foreach ($crons as $key => $cron) {


            $total = 0;
           
            $order = $this->Orders->get($cron['order_id'],[

                'contain' => ['OrderProducts' => ['Products'] ,'OrderInvoices','Users']

            ]);

            $discount = $this->Discounts->find('all')->where(['id' => $order['discount_id']])->first();


            $html = '';

            foreach ($order['order_products'] as $key => $order_product) {

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


            $cron_delete = $this->CronJobs->get($cron['id']);

            $this->CronJobs->delete($cron_delete);


            $order->order_total = $final_amount;

            $this->Orders->save($order);





        }

        // pr($crons);

        die;

    }


    public function aboutUs()
    {

    }

    public function termsAndConditions()
    {

    }

    public function privacyPolicy()
    {

    }

    public function returnPolicy()
    {

    }

    public function paymentOptions()
    {

    }

    public function contactUs()
    {

    }
}
