<?php

namespace Arith;

use PHPUnit\Framework\TestCase;

class ArithTest extends TestCase
{
  /**
   * @var Arith $arith
   */
  private $arith;

  public function setup()
  {
    $this->arith = new Arith('zero');
  }

  public function testGetExpressionEvaluator()
  {
    $this->assertInstanceOf('Arith\ExpressionEvaluator', $this->arith->getExpressionEvaluator());
  }

  public function testGetCalculator()
  {
    $current = $this->arith->getCalculator();
    $this->assertInstanceOf('Arith\Calculator', $current);
  }

  public function testGetNumberToExpressionConverter()
  {
    $current = $this->arith->getNumberToExpressionConverter();
    $this->assertInstanceOf('Arith\NumberToExpressionConverter', $current);
  }

  public function testGetCurrentState()
  {
    $current = $this->arith->getCurrentState();
    $this->assertEquals('', $current);

    $this->arith->getCalculator()->setState(135);

    $current = $this->arith->getCurrentState();
    $this->assertEquals('one hundred and thirty five', $current);

    $this->arith = new Arith('twenty');
    $current = $this->arith->getCurrentState();
    $this->assertEquals('twenty', $current);
  }

  public function testAdd()
  {
    $current = $this->arith->add("one hundred and two");
    $this->assertEquals("one hundred and two", $current);

    $current = $this->arith->add("two hundred and thirteen");
    $this->assertEquals("three hundred and fifteen", $current);
  }
}
