<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * KitsFixture
 */
class KitsFixture extends TestFixture
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
                'kit_id' => 'Lorem ipsum dolor ',
                'created' => '2023-09-16 00:53:56',
                'modified' => '2023-09-16 00:53:56',
            ],
        ];
        parent::init();
    }
}
