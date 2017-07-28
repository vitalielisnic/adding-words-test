<?php

namespace Arith;

use PHPUnit\Framework\TestCase;

class ExpressionEvaluatorTest extends TestCase
{
  /**
   * @var ExpressionEvaluator $expression_evaluator
   */
  private $expression_evaluator;

  public function setup()
  {
    $this->expression_evaluator = new ExpressionEvaluator();
  }

  public function testTokenization()
  {
    $current = $this->expression_evaluator->tokenize('three hundred and forty three');
    $expected = ['three', 'hundred', 'and', 'forty', 'three'];
    $this->assertEquals($expected, $current);
  }

  public function testTokenSanitization()
  {
    $current = $this->expression_evaluator->sanitizeTokens(['three', 'hundred', 'and', 'forty', 'three']);
    $expected = ['three', 'hundred', 'forty', 'three'];
    $this->assertEquals($expected, $current);
  }

  public function testGetExtraneousTokens()
  {
    $current = $this->expression_evaluator->getExtraneousTokens();
    $expected = ['and'];
    $this->assertEquals($expected, $current);
  }

  public function testGetOnesMap()
  {
    $current = $this->expression_evaluator->getOnesMap();
    $expected = [
      'zero'  => 0,
      'one'   => 1,
      'two'   => 2,
      'three' => 3,
      'four'  => 4,
      'five'  => 5,
      'six'   => 6,
      'seven' => 7,
      'eight' => 8,
      'nine'  => 9
    ];
    $this->assertEquals($expected, $current);
  }

  public function testGetTensMap()
  {
    $current = $this->expression_evaluator->getTensMap();
    $expected = [
      'ten'       => 10,
      'eleven'    => 11,
      'twelve'    => 12,
      'thirteen'  => 13,
      'fourteen'  => 14,
      'fifteen'   => 15,
      'sixteen'   => 16,
      'seventeen' => 17,
      'eighteen'  => 18,
      'nineteen'  => 19,
      'twenty'    => 20,
      'thirty'    => 30,
      'forty'     => 40,
      'fifty'     => 50,
      'sixty'     => 60,
      'seventy'   => 70,
      'eighty'    => 80,
      'ninety'    => 90,
    ];
    $this->assertEquals($expected, $current);
  }

  public function testEvaluateHundreds()
  {
    $current = $this->expression_evaluator->evaluateHundreds(['seventeen']);
    $this->assertEquals(0, $current);

    $current = $this->expression_evaluator->evaluateHundreds(['one', 'hundred']);
    $this->assertEquals(100, $current);

    $current = $this->expression_evaluator->evaluateHundreds(['two', 'hundreds']);
    $this->assertEquals(200, $current);

    $current = $this->expression_evaluator->evaluateHundreds(['three', 'hundreds']);
    $this->assertEquals(300, $current);

    $current = $this->expression_evaluator->evaluateHundreds(['four', 'hundreds']);
    $this->assertEquals(400, $current);

    $current = $this->expression_evaluator->evaluateHundreds(['five', 'hundreds']);
    $this->assertEquals(500, $current);

    $current = $this->expression_evaluator->evaluateHundreds(['six', 'hundreds']);
    $this->assertEquals(600, $current);

    $current = $this->expression_evaluator->evaluateHundreds(['seven', 'hundreds']);
    $this->assertEquals(700, $current);

    $current = $this->expression_evaluator->evaluateHundreds(['eight', 'hundreds']);
    $this->assertEquals(800, $current);

    $current = $this->expression_evaluator->evaluateHundreds(['nine', 'hundreds']);
    $this->assertEquals(900, $current);
  }

  public function testEvaluateTens()
  {
    $current = $this->expression_evaluator->evaluateTens(['one', 'hundred']);
    $this->assertEquals(0, $current);

    $current = $this->expression_evaluator->evaluateTens(['ten']);
    $this->assertEquals(10, $current);

    $current = $this->expression_evaluator->evaluateTens(['eleven']);
    $this->assertEquals(11, $current);

    $current = $this->expression_evaluator->evaluateTens(['twelve']);
    $this->assertEquals(12, $current);

    $current = $this->expression_evaluator->evaluateTens(['thirteen']);
    $this->assertEquals(13, $current);

    $current = $this->expression_evaluator->evaluateTens(['fourteen']);
    $this->assertEquals(14, $current);

    $current = $this->expression_evaluator->evaluateTens(['fifteen']);
    $this->assertEquals(15, $current);

    $current = $this->expression_evaluator->evaluateTens(['sixteen']);
    $this->assertEquals(16, $current);

    $current = $this->expression_evaluator->evaluateTens(['seventeen']);
    $this->assertEquals(17, $current);

    $current = $this->expression_evaluator->evaluateTens(['eighteen']);
    $this->assertEquals(18, $current);

    $current = $this->expression_evaluator->evaluateTens(['nineteen']);
    $this->assertEquals(19, $current);

    $current = $this->expression_evaluator->evaluateTens(['twenty']);
    $this->assertEquals(20, $current);

    $current = $this->expression_evaluator->evaluateTens(['thirty']);
    $this->assertEquals(30, $current);

    $current = $this->expression_evaluator->evaluateTens(['forty']);
    $this->assertEquals(40, $current);

    $current = $this->expression_evaluator->evaluateTens(['fifty']);
    $this->assertEquals(50, $current);

    $current = $this->expression_evaluator->evaluateTens(['sixty']);
    $this->assertEquals(60, $current);

    $current = $this->expression_evaluator->evaluateTens(['seventy']);
    $this->assertEquals(70, $current);

    $current = $this->expression_evaluator->evaluateTens(['eighty']);
    $this->assertEquals(80, $current);

    $current = $this->expression_evaluator->evaluateTens(['ninety']);
    $this->assertEquals(90, $current);
  }

  public function testEvaluateOnes()
  {
    $current = $this->expression_evaluator->evaluateOnes(['one', 'hundred']);
    $this->assertEquals(0, $current);

    $current = $this->expression_evaluator->evaluateOnes(['one', 'hundred', 'one']);
    $this->assertEquals(1, $current);

    $current = $this->expression_evaluator->evaluateOnes(['one', 'hundred', 'two']);
    $this->assertEquals(2, $current);

    $current = $this->expression_evaluator->evaluateOnes(['one', 'hundred', 'three']);
    $this->assertEquals(3, $current);

    $current = $this->expression_evaluator->evaluateOnes(['one', 'hundred', 'four']);
    $this->assertEquals(4, $current);

    $current = $this->expression_evaluator->evaluateOnes(['one', 'hundred', 'five']);
    $this->assertEquals(5, $current);

    $current = $this->expression_evaluator->evaluateOnes(['one', 'hundred', 'six']);
    $this->assertEquals(6, $current);

    $current = $this->expression_evaluator->evaluateOnes(['one', 'hundred', 'seven']);
    $this->assertEquals(7, $current);

    $current = $this->expression_evaluator->evaluateOnes(['one', 'hundred', 'eight']);
    $this->assertEquals(8, $current);

    $current = $this->expression_evaluator->evaluateOnes(['one', 'hundred', 'nine']);
    $this->assertEquals(9, $current);
  }

  public function testEvaluation()
  {
    $current = $this->expression_evaluator->evaluate('two hundred and twenty two');
    $this->assertEquals(222, $current);

    $current = $this->expression_evaluator->evaluate('three hundreds and forty five');
    $this->assertEquals(345, $current);
  }
}
