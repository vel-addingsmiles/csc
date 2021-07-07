<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HomepageSubBanner $homepageSubBanner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Homepage Sub Banner'), ['action' => 'edit', $homepageSubBanner->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Homepage Sub Banner'), ['action' => 'delete', $homepageSubBanner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $homepageSubBanner->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Homepage Sub Banners'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Homepage Sub Banner'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Sub Categories'), ['controller' => 'ProductSubCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Sub Category'), ['controller' => 'ProductSubCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="homepageSubBanners view large-9 medium-8 columns content">
    <h3><?= h($homepageSubBanner->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($homepageSubBanner->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Title') ?></th>
            <td><?= h($homepageSubBanner->sub_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Banner') ?></th>
            <td><?= h($homepageSubBanner->sub_banner) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Sub Category') ?></th>
            <td><?= $homepageSubBanner->has('product_sub_category') ? $this->Html->link($homepageSubBanner->product_sub_category->name, ['controller' => 'ProductSubCategories', 'action' => 'view', $homepageSubBanner->product_sub_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($homepageSubBanner->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($homepageSubBanner->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($homepageSubBanner->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($homepageSubBanner->modified) ?></td>
        </tr>
    </table>
</div>
