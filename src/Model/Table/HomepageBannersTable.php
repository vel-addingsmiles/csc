<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HomepageBanners Model
 *
 * @method \App\Model\Entity\HomepageBanner get($primaryKey, $options = [])
 * @method \App\Model\Entity\HomepageBanner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HomepageBanner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HomepageBanner|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HomepageBanner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HomepageBanner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HomepageBanner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HomepageBanner findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HomepageBannersTable extends Table
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

        $this->setTable('homepage_banners');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('title')
            ->maxLength('title', 225)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('sub_title')
            ->maxLength('sub_title', 225)
            ->requirePresence('sub_title', 'create')
            ->notEmptyString('sub_title');

       

        return $validator;
    }
}
