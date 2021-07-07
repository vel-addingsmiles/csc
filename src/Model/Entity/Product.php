<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $product_name
 * @property int $product_category_id
 * @property int $product_sub_category_id
 * @property string $product_description
 * @property string $product_image_1
 * @property string $product_image_2
 * @property string $product_image_3
 * @property string $product_image_4
 * @property string|null $product_image_5
 * @property string|null $product_image_6
 * @property string|null $product_image_7
 * @property int $price
 * @property string|null $product_features
 * @property int $compare_price
 * @property int $cost_per_item
 * @property int $country_id
 * @property string $barcode
 * @property string|null $sku
 * @property int|null $quantity_count
 * @property int|null $weight
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $slug
 * @property string $hs_code
 * @property int $new_arrivals
 * @property int $top_trending
 * @property int $on_sales
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProductCategory $product_category
 * @property \App\Model\Entity\ProductSubCategory $product_sub_category
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\ProductTag[] $product_tags
 */
class Product extends Entity
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
        'product_name' => true,
        'slug' => true,
        'product_category_id' => true,
        'product_sub_category_id' => true,
        'product_description' => true,
        'product_image_1' => true,
        'product_image_2' => true,
        'product_image_3' => true,
        'product_image_4' => true,
        'product_image_5' => true,
        'product_image_6' => true,
        'product_image_7' => true,
        'price' => true,
        'sold_quantity' => true,
        'product_features' => true,
        'compare_price' => true,
        'cost_per_item' => true,
        'country_id' => true,
        'barcode' => true,
        'sku' => true,
        'quantity_count' => true,
        'weight' => true,
        'meta_title' => true,
        'meta_description' => true,
        'hs_code' => true,
        'new_arrivals' => true,
        'top_trending' => true,
        'on_sales' => true,
        'is_deleted' => true,
        'created' => true,
        'modified' => true,
        'product_category' => true,
        'product_sub_category' => true,
        'country' => true,
        'product_tags' => true,
    ];
}
