<?php

namespace App\Controller\Admin;


use App\Controller\Admin\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */

class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login']);

        $this->viewBuilder()->setLayout('back_end_dashboard');
    }
    /**
     * dashboard method
     *
     * @return \Cake\Http\Response|null
     */
    public function dashboard()
    {

    }


    /**
     * login method
     *
     * @return \Cake\Http\Response|null
     */
    public function login()
    {
        $this->viewBuilder()->setLayout('admin_login');

        if ($this->request->is('post')) {


            $user = $this->Auth->identify();

            if ($user) {

                $this->Auth->setUser($user);

                $this->Flash->success(__('logged in successfully'));

                return $this->redirect($this->Auth->redirectUrl());

            }else{

                $this->Flash->error(__('Invalid username or password'));
            }

        }
    }
    /**
     * logout method
     *
     * @return \Cake\Http\Response|null
     */
    public function logout()
    {

        $this->Flash->success('You are now logged out.');

        return $this->redirect($this->Auth->logout());

    }
    /**
     * change password method
     *
     * @return \Cake\Http\Response|null
     */

    public function changePassword()
    {
        $this->viewBuilder()->setLayout('back_end_dashboard');

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
}