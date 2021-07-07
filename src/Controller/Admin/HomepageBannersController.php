<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;


/**
 * HomepageBanners Controller
 *
 * @property \App\Model\Table\HomepageBannersTable $HomepageBanners
 *
 * @method \App\Model\Entity\HomepageBanner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomepageBannersController extends AppController
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
        $homepageBanners = $this->HomepageBanners->find('all')->toArray();

        $this->set(compact('homepageBanners'));
    }

    /**
     * View method
     *
     * @param string|null $id Homepage Banner id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $homepageBanner = $this->HomepageBanners->get($id, [
            'contain' => [],
        ]);

        $this->set('homepageBanner', $homepageBanner);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $homepageBanner = $this->HomepageBanners->newEntity();
        if ($this->request->is('post')) {
            $homepageBanner = $this->HomepageBanners->patchEntity($homepageBanner, $this->request->getData());

            if(isset($this->request->getData()['image']) && !empty($this->request->getData()['image']['tmp_name'])){


                    $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['image']['tmp_name'], WWW_ROOT . 'uploads/slider' . DS . $uniqueId ."_".$this->request->getData()['image']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['image']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $homepageBanner->image = $uniqueId ."_".$this->request->getData()['image']['name'];
                    }

            }


            if ($this->HomepageBanners->save($homepageBanner)) {
                $this->Flash->success(__('The homepage banner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The homepage banner could not be saved. Please, try again.'));
        }
        $this->set(compact('homepageBanner'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Homepage Banner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $homepageBanner = $this->HomepageBanners->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $homepageBanner = $this->HomepageBanners->patchEntity($homepageBanner, $this->request->getData());


            if(isset($this->request->getData()['image']) && !empty($this->request->getData()['image']['tmp_name'])){


                    $uniqueId = uniqid();

                 if(move_uploaded_file($this->request->getData()['image']['tmp_name'], WWW_ROOT . 'uploads/slider' . DS . $uniqueId ."_".$this->request->getData()['image']['name']))
                    {

                        $ext = substr(strtolower(strrchr($this->request->getData()['image']['name'], '.')), 1); //get the extension
                    
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        if(!in_array($ext, $arr_ext))
                        {
                            $this->Flash->error(__('Please upload only images'));
                            return $this->redirect($this->referer());  
                        }
                       
                        $homepageBanner->image = $uniqueId ."_".$this->request->getData()['image']['name'];
                    }

            }else{

                $homepageBanner->image = $this->request->getData()['image_hid'];
            }

            if ($this->HomepageBanners->save($homepageBanner)) {
                $this->Flash->success(__('The homepage banner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The homepage banner could not be saved. Please, try again.'));
        }
        $this->set(compact('homepageBanner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Homepage Banner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $homepageBanner = $this->HomepageBanners->get($id);
        if ($this->HomepageBanners->delete($homepageBanner)) {
            $this->Flash->success(__('The homepage banner has been deleted.'));
        } else {
            $this->Flash->error(__('The homepage banner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
