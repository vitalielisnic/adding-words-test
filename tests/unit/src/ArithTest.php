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
    $this->arith = new Arith('five hundred and twelve');
  }

  public function testGetExpressionEvaluator()
  {
    $this->assertInstanceOf('Arith\ExpressionEvaluator', $this->arith->getExpressionEvaluator());
  }

  public function testGetNumberToExpressionConverter()
  {
    $current = $this->arith->getNumberToExpressionConverter();
    $this->assertInstanceOf('Arith\NumberToExpressionConverter', $current);
  }

  public function testAdd()
  {
    $current = $this->arith->add("one hundred and two");
    $this->assertEquals("six hundred and fourteen", $current);

    $current = $this->arith->add("two hundred and thirteen");
    $this->assertEquals("seven hundred and twenty five", $current);
  }

  public function testGetInitValue()
  {
    $current = $this->arith->getInitValue();
    $this->assertEquals(512, $current);
  }
}
