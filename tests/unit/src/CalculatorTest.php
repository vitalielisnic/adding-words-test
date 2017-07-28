<?php

namespace Arith;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
  /**
   * @var $calculator Calculator
   */
  private $calculator;

  public function setUp()
  {
    $this->calculator = new Calculator(10);
  }

  public function testStateGetter()
  {
    $this->assertEquals(10, $this->calculator->getState());
  }

  public function testStateSetter()
  {
    $this->calculator->setState(21);
    $this->assertEquals(21, $this->calculator->getState());
  }

  public function testAddOperation()
  {
    $current_result = $this->calculator->add(15);
    $current_state = $this->calculator->getState();

    $this->assertEquals(25, $current_result);
    $this->assertEquals(25, $current_state);

    $current_result = $this->calculator->add(2);
    $current_state = $this->calculator->getState();

    $this->assertEquals(27, $current_result);
    $this->assertEquals(27, $current_state);
  }
}
