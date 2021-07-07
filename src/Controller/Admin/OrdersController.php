<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
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
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('back_end_dashboard');
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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {


        $paginateArray = [
            'order' => ['Orders.created' => 'DESC'],
            'contain' => ['OrderProducts' => ['Products'] ,'OrderInvoices','Users']            
        ];

        $conditions[] = ['Orders.status' => 1 , 'Orders.invoice_status' => 0];

        if ($this->request->is('get')) {

            if (!empty($this->request->getQuery()['search'])) {

                $conditions[] = array('order_number LIKE' => '%'.$this->request->getQuery()['search'].'%');
                $paginateArray['conditions'] = ['AND' => $conditions];
            }

        }

        $paginateArray['conditions'] = $conditions;

        
// pr($paginateArray); die;        
        $this->paginate = $paginateArray;

      
      $orders = $this->paginate($this->Orders);

      $this->set(compact('orders'));

      // pr($orders); die;
    }


    public function confirmedOrders()
    {


        $paginateArray = [
            'order' => ['Orders.created' => 'DESC'],
            'contain' => ['OrderProducts' => ['Products'] ,'OrderInvoices','Users']            
        ];

        $conditions[] = ['Orders.status' => 1 , 'Orders.invoice_status' => 1];

        if ($this->request->is('get')) {

            if (!empty($this->request->getQuery()['search'])) {

                $conditions[] = array('order_number LIKE' => '%'.$this->request->getQuery()['search'].'%');
                $paginateArray['conditions'] = ['AND' => $conditions];
            }

        }

        $paginateArray['conditions'] = $conditions;

        
// pr($paginateArray); die;        
        $this->paginate = $paginateArray;

      
      $orders = $this->paginate($this->Orders);

      $this->set(compact('orders'));

      // pr($orders); die;
    }

    public function shippedOrders()
    {


        $paginateArray = [
            'order' => ['Orders.created' => 'DESC'],
            'contain' => ['OrderProducts' => ['Products'] ,'OrderInvoices','Users']            
        ];

        $conditions[] = ['Orders.status' => 1 , 'Orders.invoice_status' => 2];

        if ($this->request->is('get')) {

            if (!empty($this->request->getQuery()['search'])) {

                $conditions[] = array('order_number LIKE' => '%'.$this->request->getQuery()['search'].'%');
                $paginateArray['conditions'] = ['AND' => $conditions];
            }

        }

        $paginateArray['conditions'] = $conditions;

        
// pr($paginateArray); die;        
        $this->paginate = $paginateArray;

      
      $orders = $this->paginate($this->Orders);

      $this->set(compact('orders'));

      // pr($orders); die;
    }


    public function deliveredOrders()
    {


        $paginateArray = [
            'order' => ['Orders.created' => 'DESC'],
            'contain' => ['OrderProducts' => ['Products'] ,'OrderInvoices','Users']            
        ];

        $conditions[] = ['Orders.status' => 1 , 'Orders.invoice_status' => 3];

        if ($this->request->is('get')) {

            if (!empty($this->request->getQuery()['search'])) {

                $conditions[] = array('order_number LIKE' => '%'.$this->request->getQuery()['search'].'%');
                $paginateArray['conditions'] = ['AND' => $conditions];
            }

        }

        $paginateArray['conditions'] = $conditions;

        
// pr($paginateArray); die;        
        $this->paginate = $paginateArray;

      
      $orders = $this->paginate($this->Orders);

      $this->set(compact('orders'));

      // pr($orders); die;
    }


    public function cancelledOrders()
    {


        $paginateArray = [
            'order' => ['Orders.created' => 'DESC'],
            'contain' => ['OrderProducts' => ['Products'] ,'OrderInvoices','Users']            
        ];

        $conditions[] = ['Orders.status' => 1 , 'Orders.invoice_status' => 4];

        if ($this->request->is('get')) {

            if (!empty($this->request->getQuery()['search'])) {

                $conditions[] = array('order_number LIKE' => '%'.$this->request->getQuery()['search'].'%');
                $paginateArray['conditions'] = ['AND' => $conditions];
            }

        }

        $paginateArray['conditions'] = $conditions;

        
// pr($paginateArray); die;        
        $this->paginate = $paginateArray;

      
      $orders = $this->paginate($this->Orders);

      $this->set(compact('orders'));

      // pr($orders); die;
    }

    public function returnedOrders()
    {


        $paginateArray = [
            'order' => ['Orders.created' => 'DESC'],
            'contain' => ['OrderProducts' => ['Products'] ,'OrderInvoices','Users']            
        ];

        $conditions[] = ['Orders.status' => 1 , 'Orders.invoice_status' => 5];

        if ($this->request->is('get')) {

            if (!empty($this->request->getQuery()['search'])) {

                $conditions[] = array('order_number LIKE' => '%'.$this->request->getQuery()['search'].'%');
                $paginateArray['conditions'] = ['AND' => $conditions];
            }

        }

        $paginateArray['conditions'] = $conditions;

        
// pr($paginateArray); die;        
        $this->paginate = $paginateArray;

      
      $orders = $this->paginate($this->Orders);

      $this->set(compact('orders'));

      // pr($orders); die;
    }


    public function moneyReturnedOrders()
    {


        $paginateArray = [
            'order' => ['Orders.created' => 'DESC'],
            'contain' => ['OrderProducts' => ['Products'] ,'OrderInvoices','Users']            
        ];

        $conditions[] = ['Orders.status' => 1 , 'Orders.invoice_status' => 6];

        if ($this->request->is('get')) {

            if (!empty($this->request->getQuery()['search'])) {

                $conditions[] = array('order_number LIKE' => '%'.$this->request->getQuery()['search'].'%');
                $paginateArray['conditions'] = ['AND' => $conditions];
            }

        }

        $paginateArray['conditions'] = $conditions;

        
// pr($paginateArray); die;        
        $this->paginate = $paginateArray;

      
      $orders = $this->paginate($this->Orders);

      $this->set(compact('orders'));

      // pr($orders); die;
    }


     public function abandonedCheckouts()
    {


        $paginateArray = [
            'order' => ['Orders.created' => 'DESC'],
            'contain' => ['OrderProducts' => ['Products'] ,'OrderInvoices','Users']            
        ];

        $conditions[] = ['Orders.status' => 0 ];

        if ($this->request->is('get')) {

            if (!empty($this->request->getQuery()['search'])) {

                $conditions[] = array('order_number LIKE' => '%'.$this->request->getQuery()['search'].'%');
                $paginateArray['conditions'] = ['AND' => $conditions];
            }

        }

        $paginateArray['conditions'] = $conditions;

        
// pr($paginateArray); die;        
        $this->paginate = $paginateArray;

      
      $orders = $this->paginate($this->Orders);

      $this->set(compact('orders'));

      // pr($orders); die;
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Discounts');
        
        $order = $this->Orders->get($id, [
            'contain' => [ 'Users', 'OrderInvoices' => ['Countries','States'] , 'OrderProducts' => [ 'Products' , 'productSizes' , 'OrderVarients' => ['ProductSubVarients' => ['ProductVarients'] ] ]],
        ]);

        $getDiscount = $this->Discounts->find('all',[
            'conditions' => ['id' => $order['discount_id']]
        ])->first();

        $this->set('getDiscount', $getDiscount);
        $this->set('order', $order);

        // pr($getDiscount); die;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function changeStatus()
    {
        $this->loadModel('OrderStatus');
        $this->loadModel('WebsiteSettings');

        $status = [0 => 'Order Received' , 1 => 'Order Confirmed' , 2 => 'Order Shipped' , 3 => 'Order Delivered' , 4 => 'Order Cancelled' , 5 => 'Order Returned' , 6 => 'Amount Returned' ];
        
        $order = $this->Orders->get($this->request->getData()['order_id'],[
            'contain' => ['OrderInvoices']
        ]);

        $order->invoice_status = $this->request->getData()['status'];

        // pr($order); die;

        $this->Orders->save($order);

        $order_status = $this->OrderStatus->newEntity();

        $order_status->order_id = $this->request->getData()['order_id'];
        $order_status->status = $status[$this->request->getData()['status']];

        $this->OrderStatus->save($order_status);

        if($this->request->getData()['status'] == 6){

            $settings = $this->WebsiteSettings->get(4);

            $settings['email_templates'] = str_replace(array('#NAME','#MESSAGE'), array(
                                                $order['order_invoice']['billing_name'],
                                                'We have refunded your money for your previous order with <br><br>invoice number: '.$order['order_number']." and Rs.".$order['order_total']
                                                ), $settings['email_templates']
                                              );      
               

             $this->_sendEmailMessage($order['order_invoice']['billing_email'], $settings['email_templates'], 'Payment Refunded :: Chennis ');

        }

        echo json_encode(['message' => 'Updated Successfully']);

        exit;

    }


    public function getHistory()
    {

        $getHistory = $this->Orders->find('all',[
          'contain' => ['OrderStatus']
        ])->first();

        // pr($getHistory);

        $html = "<tr><td>Order has been placed on </td><td>".$getHistory['created']."</td></tr>";

        foreach ($getHistory['order_status'] as $key => $history) {
            
            $html .= "<tr><td>".$history['status']." on </td><td>".$history['created']."</td></tr>"; 

        }
        
        echo json_encode(['html' => $html]);

        exit;
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $discounts = $this->Orders->Discounts->find('list', ['limit' => 200]);
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $this->set(compact('order', 'discounts', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
