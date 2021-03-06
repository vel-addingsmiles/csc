<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * State Entity
 *
 * @property int $id
 * @property string $stateName
 * @property string $country_id
 * @property float $latitude
 * @property float $longitude
 *
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\OrderInvoice[] $order_invoices
 */
class State extends Entity
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
        'stateName' => true,
        'country_id' => true,
        'latitude' => true,
        'longitude' => true,
        'country' => true,
        'order_invoices' => true,
    ];
}
