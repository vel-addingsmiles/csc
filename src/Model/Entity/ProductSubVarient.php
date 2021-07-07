<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductSubVarient Entity
 *
 * @property int $id
 * @property int $product_varient_id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProductVarient $product_varient
 */
class ProductSubVarient extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'product_varient_id' => true,
        'name' => true,
        'created' => true,
        'modified' => true,
        'product_varient' => true,
    ];
}
