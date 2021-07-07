<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductSubCategory $productSubCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product Sub Category'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Product Sub Category'), ['controller' => 'ProductSubCategory', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Product Sub Category'), ['controller' => 'ProductSubCategory', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Category'), ['controller' => 'ProductCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productSubCategory form large-9 medium-8 columns content">
    <?= $this->Form->create($productSubCategory) ?>
    <fieldset>
        <legend><?= __('Add Product Sub Category') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('slug');
            echo $this->Form->control('parent_id', ['options' => $parentProductSubCategory]);
            echo $this->Form->control('product_category_id', ['options' => $productCategories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
