<?php
namespace DiceRoller\Tests\Calc;

use DiceRoller\Calc;

class LowestHighestTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider dataForLowestPostfix
     *
     * @param $expression
     * @param $rollsNum
     * @param $maxResults
     */
    public function testLowestPostfix($expression, $rollsNum, $maxResults)
    {
        for ($i = 0; $i < 100; $i++) {

            $calc = new Calc($expression);

            $result = $calc->calc();

            $this->assertTrue(
                is_numeric($result),
                sprintf('Calc::calc(%s) result is not numeric: %s', $expression, $result)
            );
        }
    }

    public function dataForLowestPostfix()
    {
        return array(
            array('2d20 lowest 2', 2, 2),
            array('2d20l2', 2, 2)
        );
    }

    /**
     * @dataProvider dataForHighestPostfix
     *
     * @param $expression
     * @param $rollsNum
     * @param $maxResults
     */
    public function testHighestPostfix($expression, $rollsNum, $maxResults)
    {

        for ($i = 0; $i < 100; $i++) {

            $calc = new Calc($expression);

            $result = $calc->calc();

            $this->assertTrue(
                is_numeric($result),
                sprintf('Calc::calc(%s) result is not numeric: %s', $expression, $result)
            );
        }
    }

    public function dataForHighestPostfix()
    {
        return array(
            array('4d6 highest 3', 4, 1, 3),
            array('4d6h3', 4, 1, 3)
        );
    }
}
