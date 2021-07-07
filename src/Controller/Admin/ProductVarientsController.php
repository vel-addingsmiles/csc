<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;

/**
 * ProductVarients Controller
 *
 * @property \App\Model\Table\ProductVarientsTable $ProductVarients
 *
 * @method \App\Model\Entity\ProductVarient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductVarientsController extends AppController
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
        $productVarients = $this->ProductVarients->find('all')->toArray();


        $productVarient = $this->ProductVarients->newEntity();
        
        if ($this->request->is('post')) {
            $productVarient = $this->ProductVarients->patchEntity($productVarient, $this->request->getData());
            if ($this->ProductVarients->save($productVarient)) {
                $this->Flash->success(__('The product varient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product varient could not be saved. Please, try again.'));
        }

        $this->set(compact('productVarients','productVarient'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Varient id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productVarient = $this->ProductVarients->get($id, [
            'contain' => [],
        ]);



        $this->set('productVarient', $productVarient);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productVarient = $this->ProductVarients->newEntity();
        if ($this->request->is('post')) {
            $productVarient = $this->ProductVarients->patchEntity($productVarient, $this->request->getData());
            if ($this->ProductVarients->save($productVarient)) {
                $this->Flash->success(__('The product varient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product varient could not be saved. Please, try again.'));
        }
        $this->set(compact('productVarient'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Varient id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productVarient = $this->ProductVarients->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productVarient = $this->ProductVarients->patchEntity($productVarient, $this->request->getData());
            if ($this->ProductVarients->save($productVarient)) {
                $this->Flash->success(__('The product varient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product varient could not be saved. Please, try again.'));
        }
        $this->set(compact('productVarient'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Varient id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productVarient = $this->ProductVarients->get($id);
        if ($this->ProductVarients->delete($productVarient)) {
            $this->Flash->success(__('The product varient has been deleted.'));
        } else {
            $this->Flash->error(__('The product varient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
