<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="categories view content">
            <h3><?= h($category->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($category->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($category->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($category->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Board Games') ?></h4>
                <?php if (!empty($category->board_games)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Publisher') ?></th>
                            <th><?= __('Min Players') ?></th>
                            <th><?= __('Max Players') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->board_games as $boardGame) : ?>
                        <tr>
                            <td><?= h($boardGame->title) ?></td>
                            <td><?= h($boardGame->publisher) ?></td>
                            <td><?= h($boardGame->min_players) ?></td>
                            <td><?= h($boardGame->max_players) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'BoardGames', 'action' => 'view', $boardGame->slug]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'BoardGames', 'action' => 'edit', $boardGame->slug]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'BoardGames', 'action' => 'delete', $boardGame->slug],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $boardGame->slug),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
