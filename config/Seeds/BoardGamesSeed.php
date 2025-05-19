<?php

declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * BoardGames seed.
 */
class BoardGamesSeed extends BaseSeed
{
    public function getDependencies(): array
    {
        return [
            'UsersSeed',
        ];
    }

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'entry_creator' => 1,
                'title' => 'Brass: Birmingham',
                'slug' => 'brass-birmingham',
                'publisher' => 'Roxley',
                'min_players' => 2,
                'max_players' => 4,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'entry_creator' => 1,
                'title' => 'Clank! In! Space!',
                'slug' => 'clank-in-space',
                'publisher' => 'Dire Wolf',
                'min_players' => 2,
                'max_players' => 4,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'entry_creator' => 1,
                'title' => 'Dune: Imperium',
                'slug' => 'dune-imperium',
                'publisher' => 'Dire Wolf',
                'min_players' => 1,
                'max_players' => 4,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'entry_creator' => 1,
                'title' => 'On Mars',
                'slug' => 'on-mars',
                'publisher' => 'Eagle-Gryphon Games',
                'min_players' => 1,
                'max_players' => 4,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'entry_creator' => 1,
                'title' => 'Love Letter',
                'slug' => 'love-letter',
                'publisher' => 'Z-Man Games',
                'min_players' => 2,
                'max_players' => 6,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'entry_creator' => 1,
                'title' => 'Food Chain Magnate',
                'slug' => 'food-chain-magnate',
                'publisher' => 'Splotter Spellen',
                'min_players' => 2,
                'max_players' => 5,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('board_games');
        $table->insert($data)->save();
    }
}
