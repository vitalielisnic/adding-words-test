<?php

namespace Arith;

class NumberToExpressionConverter
{
  /**
   * @var array $ones_map
   */
  private $ones_map = [
    1 => 'one',
    2 => 'two',
    3 => 'three',
    4 => 'four',
    5 => 'five',
    6 => 'six',
    7 => 'seven',
    8 => 'eight',
    9 => 'nine',
  ];

  /**
   * @var array $tens_map
   */
  private $tens_map = [
    10 => 'ten',
    11 => 'eleven',
    12 => 'twelve',
    13 => 'thirteen',
    14 => 'fourteen',
    15 => 'fifteen',
    16 => 'sixteen',
    17 => 'seventeen',
    18 => 'eighteen',
    19 => 'nineteen',
    20 => 'twenty',
    30 => 'thirty',
    40 => 'forty',
    50 => 'fifty',
    60 => 'sixty',
    70 => 'seventy',
    80 => 'eighty',
    90 => 'ninety',
  ];

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
  public function getTensMap()
  {
    return $this->tens_map;
  }

  public function convertThousandsToString($number)
  {
    $result = '';
    $thousands = floor($number / 1000);
    if ($thousands > 0) {
      $ones_map = $this->getOnesMap();
      $result = sprintf('%s thousand', $ones_map[$thousands]);
    }

    return $result;
  }

  /**
   * @param $number
   * @return string
   */
  public function convertHundredsToString($number)
  {
    $result = '';
    $thousands = floor($number / 1000) * 1000;
    $hundreds = floor(($number - $thousands) / 100);
    if ($hundreds > 0) {
      $ones_map = $this->getOnesMap();
      $result = sprintf('%s hundred', $ones_map[$hundreds]);
    }

    return $result;
  }

  /**
   * @param $number
   * @return string
   */
  public function convertTensToString($number)
  {
    $result = '';
    $thousands = floor($number / 1000) * 1000;
    $hundreds = floor(($number - $thousands) / 100) * 100;
    $tens = $number - $thousands - $hundreds;

    if ($tens > 20 || $tens < 10) {
      $tens = floor($tens / 10) * 10;
    }

    if ($tens > 0) {
      $tens_map = $this->getTensMap();
      $result = $tens_map[$tens];
    }

    return $result;
  }

  /**
   * @param $number
   * @return string
   */
  public function convertOnesToString($number)
  {
    $result = '';
    $thousands = floor($number / 1000) * 1000;
    $hundreds = floor(($number - $thousands) / 100) * 100;
    $tens = floor(($number - $thousands - $hundreds) / 10) * 10;
    $ones = $number - $thousands - $hundreds - $tens;

    if ($ones > 0 && ($tens >= 20 || $tens == 0)) {
      $ones_map = $this->getOnesMap();
      $result = $ones_map[$ones];
    }

    return $result;
  }

  /**
   * @param $number
   * @return string
   */
  public function convertNumberToString($number)
  {
    $thousands = $this->convertThousandsToString($number);
    $hundreds = $this->convertHundredsToString($number);
    $tens = $this->convertTensToString($number);
    $ones = $this->convertOnesToString($number);

    $result = [];

    if ($thousands != '') {
      $result[] = $thousands;
    }

    if ($hundreds != '') {
      $result[] = $hundreds;
      if ($ones != '' || $tens != '') {
        $result[] = 'and';
      }
    }

    if ($tens != '') {
      $result[] = $tens;
    }

    if ($ones != '') {
      $result[] = $ones;
    }

    $result = implode(' ', $result);

    return $result;
  }
}
