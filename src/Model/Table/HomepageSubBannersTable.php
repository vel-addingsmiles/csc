<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HomepageSubBanners Model
 *
 * @property \App\Model\Table\ProductSubCategoriesTable&\Cake\ORM\Association\BelongsTo $ProductSubCategories
 *
 * @method \App\Model\Entity\HomepageSubBanner get($primaryKey, $options = [])
 * @method \App\Model\Entity\HomepageSubBanner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HomepageSubBanner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HomepageSubBanner|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HomepageSubBanner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HomepageSubBanner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HomepageSubBanner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HomepageSubBanner findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HomepageSubBannersTable extends Table
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

        $this->setTable('homepage_sub_banners');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProductSubCategories', [
            'foreignKey' => 'product_sub_category_id',
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
            ->scalar('title')
            ->maxLength('title', 225)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('sub_title')
            ->maxLength('sub_title', 225)
            ->requirePresence('sub_title', 'create')
            ->notEmptyString('sub_title');

 

        $validator
            ->scalar('price')
            ->maxLength('price', 225)
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

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
        $rules->add($rules->existsIn(['product_sub_category_id'], 'ProductSubCategories'));

        return $rules;
    }
}
