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
   * Arith constructor.
   */
  public function __construct($init_value = "zero")
  {
    $this->expression_evaluator = new ExpressionEvaluator();
    $this->number_to_expression_converter = new NumberToExpressionConverter();
  }

  /**
   * @return ExpressionEvaluator
   */
  public function getExpressionEvaluator()
  {
    return $this->expression_evaluator;
  }

  /**
   * @return NumberToExpressionConverter
   */
  public function getNumberToExpressionConverter()
  {
    return $this->number_to_expression_converter;
  }

  /**
   * @param string $expression
   * @return string
   */
  public function add($expression)
  {
    $calculator = new Calculator();
    $number_to_expression_converter = $this->getNumberToExpressionConverter();
    $expression_evaluator = $this->getExpressionEvaluator();
    $number_to_add = $expression_evaluator->evaluate($expression);
    $calculator_state = $calculator->add($number_to_add);

    return $number_to_expression_converter->convertNumberToString($calculator_state);
  }
}
