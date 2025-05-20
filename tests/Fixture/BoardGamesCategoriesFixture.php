<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BoardGamesCategoriesFixture
 */
class BoardGamesCategoriesFixture extends TestFixture
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
                'board_game_id' => 1,
                'category_id' => 1,
            ],
        ];
        parent::init();
    }
}
