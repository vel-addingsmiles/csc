<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HomepageBanner $homepageBanner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Homepage Banner'), ['action' => 'edit', $homepageBanner->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Homepage Banner'), ['action' => 'delete', $homepageBanner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $homepageBanner->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Homepage Banners'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Homepage Banner'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="homepageBanners view large-9 medium-8 columns content">
    <h3><?= h($homepageBanner->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($homepageBanner->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Title') ?></th>
            <td><?= h($homepageBanner->sub_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($homepageBanner->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($homepageBanner->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($homepageBanner->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($homepageBanner->modified) ?></td>
        </tr>
    </table>
</div>
