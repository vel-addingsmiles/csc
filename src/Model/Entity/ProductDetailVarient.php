<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductDetailVarient Entity
 *
 * @property int $id
 * @property int $product_varient_id
 * @property int $product_sub_varient_id
 * @property int $product_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProductVarient $product_varient
 * @property \App\Model\Entity\ProductSubVarient $product_sub_varient
 * @property \App\Model\Entity\Product $product
 */
class ProductDetailVarient extends Entity
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
        'product_sub_varient_id' => true,
        'product_id' => true,
        'created' => true,
        'modified' => true,
        'product_varient' => true,
        'product_sub_varient' => true,
        'product' => true,
    ];
}
