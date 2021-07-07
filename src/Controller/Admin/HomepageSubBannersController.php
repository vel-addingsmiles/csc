<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * HomepageSubBanners Controller
 *
 * @property \App\Model\Table\HomepageSubBannersTable $HomepageSubBanners
 *
 * @method \App\Model\Entity\HomepageSubBanner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomepageSubBannersController extends AppController
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

        $homepageSubBanners = $this->HomepageSubBanners->find('all',[
            'contain' => ['ProductSubCategories'],
        ])->toArray();

        $this->set(compact('homepageSubBanners'));
    }

    /**
     * View method
     *
     * @param string|null $id Homepage Sub Banner id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $homepageSubBanner = $this->HomepageSubBanners->get($id, [
            'contain' => ['ProductSubCategories'],
        ]);

        $this->set('homepageSubBanner', $homepageSubBanner);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $homepageSubBanner = $this->HomepageSubBanners->newEntity();
        if ($this->request->is('post')) {
            $homepageSubBanner = $this->HomepageSubBanners->patchEntity($homepageSubBanner, $this->request->getData());
            if ($this->HomepageSubBanners->save($homepageSubBanner)) {
                $this->Flash->success(__('The homepage sub banner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The homepage sub banner could not be saved. Please, try again.'));
        }
        $productSubCategories = $this->HomepageSubBanners->ProductSubCategories->find('list', ['limit' => 200]);
        $this->set(compact('homepageSubBanner', 'productSubCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Homepage Sub Banner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $homepageSubBanner = $this->HomepageSubBanners->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $homepageSubBanner = $this->HomepageSubBanners->patchEntity($homepageSubBanner, $this->request->getData());

            if(isset($this->request->getData()['sub_banner']) && !empty($this->request->getData()['sub_banner']['tmp_name'])){


                    $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['sub_banner']['tmp_name'], WWW_ROOT . 'uploads/slider' . DS . $uniqueId ."_".$this->request->getData()['sub_banner']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['sub_banner']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $homepageSubBanner->sub_banner = $uniqueId ."_".$this->request->getData()['sub_banner']['name'];
                    }

            }else{

                $homepageSubBanner->sub_banner = $this->request->getData()['image_hid'];
            }
            
            if ($this->HomepageSubBanners->save($homepageSubBanner)) {
                $this->Flash->success(__('The homepage sub banner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The homepage sub banner could not be saved. Please, try again.'));
        }
        $productSubCategories = $this->HomepageSubBanners->ProductSubCategories->find('list', ['conditions' => ['ProductSubCategories.product_category_id' => 0] ]);
        $this->set(compact('homepageSubBanner', 'productSubCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Homepage Sub Banner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $homepageSubBanner = $this->HomepageSubBanners->get($id);
        if ($this->HomepageSubBanners->delete($homepageSubBanner)) {
            $this->Flash->success(__('The homepage sub banner has been deleted.'));
        } else {
            $this->Flash->error(__('The homepage sub banner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
