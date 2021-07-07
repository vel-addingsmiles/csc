<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductSubCategories Model
 *
 * @property \App\Model\Table\ProductSubCategoriesTable&\Cake\ORM\Association\BelongsTo $ParentProductSubCategories
 * @property \App\Model\Table\ProductCategoriesTable&\Cake\ORM\Association\BelongsTo $ProductCategories
 * @property \App\Model\Table\ProductSubCategoriesTable&\Cake\ORM\Association\HasMany $ChildProductSubCategories
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\ProductSubCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductSubCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductSubCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductSubCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductSubCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductSubCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductSubCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductSubCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class ProductSubCategoriesTable extends Table
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

        $this->setTable('product_sub_categories');
        // $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentProductSubCategories', [
            'className' => 'ProductSubCategories',
            'foreignKey' => 'parent_id',
        ]);
        $this->belongsTo('ProductCategories', [
            'foreignKey' => 'product_category_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ChildProductSubCategories', [
            'className' => 'ProductSubCategories',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'product_sub_category_id',
        ]);


        $this->addBehavior('Muffin/Slug.Slug', [
            // Optionally define your custom options here (see Configuration)
            'implementedEvents' => [
                'Model.beforeSave' => 'beforeSave'
            ],
            'onUpdate' => true 
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
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->allowEmptyString('slug');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentProductSubCategories'));
        $rules->add($rules->existsIn(['product_category_id'], 'ProductCategories'));

        return $rules;
    }
}
