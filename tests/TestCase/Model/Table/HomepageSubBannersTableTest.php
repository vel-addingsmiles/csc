<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HomepageSubBannersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HomepageSubBannersTable Test Case
 */
class HomepageSubBannersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HomepageSubBannersTable
     */
    public $HomepageSubBanners;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.HomepageSubBanners',
        'app.ProductSubCategories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('HomepageSubBanners') ? [] : ['className' => HomepageSubBannersTable::class];
        $this->HomepageSubBanners = TableRegistry::getTableLocator()->get('HomepageSubBanners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HomepageSubBanners);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
