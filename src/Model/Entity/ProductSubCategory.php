<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductSubCategory Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property int|null $parent_id
 * @property int $lft
 * @property int $rght
 * @property int $product_category_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProductSubCategory $parent_product_sub_category
 * @property \App\Model\Entity\ProductCategory $product_category
 * @property \App\Model\Entity\ProductSubCategory[] $child_product_sub_categories
 * @property \App\Model\Entity\Product[] $products
 */
class ProductSubCategory extends Entity
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
        'name' => true,
        'slug' => true,
        'parent_id' => true,
        'lft' => true,
        'rght' => true,
        'product_category_id' => true,
        'created' => true,
        'modified' => true,
        'parent_product_sub_category' => true,
        'product_category' => true,
        'child_product_sub_categories' => true,
        'products' => true,
    ];
}
