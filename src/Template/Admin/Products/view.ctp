<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Category'), ['controller' => 'ProductCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Sub Categories'), ['controller' => 'ProductSubCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Sub Category'), ['controller' => 'ProductSubCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Tags'), ['controller' => 'ProductTags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Tag'), ['controller' => 'ProductTags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product Name') ?></th>
            <td><?= h($product->product_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Category') ?></th>
            <td><?= $product->has('product_category') ? $this->Html->link($product->product_category->name, ['controller' => 'ProductCategories', 'action' => 'view', $product->product_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Sub Category') ?></th>
            <td><?= $product->has('product_sub_category') ? $this->Html->link($product->product_sub_category->name, ['controller' => 'ProductSubCategories', 'action' => 'view', $product->product_sub_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Image 1') ?></th>
            <td><?= h($product->product_image_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Image 2') ?></th>
            <td><?= h($product->product_image_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Image 3') ?></th>
            <td><?= h($product->product_image_3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Image 4') ?></th>
            <td><?= h($product->product_image_4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Image 5') ?></th>
            <td><?= h($product->product_image_5) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Image 6') ?></th>
            <td><?= h($product->product_image_6) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Image 7') ?></th>
            <td><?= h($product->product_image_7) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $product->has('country') ? $this->Html->link($product->country->name, ['controller' => 'Countries', 'action' => 'view', $product->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Barcode') ?></th>
            <td><?= h($product->barcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Track Quantity') ?></th>
            <td><?= h($product->track_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meta Title') ?></th>
            <td><?= h($product->meta_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meta Description') ?></th>
            <td><?= h($product->meta_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($product->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hs Code') ?></th>
            <td><?= h($product->hs_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Compare Price') ?></th>
            <td><?= $this->Number->format($product->compare_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost Per Item') ?></th>
            <td><?= $this->Number->format($product->cost_per_item) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity Count') ?></th>
            <td><?= $this->Number->format($product->quantity_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight Country') ?></th>
            <td><?= $this->Number->format($product->weight_country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('New Arrivals') ?></th>
            <td><?= $this->Number->format($product->new_arrivals) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Top Trending') ?></th>
            <td><?= $this->Number->format($product->top_trending) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('On Sales') ?></th>
            <td><?= $this->Number->format($product->on_sales) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Product Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->product_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Product Features') ?></h4>
        <?= $this->Text->autoParagraph(h($product->product_features)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Product Tags') ?></h4>
        <?php if (!empty($product->product_tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Tag Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->product_tags as $productTags): ?>
            <tr>
                <td><?= h($productTags->id) ?></td>
                <td><?= h($productTags->product_id) ?></td>
                <td><?= h($productTags->tag_id) ?></td>
                <td><?= h($productTags->created) ?></td>
                <td><?= h($productTags->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductTags', 'action' => 'view', $productTags->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductTags', 'action' => 'edit', $productTags->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductTags', 'action' => 'delete', $productTags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productTags->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
