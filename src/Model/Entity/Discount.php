<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Discount Entity
 *
 * @property int $id
 * @property string $code
 * @property \Cake\I18n\FrozenDate $expiry_date
 * @property int|null $discount
 * @property int $discount_type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Discount extends Entity
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
        'code' => true,
        'expiry_date' => true,
        'discount' => true,
        'discount_type' => true,
        'created' => true,
        'modified' => true,
    ];
}
