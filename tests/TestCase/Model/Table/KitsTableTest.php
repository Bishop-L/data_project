<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KitsTable Test Case
 */
class KitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KitsTable
     */
    protected $Kits;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Kits',
        'app.Customers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Kits') ? [] : ['className' => KitsTable::class];
        $this->Kits = $this->getTableLocator()->get('Kits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Kits);

        parent::tearDown();
    }
}
