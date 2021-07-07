<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductSubCategoryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductSubCategoryTable Test Case
 */
class ProductSubCategoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductSubCategoryTable
     */
    public $ProductSubCategory;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductSubCategory',
        'app.ProductCategories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductSubCategory') ? [] : ['className' => ProductSubCategoryTable::class];
        $this->ProductSubCategory = TableRegistry::getTableLocator()->get('ProductSubCategory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductSubCategory);

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
