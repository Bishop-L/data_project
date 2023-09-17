<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustomersFixture
 */
class CustomersFixture extends TestFixture
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
                'kit_id' => 1,
                'customer_name' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-09-16 00:53:51',
                'modified' => '2023-09-16 00:53:51',
            ],
        ];
        parent::init();
    }
}
