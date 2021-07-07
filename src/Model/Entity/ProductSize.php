<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductSize Entity
 *
 * @property int $id
 * @property string $sku_code
 * @property int $product_id
 * @property string $size
 * @property int $quantity
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Product $product
 */
class ProductSize extends Entity
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
        'sku_code' => true,
        'product_id' => true,
        'size' => true,
        'quantity' => true,
        'created' => true,
        'modified' => true,
        'product' => true,
    ];
}
