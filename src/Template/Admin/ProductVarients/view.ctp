<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductVarient $productVarient
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Varient'), ['action' => 'edit', $productVarient->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Varient'), ['action' => 'delete', $productVarient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productVarient->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Varients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Varient'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productVarients view large-9 medium-8 columns content">
    <h3><?= h($productVarient->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productVarient->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productVarient->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productVarient->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($productVarient->modified) ?></td>
        </tr>
    </table>
</div>
