<h1>Add a Board Game</h1>

<?php
echo $this->Form->create($boardGame);
echo $this->Form->control('title');
echo $this->Form->control('publisher');
echo $this->Form->control('min_players', ['type' => 'number', 'min' => 1, 'max' => 100, 'step' => 1]);
echo $this->Form->control('max_players', ['type' => 'number', 'min' => 1, 'max' => 100, 'step' => 1]);
echo $this->Form->control('categories._ids', ['options' => $categories]);
echo $this->Form->button(__('Add Board Game'));
echo $this->Form->end();
?>
