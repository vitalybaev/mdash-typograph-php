<?php
use Emuravjev\Mdash\Typograph;

/**
 * Base class for all tests.
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Массив тестов вида ['text' => 'Text to test', 'result' => 'Expected result']
     *
     * @var array
     */
    protected $tests;

    /**
     * @var Typograph
     */
    protected $typographer;

    /**
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();
        $this->typographer = new Emuravjev\Mdash\Typograph();
    }

    /**
     * Запускает тесты.
     *
     * @return void
     */
    protected function runTypographerTests()
    {
        foreach ($this->tests as $test) {
            $this->typographer->set_text($test['text']);
            $this->assertEquals($test['result'], $this->typographer->apply());
        }
    }
}
