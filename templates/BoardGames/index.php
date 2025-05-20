<h1>Board Games!</h1>

<table class="board-games">

    <tr>
        <th>Title</th>
        <th>Publisher</th>
        <th>Player Count</th>
        <th>Categories</th>
        <th>&nbsp;</th>
    </tr>


    <?php foreach ($boardGames as $boardGame): ?>
        <tr>
            <td>
                <?= $this->Html->link($boardGame->title, ['action' => 'view', $boardGame->slug]); ?>
            </td>
            <td>
                <?= h($boardGame->publisher); ?>
            </td>
            <td>
                <?= h($boardGame->min_players) . ' - ' . h($boardGame->max_players); ?>
            </td>
            <td>
                <?= h($boardGame->category_string); ?>
            </td>
            <td class="collection-add-row">
                <?= $this->Html->link(
                    'Add to Collection',
                    ['action' => 'add'],
                    ['class' => 'button button-clear']
                ); ?>
            </td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <td>
            <?= $this->Html->link(
                'Add a Board Game',
                ['action' => 'add'],
                ['class' => 'button']
            ); ?>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

</table>
