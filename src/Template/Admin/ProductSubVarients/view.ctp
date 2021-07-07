<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductSubVarient $productSubVarient
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Sub Varient'), ['action' => 'edit', $productSubVarient->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Sub Varient'), ['action' => 'delete', $productSubVarient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productSubVarient->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Sub Varients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Sub Varient'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Varients'), ['controller' => 'ProductVarients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Varient'), ['controller' => 'ProductVarients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productSubVarients view large-9 medium-8 columns content">
    <h3><?= h($productSubVarient->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product Varient') ?></th>
            <td><?= $productSubVarient->has('product_varient') ? $this->Html->link($productSubVarient->product_varient->name, ['controller' => 'ProductVarients', 'action' => 'view', $productSubVarient->product_varient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productSubVarient->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productSubVarient->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productSubVarient->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($productSubVarient->modified) ?></td>
        </tr>
    </table>
</div>
