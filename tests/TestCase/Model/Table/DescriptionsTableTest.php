<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DescriptionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DescriptionsTable Test Case
 */
class DescriptionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DescriptionsTable
     */
    protected $Descriptions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Descriptions',
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
        $config = $this->getTableLocator()->exists('Descriptions') ? [] : ['className' => DescriptionsTable::class];
        $this->Descriptions = $this->getTableLocator()->get('Descriptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Descriptions);

        parent::tearDown();
    }
}
