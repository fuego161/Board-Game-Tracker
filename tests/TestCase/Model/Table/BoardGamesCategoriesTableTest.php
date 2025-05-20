<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BoardGamesCategoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BoardGamesCategoriesTable Test Case
 */
class BoardGamesCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BoardGamesCategoriesTable
     */
    protected $BoardGamesCategories;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.BoardGamesCategories',
        'app.BoardGames',
        'app.Categories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BoardGamesCategories') ? [] : ['className' => BoardGamesCategoriesTable::class];
        $this->BoardGamesCategories = $this->getTableLocator()->get('BoardGamesCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BoardGamesCategories);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BoardGamesCategoriesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
