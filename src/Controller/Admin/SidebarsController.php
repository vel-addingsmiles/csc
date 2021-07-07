<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Event\Event;

/**
 * Sidebars Controller
 *
 * @property \App\Model\Table\SidebarsTable $Sidebars
 *
 * @method \App\Model\Entity\Sidebar[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SidebarsController extends AppController
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
        // $this->paginate = [
        //     'contain' => ['ProductSubCategories'],
        // ];
        // $sidebars = $this->paginate($this->Sidebars);
        $sidebars = $this->Sidebars->find('all',[
            'contain' => ['ProductSubCategories']
        ])->toArray();

        $this->set(compact('sidebars'));
    }

    /**
     * View method
     *
     * @param string|null $id Sidebar id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sidebar = $this->Sidebars->get($id, [
            'contain' => ['ProductSubCategories'],
        ]);

        $this->set('sidebar', $sidebar);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sidebar = $this->Sidebars->newEntity();
        if ($this->request->is('post')) {
            $sidebar = $this->Sidebars->patchEntity($sidebar, $this->request->getData());

             if(isset($this->request->getData()["image"]) && !empty($this->request->getData()["image"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['image']['tmp_name'], WWW_ROOT . 'uploads/collections' . DS . $uniqueId ."_".$this->request->getData()['image']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['image']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $sidebar->image = $uniqueId ."_".$this->request->getData()['image']['name'];
                    }
            }

            if ($this->Sidebars->save($sidebar)) {
                $this->Flash->success(__('The sidebar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sidebar could not be saved. Please, try again.'));
        }


        $this->loadModel('ProductSubCategories');

        $productCategories = $this->ProductSubCategories->find('list', [
            'conditions' => ['product_category_id !=' => 0]
        ]);


        $this->set(compact('sidebar', 'productCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sidebar id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sidebar = $this->Sidebars->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sidebar = $this->Sidebars->patchEntity($sidebar, $this->request->getData());

            if(isset($this->request->getData()["image"]) && !empty($this->request->getData()["image"]['tmp_name'])){

                 $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['image']['tmp_name'], WWW_ROOT . 'uploads/collections' . DS . $uniqueId ."_".$this->request->getData()['image']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['image']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $sidebar->image = $uniqueId ."_".$this->request->getData()['image']['name'];
                    }
            }else{
                $sidebar->image = $this->request->getData()['image_hidden'];
            }

            if ($this->Sidebars->save($sidebar)) {
                $this->Flash->success(__('The sidebar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sidebar could not be saved. Please, try again.'));
        }
        
        $this->loadModel('ProductSubCategories');

        $productCategories = $this->ProductSubCategories->find('list', [
            'conditions' => ['product_category_id !=' => 0]
        ]);

        $this->set(compact('sidebar', 'productCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sidebar id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sidebar = $this->Sidebars->get($id);
        if ($this->Sidebars->delete($sidebar)) {
            $this->Flash->success(__('The sidebar has been deleted.'));
        } else {
            $this->Flash->error(__('The sidebar could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
