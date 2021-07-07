<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HomepageSubBanner Entity
 *
 * @property int $id
 * @property string $title
 * @property string $sub_title
 * @property string $sub_banner
 * @property int $product_sub_category_id
 * @property string $price
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProductSubCategory $product_sub_category
 */
class HomepageSubBanner extends Entity
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
        'title' => true,
        'sub_title' => true,
        'sub_banner' => true,
        'product_sub_category_id' => true,
        'price' => true,
        'created' => true,
        'modified' => true,
        'product_sub_category' => true,
    ];
}
