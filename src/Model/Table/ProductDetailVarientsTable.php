<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductDetailVarients Model
 *
 * @property \App\Model\Table\ProductVarientsTable&\Cake\ORM\Association\BelongsTo $ProductVarients
 * @property \App\Model\Table\ProductSubVarientsTable&\Cake\ORM\Association\BelongsTo $ProductSubVarients
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\ProductDetailVarient get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductDetailVarient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductDetailVarient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductDetailVarient|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductDetailVarient saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductDetailVarient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductDetailVarient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductDetailVarient findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductDetailVarientsTable extends Table
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

        $this->setTable('product_detail_varients');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProductVarients', [
            'foreignKey' => 'product_varient_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ProductSubVarients', [
            'foreignKey' => 'product_sub_varient_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
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
        $rules->add($rules->existsIn(['product_varient_id'], 'ProductVarients'));
        $rules->add($rules->existsIn(['product_sub_varient_id'], 'ProductSubVarients'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
