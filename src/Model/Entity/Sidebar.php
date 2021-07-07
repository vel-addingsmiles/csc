<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sidebar Entity
 *
 * @property int $id
 * @property string $image
 * @property string $price
 * @property string $text
 * @property int $product_sub_category_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProductSubCategory $product_sub_category
 */
class Sidebar extends Entity
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
        'image' => true,
        'price' => true,
        'text' => true,
        'product_sub_category_id' => true,
        'created' => true,
        'modified' => true,
        'product_sub_category' => true,
    ];
}
