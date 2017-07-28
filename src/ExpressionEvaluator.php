<?php

namespace Arith;

class ExpressionEvaluator
{
  const HUNDRED_REGEXP = '/hundred.*/';

  /**
   * @var array $extraneous_tokens
   */
  private $extraneous_tokens = ['and'];

  /**
   * @var array $ones_map
   */
  private $ones_map = [
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

  /**
   * @var array $tens_map
   */
  private $tens_map = [
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

  /**
   * @param string $input
   * @return array
   */
  public function tokenize($input)
  {
    return explode(' ', $input);
  }

  /**
   * @param array $tokens
   * @return array
   */
  public function sanitizeTokens($tokens)
  {
    $extraneous_tokens = $this->getExtraneousTokens();

    return array_values(array_diff($tokens, $extraneous_tokens));
  }

  /**
   * @return array
   */
  public function getOnesMap()
  {
    return $this->ones_map;
  }

  /**
   * @return array
   */
  public function getExtraneousTokens()
  {
    return $this->extraneous_tokens;
  }

  /**
   * @return array
   */
  public function getTensMap()
  {
    return $this->tens_map;
  }

  /**
   * @param array $tokens
   * @return int
   */
  public function evaluateHundreds($tokens)
  {
    $result = 0;
    $search_result = preg_grep(self::HUNDRED_REGEXP, $tokens);
    if (count($search_result)) {
      $ones_map = $this->getOnesMap();
      $hundred_expression = $tokens[0];
      if (isset($ones_map[$hundred_expression])) {
        $result = $ones_map[$hundred_expression] * 100;
      }
    }

    return $result;
  }

  /**
   * @param array $tokens
   * @return int
   */
  public function evaluateTens($tokens)
  {
    $result = 0;
    $tens_map = $this->getTensMap();
    foreach ($tens_map as $ten_item => $ten_item_value) {
      foreach ($tokens as $token) {
        if ($ten_item == $token) {
          $result = $ten_item_value;
          break 2;
        }
      }
    }

    return $result;
  }

  /**
   * @param array $tokens
   * @return int
   */
  public function evaluateOnes($tokens)
  {
    $result = 0;
    $ones_map = $this->getOnesMap();
    $last_token = end($tokens);
    if (isset($ones_map[$last_token])) {
      $result = $ones_map[$last_token];
    }

    return $result;
  }

  /**
   * @param string $expression
   * @return int
   */
  public function evaluate($expression)
  {
    $calculator = new Calculator(0);
    $tokens = $this->tokenize($expression);
    $tokens = $this->sanitizeTokens($tokens);
    $ones = $this->evaluateOnes($tokens);
    $tens = $this->evaluateTens($tokens);
    $hundreds = $this->evaluateHundreds($tokens);
    $calculator->add($ones);
    $calculator->add($tens);
    $calculator->add($hundreds);

    return $calculator->getState();
  }
}
