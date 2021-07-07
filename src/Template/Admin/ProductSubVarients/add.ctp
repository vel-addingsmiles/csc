<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductSubVarient $productSubVarient
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product Sub Varients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Varients'), ['controller' => 'ProductVarients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Varient'), ['controller' => 'ProductVarients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productSubVarients form large-9 medium-8 columns content">
    <?= $this->Form->create($productSubVarient) ?>
    <fieldset>
        <legend><?= __('Add Product Sub Varient') ?></legend>
        <?php
            echo $this->Form->control('product_varient_id', ['options' => $productVarients]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
