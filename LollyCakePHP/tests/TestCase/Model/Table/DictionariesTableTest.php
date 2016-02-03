<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DictionariesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DictionariesTable Test Case
 */
class DictionariesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DictionariesTable
     */
    public $Dictionaries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dictionaries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Dictionaries') ? [] : ['className' => 'App\Model\Table\DictionariesTable'];
        $this->Dictionaries = TableRegistry::get('Dictionaries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dictionaries);

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
