<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;

/**
 * ProductSubVarients Controller
 *
 * @property \App\Model\Table\ProductSubVarientsTable $ProductSubVarients
 *
 * @method \App\Model\Entity\ProductSubVarient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductSubVarientsController extends AppController
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
        $productSubVarients = $this->ProductSubVarients->find('all',[
            'contain' => ['ProductVarients'],
        ])->toArray();

        $productSubVarient = $this->ProductSubVarients->newEntity();

        if ($this->request->is('post')) {
            $productSubVarient = $this->ProductSubVarients->patchEntity($productSubVarient, $this->request->getData());
            if ($this->ProductSubVarients->save($productSubVarient)) {
                $this->Flash->success(__('The product sub varient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product sub varient could not be saved. Please, try again.'));
        }

        $productVarients = $this->ProductSubVarients->ProductVarients->find('list', []);
        $this->set(compact('productSubVarient', 'productVarients','productSubVarients'));

       
    }

    /**
     * View method
     *
     * @param string|null $id Product Sub Varient id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productSubVarient = $this->ProductSubVarients->get($id, [
            'contain' => ['ProductVarients'],
        ]);

        $this->set('productSubVarient', $productSubVarient);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productSubVarient = $this->ProductSubVarients->newEntity();
        if ($this->request->is('post')) {
            $productSubVarient = $this->ProductSubVarients->patchEntity($productSubVarient, $this->request->getData());
            if ($this->ProductSubVarients->save($productSubVarient)) {
                $this->Flash->success(__('The product sub varient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product sub varient could not be saved. Please, try again.'));
        }
        $productVarients = $this->ProductSubVarients->ProductVarients->find('list', ['limit' => 200]);
        $this->set(compact('productSubVarient', 'productVarients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Sub Varient id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productSubVarient = $this->ProductSubVarients->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productSubVarient = $this->ProductSubVarients->patchEntity($productSubVarient, $this->request->getData());
            if ($this->ProductSubVarients->save($productSubVarient)) {
                $this->Flash->success(__('The product sub varient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product sub varient could not be saved. Please, try again.'));
        }
        $productVarients = $this->ProductSubVarients->ProductVarients->find('list',[]);
        $this->set(compact('productSubVarient', 'productVarients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Sub Varient id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productSubVarient = $this->ProductSubVarients->get($id);
        if ($this->ProductSubVarients->delete($productSubVarient)) {
            $this->Flash->success(__('The product sub varient has been deleted.'));
        } else {
            $this->Flash->error(__('The product sub varient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
