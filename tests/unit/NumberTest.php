<?php

use Emuravjev\Mdash\Typograph;

class NumberTest extends TestCase
{
    /**
     * @var Typograph
     */
    protected $typographer;

    /**
     * @var array
     */
    protected $tests = [
        [
            'text' => 'Размер изделия 50х31',
            'result' => '<p>Размер изделия 50&times;31</p>',
        ],
        [
            'text' => 'Размер изделия 62x21x21',
            'result' => '<p>Размер изделия 62&times;21&times;21</p>',
        ],
        [
            'text' => 'Площадь квартиры 52 м2',
            'result' => '<p>Площадь квартиры 52&nbsp;м<sup><small>2</small></sup></p>',
        ],
        [
            'text' => 'Объем спичечного коробка 26 см3',
            'result' => '<p>Объем спичечного коробка 26&nbsp;см<sup><small>3</small></sup></p>',
        ],
        [
            'text' => 'Сегодня проходим § 5',
            'result' => '<p>Сегодня проходим &sect;&thinsp;5</p>',
        ],
        [
            'text' => 'Сегодня проходим §&nbsp;5',
            'result' => '<p>Сегодня проходим &sect;&thinsp;5</p>',
        ]
    ];
    
    protected function setUp()
    {
        parent::setUp();
        $this->typographer = new Emuravjev\Mdash\Typograph();
    }

    /**
     * Тестирует корректное добавление верхнего индекса к единицам площади/объема
     *
     * @return void
     */
    public function testSuperscriptForSquareUnits()
    {
        $this->runTypographerTests();
    }
}
