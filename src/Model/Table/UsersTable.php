<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @property \App\Model\Table\UserRolesTable&\Cake\ORM\Association\BelongsTo $UserRoles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserRoles', [
            'foreignKey' => 'user_role_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 100)
            ->requirePresence('mobile', 'create')
            ->notEmptyString('mobile');

        $validator
            ->scalar('profile_image')
            ->maxLength('profile_image', 255)
            ->allowEmptyFile('profile_image');


        $validator
            ->scalar('remember_token')
            ->maxLength('remember_token', 255)
            ->allowEmptyString('remember_token');

        $validator
            ->integer('created_by')
            ->notEmptyString('created_by');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_role_id'], 'UserRoles'));

        return $rules;
    }


    public function getUser(\Cake\Datasource\EntityInterface $profile, \Cake\Http\Session $session) {
        // Make sure here that all the required fields are actually present
        if (empty($profile->email)) {
            throw new \RuntimeException('Could not find email on your social profile. Please create an account with us.');
        }



        // If you want to associate the social entity with currently logged in user
        // use the $session argument to get user id and find matching user entity.
        $userId = $session->read('Auth.User.id');
        if ($userId) {
            return $this->get($userId);
        }

        // Check if user with same email exists. This avoids creating multiple
        // user accounts for different social identities of same user. You should
        // probably skip this check if your system doesn't enforce unique email
        // per user.
        $user = $this->find()
            ->where(['email' => $profile->email])
            ->first();

        if ($user) {
            return $user;
        }

        // Create new user account
        // $user = $this->newEntity(['email' => $profile->email]);
        // $user = $this->save($user);


        // Create new user account
        $user = $this->newEntity();
        $userData['email'] = $profile->email;
        $userData['name'] = $profile->email;
        $userData['is_social_login'] = 1;
        $userData['user_role_id'] = 2;
        $user = $this->patchEntity($user, $userData);

        // pr($user); die;
        $user = $this->save($user);

        if (!$user) {
            throw new \RuntimeException('Unable to create new account using your social profile , please create a account with us ');
        }

        return $user;
    }

    public function validationPassword(Validator $validator )
    {

        $validator
            ->add('old_password','custom',[
                'rule'=>  function($value, $context){
                    $user = $this->get($context['data']['id']);
                    if ($user) {
                        if ((new DefaultPasswordHasher)->check($value, $user->password)) {
                            return true;
                        }
                    }
                    return false;
                },
                'message'=>'The old password does not match the current password!',
            ])
            ->notEmpty('old_password');

        $validator
            ->add('password', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'The password have to be at least 6 characters!',
                ]
            ])
            ->add('password',[
                'match'=>[
                    'rule'=> ['compareWith','confirm_password'],
                    'message'=>'The passwords and confirm passwords does not match!',
                ]
            ])
            ->notEmpty('password');
        $validator
            ->add('confirm_password', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'The password have to be at least 6 characters!',
                ]
            ])
            ->notEmpty('confirm_password');

        return $validator;
    }
}
