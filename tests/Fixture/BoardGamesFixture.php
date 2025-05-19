<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BoardGamesFixture
 */
class BoardGamesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'entry_creator' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'slug' => 'Lorem ipsum dolor sit amet',
                'publisher' => 'Lorem ipsum dolor sit amet',
                'min_players' => 1,
                'max_players' => 1,
                'created' => '2025-05-19 20:35:04',
                'modified' => '2025-05-19 20:35:04',
            ],
        ];
        parent::init();
    }
}
