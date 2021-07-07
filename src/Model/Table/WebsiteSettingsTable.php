<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WebsiteSettings Model
 *
 * @method \App\Model\Entity\WebsiteSetting get($primaryKey, $options = [])
 * @method \App\Model\Entity\WebsiteSetting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WebsiteSetting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WebsiteSetting|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WebsiteSetting saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WebsiteSetting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WebsiteSetting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WebsiteSetting findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WebsiteSettingsTable extends Table
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

        $this->setTable('website_settings');
        $this->setDisplayField('id');
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
            ->scalar('email_templates')
            ->requirePresence('email_templates', 'create')
            ->notEmptyString('email_templates');

        return $validator;
    }
}
