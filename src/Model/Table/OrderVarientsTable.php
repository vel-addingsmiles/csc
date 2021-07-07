<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderVarients Model
 *
 * @property &\Cake\ORM\Association\BelongsTo $OrderProducts
 * @property \App\Model\Table\ProductSubVarientsTable&\Cake\ORM\Association\BelongsTo $ProductSubVarients
 *
 * @method \App\Model\Entity\OrderVarient get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrderVarient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrderVarient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrderVarient|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrderVarient saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrderVarient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrderVarient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrderVarient findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrderVarientsTable extends Table
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

        $this->setTable('order_varients');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('OrderProducts', [
            'foreignKey' => 'order_product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ProductSubVarients', [
            'foreignKey' => 'product_sub_varient_id',
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
        $rules->add($rules->existsIn(['order_product_id'], 'OrderProducts'));
        $rules->add($rules->existsIn(['product_sub_varient_id'], 'ProductSubVarients'));

        return $rules;
    }
}
