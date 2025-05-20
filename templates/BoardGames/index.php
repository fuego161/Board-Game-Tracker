<div class="board-games index content">

    <?= $this->Html->link(__('Add New Board Game'), ['action' => 'add'], ['class' => 'button float-right']) ?>

    <h3><?= __('Board Games') ?></h3>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th>Publisher</th>
                    <th>Player Count</th>
                    <th>Categories</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($boardGames as $boardGame): ?>
                <tr>
                    <td>
                        <?= $this->Html->link(h($boardGame->title), ['action' => 'view', $boardGame->slug]); ?>
                    </td>
                    <td>
                        <?= h($boardGame->publisher); ?>
                    </td>
                    <td>
                        <?=
                            $boardGame->min_players === $boardGame->max_players ?
                            h($boardGame->min_players) :
                            h($boardGame->min_players) . ' - ' . h($boardGame->max_players); ?>
                    </td>
                    <td>
                        <?= h($boardGame->category_string); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>

</div>
