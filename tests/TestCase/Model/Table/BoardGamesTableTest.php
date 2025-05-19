<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BoardGamesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BoardGamesTable Test Case
 */
class BoardGamesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BoardGamesTable
     */
    protected $BoardGames;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.BoardGames',
        'app.Categories',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BoardGames') ? [] : ['className' => BoardGamesTable::class];
        $this->BoardGames = $this->getTableLocator()->get('BoardGames', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BoardGames);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BoardGamesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BoardGamesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
