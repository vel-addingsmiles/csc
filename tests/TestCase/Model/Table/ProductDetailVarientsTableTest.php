<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductDetailVarientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductDetailVarientsTable Test Case
 */
class ProductDetailVarientsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductDetailVarientsTable
     */
    public $ProductDetailVarients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductDetailVarients',
        'app.ProductVarients',
        'app.ProductSubVarients',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductDetailVarients') ? [] : ['className' => ProductDetailVarientsTable::class];
        $this->ProductDetailVarients = TableRegistry::getTableLocator()->get('ProductDetailVarients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductDetailVarients);

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
