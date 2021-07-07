<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HomepageBannersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HomepageBannersTable Test Case
 */
class HomepageBannersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HomepageBannersTable
     */
    public $HomepageBanners;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.HomepageBanners',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('HomepageBanners') ? [] : ['className' => HomepageBannersTable::class];
        $this->HomepageBanners = TableRegistry::getTableLocator()->get('HomepageBanners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HomepageBanners);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
