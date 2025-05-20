<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersBoardGamesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersBoardGamesTable Test Case
 */
class UsersBoardGamesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersBoardGamesTable
     */
    protected $UsersBoardGames;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.UsersBoardGames',
        'app.Users',
        'app.BoardGames',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UsersBoardGames') ? [] : ['className' => UsersBoardGamesTable::class];
        $this->UsersBoardGames = $this->getTableLocator()->get('UsersBoardGames', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UsersBoardGames);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsersBoardGamesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsersBoardGamesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
