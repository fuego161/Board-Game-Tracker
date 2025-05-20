<div class="row">

    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Board Game'), ['action' => 'edit', $boardGame->slug], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Board Game'), ['action' => 'delete', $boardGame->slug], ['confirm' => __('Are you sure you want to delete # {0}?', $boardGame->slug), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Add New Board Game'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('See All Board Games'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>

    <div class="column column-80">
        <div class="board-games view content">

            <?= $this->Html->link(__('Add To Collection'), ['action' => '#'], ['class' => 'button float-right']) ?>

            <h3><?= h($boardGame->title) ?></h3>

            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($boardGame->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Publisher') ?></th>
                    <td><?= h($boardGame->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Player Count') ?></th>
                    <td><?=
                            $boardGame->min_players === $boardGame->max_players ?
                            h($boardGame->min_players) :
                            h($boardGame->min_players) . ' - ' . h($boardGame->max_players); ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($boardGame->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($boardGame->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

