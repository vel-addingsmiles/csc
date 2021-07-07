<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HomepageSubBanner $homepageSubBanner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Homepage Sub Banners'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Sub Categories'), ['controller' => 'ProductSubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Sub Category'), ['controller' => 'ProductSubCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="homepageSubBanners form large-9 medium-8 columns content">
    <?= $this->Form->create($homepageSubBanner) ?>
    <fieldset>
        <legend><?= __('Add Homepage Sub Banner') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('sub_title');
            echo $this->Form->control('sub_banner');
            echo $this->Form->control('product_sub_category_id', ['options' => $productSubCategories]);
            echo $this->Form->control('price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
