<?php

namespace Arith;

class Arith
{
  /**
   * @var ExpressionEvaluator $expression_evaluator
   */
  private $expression_evaluator;

  /**
   * @var NumberToExpressionConverter $number_to_expression_converter
   */
  private $number_to_expression_converter;

  /**
   * @var Calculator $calculator
   */
  private $calculator;

  /**
   * Arith constructor.
   */
  public function __construct($init_value = "zero")
  {
    $this->expression_evaluator = new ExpressionEvaluator();
    $this->number_to_expression_converter = new NumberToExpressionConverter();
    $this->calculator = new Calculator();
    $this->add($init_value);
  }

  /**
   * @return ExpressionEvaluator
   */
  public function getExpressionEvaluator()
  {
    return $this->expression_evaluator;
  }

  /**
   * @return Calculator
   */
  public function getCalculator()
  {
    return $this->calculator;
  }

  /**
   * @return NumberToExpressionConverter
   */
  public function getNumberToExpressionConverter()
  {
    return $this->number_to_expression_converter;
  }

  /**
   * @return array|string
   */
  public function getCurrentState()
  {
    $calculator = $this->getCalculator();
    $number_to_expression_converter = $this->getNumberToExpressionConverter();
    $calculator_state = $calculator->getState();

    return $number_to_expression_converter->convertNumberToString($calculator_state);
  }

  /**
   * @param string $expression
   * @return string
   */
  public function add($expression)
  {
    $calculator = $this->getCalculator();
    $number_to_expression_converter = $this->getNumberToExpressionConverter();
    $expression_evaluator = $this->getExpressionEvaluator();
    $number_to_add = $expression_evaluator->evaluate($expression);
    $calculator_state = $calculator->add($number_to_add);

    return $number_to_expression_converter->convertNumberToString($calculator_state);
  }
}
