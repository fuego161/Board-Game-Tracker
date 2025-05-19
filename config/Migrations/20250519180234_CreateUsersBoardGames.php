<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class CreateUsersBoardGames extends BaseMigration
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
        $table = $this->table('users_board_games', ['id' => false, 'primary_key' => ['user_id', 'board_game_id']]);
        $table->addColumn('user_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('board_game_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('rating', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('favourite', 'boolean', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('status', 'enum', [
            'values' => ['Own', 'Previously Owned', 'Want to Play', 'Want to Buy'],
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('notes', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);
        $table->addForeignKey('board_game_id', 'board_games', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);
        $table->create();
    }
}
