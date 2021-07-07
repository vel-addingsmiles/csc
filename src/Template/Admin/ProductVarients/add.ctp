<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductVarient $productVarient
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product Varients'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="productVarients form large-9 medium-8 columns content">
    <?= $this->Form->create($productVarient) ?>
    <fieldset>
        <legend><?= __('Add Product Varient') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
