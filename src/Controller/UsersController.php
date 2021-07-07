<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\MailerAwareTrait;

use Cake\Mailer\Email;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Configure;
use Cake\Http\Client;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeFilter(Event $event)
    {

        $this->Auth->allow(['login','register','verifyAccount','forgotPassword','resetPassword','facebookLogin','googleLogin']);

        // pr($productCategories); die;
    }

    public function facebookLogin(){}
    public function googleLogin(){}


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


    public function apiCall()
    {

        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = '6Lfoa-IUAAAAAEEvKm71muZ7IX_O5LcuLmf-t1YR';
        $recaptcha_response = $this->request->getData()['g-recaptcha-response'];

        // Make and decode POST request:
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);

        return $recaptcha;

    }

    /**
     * login method
     *
     * @return \Cake\Http\Response|null
     */
    public function login()
    {
      if( !empty( $this->request->getSession()->read('Auth.Users')) ){
          return $this->redirect(['action' => 'dashboard' ]);
      }


      if(isset($_GET['redirect'])){
        $redirect =  $_GET['redirect'];
      }else{
        $redirect =  '';
      }


        if ($this->request->is('post')) {

            // $response = json_decode($this->apiCall());
            // if ($response->success == 1 && $response->score >= 0.5) { 

                $user = $this->Auth->identify();
                if($user) {

                    if($user['user_role_id'] == 2){

                      // if($user['status'] == 0){

                      //     $this->Flash->error(__('Your account has not be verified, please check your email.'));
                      //     return $this->redirect($this->referer());

                      // }else{

                          $this->Auth->setUser($user);
                          $this->Flash->success(__('Logged in successfully'));

                          if(isset($this->request->getData()['redirect'])){
                            return $this->redirect($this->request->getData()['redirect']);
                          }

                          return $this->redirect($this->Auth->redirectUrl());

                      // }            
                  }else{
                    $this->Flash->error(__('Admin not allowed to login'));
                    return $this->redirect($this->Auth->logout());
                  }
                      
                }else{
                    $this->Flash->error(__('Invalid User Name and Password'));
                    // return $this->redirect($this->referer());
                }
            // }else{
            //     $this->Flash->error(__('Unknown access'));
            // }
        }


        $this->set(compact('redirect'));


    }

    /**
     * register method
     *
     * @return \Cake\Http\Response|null
     */
    public function register()
    {
        $this->loadModel('WebsiteSettings');
        $user = $this->Users->newEntity();
        
        if($this->request->is('post')) {
            
            $user = $this->Users->patchEntity($user , $this->request->getData());

            if(!empty($user->getErrors())){
                foreach ($user->getErrors() as $key => $value) {
                    foreach ($value as $key => $values) {
                       // $error.= $values."<br>";
                        $this->Flash->error(__($values));
                    }
                }
            }else{

                $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
                $remember_token = substr(str_shuffle(str_repeat($pool, 64)), 0,64);

                $user->remember_token = $remember_token;

                $user->user_role_id = 2;

                if ($result = $this->Users->save($user)) {


                    $settings = $this->WebsiteSettings->get(1);

                    $settings['email_templates'] = str_replace(array('#NAME', '#REPLACELINK','#MESSAGE'), array(
                                                $user->name,
                                                Configure::read("APP_BASE_URL").'/users/verify-account/'.$user->remember_token,
                                                'Email : '.$this->request->getData()['email'].'<br> Password : '.$this->request->getData()['password'].' '
                                                ), $settings['email_templates']
                                              ); 

                    $this->_sendEmailMessage($user->email, $settings['email_templates'], 'Chennis :: Verify your account');

                    $this->Flash->success(__('Thanks for registering with us. Please check your email to verify your account for more secure with us.'));

                    // return $this->redirect(['action' => 'login']);

                    
                }else{
                    $this->Flash->error(__('User has been registered already'));

                    
                }

                // return $this->redirect($this->referer());
            } 
         
        }


 
       $this->set('_serialize', ['user']);
       $this->set('user',$user);
    }


    public function verifyAccount($id = null)
    {
 
          $user = $this->Users->find('all')->where(['remember_token' => $id])->first();
       
          if(empty($user)){

             $this->Flash->error('User Not Found , Please Register');
             
             $this->redirect(['action' => 'register']);

          }else{

            if($user->status == 1){

                $this->Flash->success('Already verified.');

                $this->redirect(['action' => 'login']);

            }else{


                $user->status = 1;
                $this->Users->save($user);
                $this->Flash->success('Your account has been verified successfully.');
                $this->redirect(['action' => 'login']);

            }

          }
        
    }


    /*Forgot Password*/
    public function forgotPassword()
    {
        $this->loadModel('WebsiteSettings');
         // echo "test"; die;
         if ($this->request->is(['patch', 'post', 'put'])) {

         // $response = json_decode($this->apiCall());
         // if ($response->success == 1 && $response->score >= 0.5) { 

              $user = $this->Users->find('all')->where(['email' => $this->request->getData()['email']])->first();
              // pr($user); die;
              if(empty($user)){
                     $this->Flash->error('Email Id not found');
                     $this->redirect(['action' => 'forgotPassword']);
              }else{

                $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
                $remember_token = substr(str_shuffle(str_repeat($pool, 64)), 0,64);

                $user->remember_token = $remember_token;

                $result = $this->Users->save($user);

                $settings = $this->WebsiteSettings->get(2);

                $settings['email_templates'] = str_replace(array('#NAME', '#REPLACELINK','#MESSAGE'), array(
                                                    $user->name,
                                                    Configure::read("APP_BASE_URL").'/users/reset-password/'.$remember_token,
                                                    'You have requested to reset your password , click the below link to reset your password'
                                                    ), $settings['email_templates']
                                                  );      
                   

                 $this->_sendEmailMessage($user->email, $settings['email_templates'], 'Reset Password :: Chennis ');
                 $this->Flash->success('Please check your email to get reset password link');
                 $this->redirect(['action' => 'login']);
              }

            // }else{
            //     $this->Flash->error(__('Unknown access'));
            // }
          
        }


    }



    public function resetPassword($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {

         //    $response = json_decode($this->apiCall());
         // if ($response->success == 1 && $response->score >= 0.5) { 

                $user = $this->Users->find('all')->where(['remember_token' => $id])->first();

                if(empty($user)){

                    $this->Flash->error('Something went wrong, Please try after sometime');

                }else{

                    $user =$this->Users->get($user->id);
                    $user = $this->Users->patchEntity($user,$this->request->getData());
                    if ($this->Users->save($user)) {

                        $this->Flash->success('Your password has been changed successfully');
                        $this->redirect(['action' => 'login']);

                    } else {

                        $this->Flash->error('Something went wrong, Please try after sometime');

                    }

                }

            // }else{
            //     $this->Flash->error(__('Unknown access'));
            // }
           
        }

    }

    public function dashboard()
    {
        
    }

    public function myOrders()
    {

      $this->loadModel('Orders');

      $this->paginate = [
          'contain' => ['OrderProducts' => ['Products'] ,'OrderInvoices','Users'],

          'conditions' => ['Orders.user_id' => $this->Auth->User('id')]
 
      ];
      
      $orders = $this->paginate($this->Orders);

      $this->set(compact('orders'));


      // pr($orders); die;
    }


    public function changePassword()
    {
        $user =$this->Users->get($this->Auth->user('id'));
        if (!empty($this->request->getData())) {
              // pr($this->request->getData()['old_password']); die;
            $user = $this->Users->patchEntity($user, [
                    'old_password'  => $this->request->getData()['old_password'],
                    'password'      => $this->request->getData()['password'],
                    'confirm_password'     => $this->request->getData()['confirm_password']
                ],
                ['validate' => 'password']
            );
            $error = '';
            if(!empty($user->getErrors())){
                foreach ($user->getErrors() as $key => $value) {
                    foreach ($value as $key => $values) {
                       // $error.= $values."<br>";
                        $this->Flash->error(__($values));
                    }
                }
            }else{
                if ($this->Users->save($user)) {
                    $this->Flash->success('Your password has been changed successfully');
                    $this->redirect(['action' => 'changePassword']);
                } else {
                    $this->Flash->error('Old Password Does Not Match');
                }
            }
        }
        $this->set('user',$user);
    }


    public function editAccount()
    {
        $user = $this->Users->get($this->Auth->User('id'));


         if ($this->request->is(['post','patch','put'])) {

          $user = $this->Users->patchEntity($user , $this->request->getData());

           if(!empty($user->getErrors())){
                foreach ($user->getErrors() as $key => $value) {
                    foreach ($value as $key => $values) {
                       // $error.= $values."<br>";
                        $this->Flash->error(__($values));
                    }
                }
            }else{
                if ($this->Users->save($user)) {
                    $this->Flash->success('Your account information has been updated successfully');
                } else {
                    $this->Flash->error('Try again later');
                }
            }
        } 

        $this->set('user',$user);
    }



    public function logout()
    {
         $this->Flash->success('You have successfully loged out');



         return $this->redirect($this->Auth->logout());
    }



}
