<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductSubCategory $productSubCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Sub Category'), ['action' => 'edit', $productSubCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Sub Category'), ['action' => 'delete', $productSubCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productSubCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Sub Category'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Sub Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Product Sub Category'), ['controller' => 'ProductSubCategory', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Product Sub Category'), ['controller' => 'ProductSubCategory', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Category'), ['controller' => 'ProductCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Product Sub Category'), ['controller' => 'ProductSubCategory', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Product Sub Category'), ['controller' => 'ProductSubCategory', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productSubCategory view large-9 medium-8 columns content">
    <h3><?= h($productSubCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productSubCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($productSubCategory->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Product Sub Category') ?></th>
            <td><?= $productSubCategory->has('parent_product_sub_category') ? $this->Html->link($productSubCategory->parent_product_sub_category->name, ['controller' => 'ProductSubCategory', 'action' => 'view', $productSubCategory->parent_product_sub_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Category') ?></th>
            <td><?= $productSubCategory->has('product_category') ? $this->Html->link($productSubCategory->product_category->name, ['controller' => 'ProductCategories', 'action' => 'view', $productSubCategory->product_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productSubCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lft') ?></th>
            <td><?= $this->Number->format($productSubCategory->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rght') ?></th>
            <td><?= $this->Number->format($productSubCategory->rght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productSubCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($productSubCategory->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product Sub Category') ?></h4>
        <?php if (!empty($productSubCategory->child_product_sub_category)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Lft') ?></th>
                <th scope="col"><?= __('Rght') ?></th>
                <th scope="col"><?= __('Product Category Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productSubCategory->child_product_sub_category as $childProductSubCategory): ?>
            <tr>
                <td><?= h($childProductSubCategory->id) ?></td>
                <td><?= h($childProductSubCategory->name) ?></td>
                <td><?= h($childProductSubCategory->slug) ?></td>
                <td><?= h($childProductSubCategory->parent_id) ?></td>
                <td><?= h($childProductSubCategory->lft) ?></td>
                <td><?= h($childProductSubCategory->rght) ?></td>
                <td><?= h($childProductSubCategory->product_category_id) ?></td>
                <td><?= h($childProductSubCategory->created) ?></td>
                <td><?= h($childProductSubCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductSubCategory', 'action' => 'view', $childProductSubCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductSubCategory', 'action' => 'edit', $childProductSubCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductSubCategory', 'action' => 'delete', $childProductSubCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childProductSubCategory->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
