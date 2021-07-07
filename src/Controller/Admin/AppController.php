<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\Event;

use Cake\Core\Configure;

use Cake\Datasource\ConnectionManager;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
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

        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'email', 'password' => 'password'],
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => 'Please Login Here',
            'storage' => [
                'className' => 'Session',
                'key' => 'Auth.Admin',               
            ],
        ]);

    }


     /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        $this->loadModel('Products');
        $this->loadModel('Orders');

        $totalProducts = $this->Products->find('all',[
            'conditions' => ['is_deleted' => 0]
        ])->toArray();

        $conn = ConnectionManager::get('default');

        $order_total = $conn->execute("SELECT SUM(order_total) As total FROM orders WHERE invoice_status IN (1,2,3) ")->fetchAll('assoc');

        $unconfirmed_orders = $this->Orders->find('all',[
            'conditions' => ['invoice_status' => 0 , 'status' => 1 ]
        ])->toArray();

        $unshipped_orders = $this->Orders->find('all',[
            'conditions' => ['invoice_status' => 1 , 'status' => 1 ]
        ])->toArray();

        $delivered_orders = $this->Orders->find('all',[
            'conditions' => ['invoice_status' => 3 , 'status' => 1 ]
        ])->toArray();

        $unpaid_orders = $this->Orders->find('all',[
            'conditions' => ['invoice_status IN ' => [4,5] , 'status' => 1 ]
        ])->toArray();

        $recent_orders = $this->Orders->find('all',[
            'conditions' => ['Orders.status' => 1 ],
            'contain' => ['Users'],
            'limit' => 5
        ])->toArray();

         // pr($recent_orders); die;
        $auth = $this->request->getSession()->read('Auth.Admin');

        $this->set(compact('auth','totalProducts','order_total','unconfirmed_orders','unshipped_orders','delivered_orders','unpaid_orders','recent_orders'));
    }

    public function isAuthorized($user)
    {

      
        if($user['user_role_id'] != 1){

            return false;
        }
        
        // Default deny
        return true;
    }


}
