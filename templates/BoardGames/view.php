<h1><?= h($boardGame->title); ?></h1>
<h3>Published by: <?= h($boardGame->publisher); ?></h3>
<p><?= h($boardGame->category_string); ?></p>
<p>Player Count: <?= h($boardGame->min_players) . ' - ' . h($boardGame->max_players); ?></p>

<hr>
<!-- TODO: Link to a users collection -->
<!-- TODO: Only show if not within logged in users collection -->
<!-- TODO: Redirect to log in if not logged in -->
<?= $this->Html->link(
    'Add to your collection!',
    ['action' => 'add'],
    ['class' => 'button']
); ?>

<!-- TODO: Make admin only -->
<?= $this->Html->link(
    'Edit Game',
    ['action' => 'edit', $boardGame->slug],
    ['class' => 'button button-outline']
); ?>

<!-- TODO: Make admin only -->
<?= $this->Form->deleteLink(
    'Delete',
    ['action' => 'delete', $boardGame->slug],
    [
        'class' => 'button button-outline',
        'confirm' => 'Are you sure?',
    ]
); ?>
