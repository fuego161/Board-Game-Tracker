<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class CreateBoardGamesCategories extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('board_games_categories', ['id' => false, 'primary_key' => ['board_game_id', 'category_id']]);
        $table->addColumn('board_game_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('category_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('category_id', 'categories', 'id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION']);
        $table->addForeignKey('board_game_id', 'board_games', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);
        $table->create();
    }
}
