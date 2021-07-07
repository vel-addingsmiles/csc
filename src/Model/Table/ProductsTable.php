<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Behavior;

/**
 * Products Model
 *
 * @property \App\Model\Table\ProductCategoriesTable&\Cake\ORM\Association\BelongsTo $ProductCategories
 * @property \App\Model\Table\ProductSubCategoriesTable&\Cake\ORM\Association\BelongsTo $ProductSubCategories
 * @property \App\Model\Table\CountriesTable&\Cake\ORM\Association\BelongsTo $Countries
 * @property \App\Model\Table\ProductTagsTable&\Cake\ORM\Association\HasMany $ProductTags
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('product_name');
        $this->setPrimaryKey('id');

        
        $this->addBehavior('Muffin/Slug.Slug', [
            // Optionally define your custom options here (see Configuration)
            'implementedEvents' => [
                'Model.beforeSave' => 'beforeSave'
            ],
            'onUpdate' => true 
        ]);




        $this->addBehavior('Timestamp');

        $this->belongsTo('ProductCategories', [
            'foreignKey' => 'product_category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ProductSubCategories', [
            'foreignKey' => 'product_sub_category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ProductTags', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductDetailVarients', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductSizes', [
            'foreignKey' => 'product_id',
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
            ->scalar('product_name')
            ->maxLength('product_name', 255)
            ->requirePresence('product_name', 'create')
            ->notEmptyString('product_name');

        $validator
            ->scalar('product_description')
            ->requirePresence('product_description', 'create')
            ->notEmptyString('product_description');


        $validator
            ->integer('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->scalar('product_features')
            ->allowEmptyString('product_features');

        $validator
            ->integer('compare_price')
            ->requirePresence('compare_price', 'create')
            ->notEmptyString('compare_price');

        $validator
            ->integer('cost_per_item')
            ->requirePresence('cost_per_item', 'create')
            ->notEmptyString('cost_per_item');

        // $validator
        //     ->scalar('barcode')
        //     ->maxLength('barcode', 255)
        //     ->requirePresence('barcode', 'create')
        //     ->notEmptyString('barcode');

        // $validator
        //     ->scalar('sku')
        //     ->maxLength('sku', 255)
        //     ->allowEmptyString('sku');

        // $validator
        //     ->integer('quantity_count')
        //     ->allowEmptyString('quantity_count');

        $validator
            ->integer('weight')
            ->allowEmptyString('weight');

        $validator
            ->scalar('meta_title')
            ->maxLength('meta_title', 255)
            ->allowEmptyString('meta_title');

        $validator
            ->scalar('meta_description')
            ->maxLength('meta_description', 255)
            ->allowEmptyString('meta_description');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->allowEmptyString('slug');

        // $validator
        //     ->scalar('hs_code')
        //     ->maxLength('hs_code', 255)
        //     ->requirePresence('hs_code', 'create')
        //     ->notEmptyString('hs_code');

        $validator
            ->integer('new_arrivals')
            ->notEmptyString('new_arrivals');

        $validator
            ->integer('top_trending')
            ->notEmptyString('top_trending');

        $validator
            ->integer('on_sales')
            ->notEmptyString('on_sales');

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
        $rules->add($rules->existsIn(['product_category_id'], 'ProductCategories'));
        $rules->add($rules->existsIn(['product_sub_category_id'], 'ProductSubCategories'));
        $rules->add($rules->existsIn(['country_id'], 'Countries'));

        return $rules;
    }
}
