<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sidebar $sidebar
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sidebar'), ['action' => 'edit', $sidebar->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sidebar'), ['action' => 'delete', $sidebar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sidebar->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sidebars'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sidebar'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Sub Categories'), ['controller' => 'ProductSubCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Sub Category'), ['controller' => 'ProductSubCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sidebars view large-9 medium-8 columns content">
    <h3><?= h($sidebar->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($sidebar->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($sidebar->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Sub Category') ?></th>
            <td><?= $sidebar->has('product_sub_category') ? $this->Html->link($sidebar->product_sub_category->name, ['controller' => 'ProductSubCategories', 'action' => 'view', $sidebar->product_sub_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sidebar->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sidebar->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sidebar->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Text') ?></h4>
        <?= $this->Text->autoParagraph(h($sidebar->text)); ?>
    </div>
</div>
