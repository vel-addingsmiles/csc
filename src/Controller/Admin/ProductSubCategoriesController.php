<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;

/**
 * ProductSubCategory Controller
 *
 * @property \App\Model\Table\ProductSubCategoryTable $ProductSubCategory
 *
 * @method \App\Model\Entity\ProductSubCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductSubCategoriesController extends AppController
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
        
        $productSubCategories = $this->ProductSubCategories->find('all',[
            'contain' => ['ParentProductSubCategories', 'ProductCategories'],
            'conditions' => ['ProductSubCategories.lft !=' => 1 ]
        ])->toArray();


        $productSubCategory = $this->ProductSubCategories->newEntity();


        if ($this->request->is('post')) {
            $productSubCategory = $this->ProductSubCategories->patchEntity($productSubCategory, $this->request->getData());
            if ($this->ProductSubCategories->save($productSubCategory)) {
                $this->Flash->success(__('The product sub category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product sub category could not be saved. Please, try again.'));
        }


        $parentProductSubCategory = $this->ProductSubCategories->ParentProductSubCategories->find('list', [
                   'conditions' => ['lft' => 1 ]
                ]);


        $productCategories = $this->ProductSubCategories->ProductCategories->find('list', []);


        $this->set(compact('productSubCategory', 'productSubCategories' ,'parentProductSubCategory', 'productCategories'));

    }

    /**
     * View method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productSubCategory = $this->ProductSubCategory->get($id, [
            'contain' => ['ParentProductSubCategory', 'ProductCategories', 'ChildProductSubCategory'],
        ]);

        $this->set('productSubCategory', $productSubCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productSubCategory = $this->ProductSubCategory->newEntity();
        if ($this->request->is('post')) {
            $productSubCategory = $this->ProductSubCategory->patchEntity($productSubCategory, $this->request->getData());
            if ($this->ProductSubCategory->save($productSubCategory)) {
                $this->Flash->success(__('The product sub category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product sub category could not be saved. Please, try again.'));
        }
        $parentProductSubCategory = $this->ProductSubCategory->ParentProductSubCategories->find('list', ['limit' => 200]);
        $productCategories = $this->ProductSubCategory->ProductCategories->find('list', ['limit' => 200]);
        $this->set(compact('productSubCategory', 'parentProductSubCategory', 'productCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productSubCategory = $this->ProductSubCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productSubCategory = $this->ProductSubCategories->patchEntity($productSubCategory, $this->request->getData());
            if ($this->ProductSubCategories->save($productSubCategory)) {
                $this->Flash->success(__('The product sub category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product sub category could not be saved. Please, try again.'));
        }
     
        $productCategories = $this->ProductSubCategories->ProductCategories->find('list', ['limit' => 200]);
        $parentProductSubCategory = $this->ProductSubCategories->ParentProductSubCategories->find('list', [
                   'conditions' => ['lft' => 1 ]
                ]);
        $this->set(compact('productSubCategory', 'parentProductSubCategory', 'productCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productSubCategory = $this->ProductSubCategory->get($id);
        if ($this->ProductSubCategory->delete($productSubCategory)) {
            $this->Flash->success(__('The product sub category has been deleted.'));
        } else {
            $this->Flash->error(__('The product sub category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
