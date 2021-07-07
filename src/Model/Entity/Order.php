<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string $order_number
 * @property int $discount_id
 * @property int $status
 * @property int $user_id
 * @property int $invoice_status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Discount $discount
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\OrderInvoice[] $order_invoices
 * @property \App\Model\Entity\OrderProduct[] $order_products
 * @property \App\Model\Entity\OrderVarient[] $order_varients
 */
class Order extends Entity
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
        'order_number' => true,
        'order_total' => true,
        'discount_id' => true,
        'status' => true,
        'user_id' => true,
        'invoice_status' => true,
        'created' => true,
        'modified' => true,
        'discount' => true,
        'user' => true,
        'order_invoices' => true,
        'order_products' => true,
        'order_varients' => true,
    ];
}
