<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderProduct Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * @property int $product_size_id
 * @property int $quantity
 * @property int $price
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\ProductSize $product_size
 */
class OrderProduct extends Entity
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
        'product_id' => true,
        'order_id' => true,
        'product_size_id' => true,
        'quantity' => true,
        'price' => true,
        'created' => true,
        'modified' => true,
        'product' => true,
        'order' => true,
        'product_size' => true,
    ];
}
