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

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Avenue');
        $this->loadComponent('Payment');
        $this->loadComponent('Cart');

         $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'email', 'password' => 'password'],
                ]
            ],
            'authError' => 'Please Login Here',
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'storage' => [
                'className' => 'Session',
                'key' => 'Auth.Users',               
            ],
        ]);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function isAuthorized($user) { 


        if(isset($user['user_role_id']) && $user['user_role_id'] == 1){
            return false;
        }
      
       return true;            
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {         
        $this->loadModel('ProductSubCategories');
        $this->loadModel('Products');
        $this->loadModel('Tags');
        $this->loadModel('Sidebars');
        
        $this->loadComponent('Cart');


        $sub_category_intial = $this->ProductSubCategories->find('all',[
            'conditions' => ['product_category_id' => 0],
            'contain' => ['ChildProductSubCategories' => ['Products']]
        ])->toArray();    


        $headers1 = $this->ProductSubCategories->find('all',[
            'conditions' => ['product_category_id' => 0],
            'contain' => ['ChildProductSubCategories'],
            'limit' => 2,
            'offset' => 0
        ])->toArray();   


        $headers2 = $this->ProductSubCategories->find('all',[
            'conditions' => ['product_category_id' => 0],
            'contain' => ['ChildProductSubCategories'],
            'limit' => 2,
            'offset' => 2
        ])->toArray(); 


        $sub_category_intial_brand = $this->ProductSubCategories->find('all',[
            'conditions' => ['product_category_id !=' => 0],
            'contain' => ['Products']
        ])->toArray();  


        $sidebars = $this->Sidebars->find('all',[
            'contain' => ['ProductSubCategories']
        ])->toArray(); 

        $sidebar_tags = $this->Tags->find('all')->toArray();

        $get_whole_cart = $this->Cart->get_whole_cart();
        
        if(!empty($get_whole_cart)){
            if(!empty($get_whole_cart['Products'])){
                $get_count_cart = count($get_whole_cart['Products']);
            }else{
                $get_count_cart = 0;
            }
            
        }else{
            $get_count_cart = 0;
        }

        // pr($get_count_cart); die;

        // $header_products =$this->Products->find('all',[
        //     'conditions' => [
        //         'Products.top_trending' => 1,
        //         'Products.is_deleted' => 0
        //     ],
        //     'contain' => ['ProductCategories', 'ProductSubCategories'],
        //     'limit' => 2 ,
        //     'order' => ['Products.id' => 'DESC']
        // ])->toArray();

        // pr($sidebar_tags); die;

        $this->set(compact('sub_category_intial','headers1','headers2','sub_category_intial_brand','sidebars','sidebar_tags','get_count_cart'));
    }
}
