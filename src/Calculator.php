<?php

namespace Arith;

class Calculator
{
  /**
   * @var int $state
   */
  private $state;

  /**
   * Calculator constructor.
   *
   * @param int $init_state
   */
  public function __construct($init_state = 0)
  {
    $this->state = $init_state;
  }

  /**
   * @return int
   */
  public function getState()
  {
    return $this->state;
  }

  /**
   * @param int $new_state
   */
  public function setState($new_state)
  {
    $this->state = $new_state;
  }

  /**
   * @param int $number
   * @return int
   */
  public function add($number)
  {
    $current_state = $this->getState();
    $current_state += $number;
    $this->setState($current_state);

    return $this->getState();
  }
}
