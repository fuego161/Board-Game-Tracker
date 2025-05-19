<h1>Board Games!</h1>

<table>
    <tr>
        <th>Title</th>
        <th>Publisher</th>
        <th>Player Count</th>
        <th>&nbsp;</th>
    </tr>

    <?php foreach ($boardGames as $boardGame): ?>
        <tr>
            <td>
                <?= $this->Html->link($boardGame->title, ['action' => 'view', $boardGame->slug]) ?>
            </td>
            <td>
                <?= h($boardGame->publisher); ?>
            </td>
            <td>
                <?= h($boardGame->min_players) . ' - ' . h($boardGame->max_players); ?>
            </td>
            <td>
                I Own This!
            </td>
        </tr>
    <?php endforeach; ?>

</table>
