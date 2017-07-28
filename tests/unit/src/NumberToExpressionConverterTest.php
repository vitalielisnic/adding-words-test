<?php

namespace Arith;

use PHPUnit\Framework\TestCase;

class NumberToExpressionConverterTest extends TestCase
{
  /**
   * @var NumberToExpressionConverter $converter
   */
  private $converter;

  public function setUp()
  {
    $this->converter = new NumberToExpressionConverter();
  }

  public function testGetOnesMap()
  {
    $current = $this->converter->getOnesMap();
    $expected = [
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
    $this->assertEquals($expected, $current);
  }

  public function testThousandsConversionToString()
  {
    $current = $this->converter->convertThousandsToString(0);
    $this->assertEquals('', $current);

    $current = $this->converter->convertThousandsToString(10);
    $this->assertEquals('', $current);

    $current = $this->converter->convertThousandsToString(200);
    $this->assertEquals('', $current);

    $current = $this->converter->convertThousandsToString(550);
    $this->assertEquals('', $current);

    $current = $this->converter->convertThousandsToString(1000);
    $this->assertEquals('one thousand', $current);

    $current = $this->converter->convertThousandsToString(2220);
    $this->assertEquals('two thousand', $current);
  }

  public function testHundredsConversionToString()
  {
    $current = $this->converter->convertHundredsToString(0);
    $this->assertEquals('', $current);

    $current = $this->converter->convertHundredsToString(1);
    $this->assertEquals('', $current);

    $current = $this->converter->convertHundredsToString(13);
    $this->assertEquals('', $current);

    $current = $this->converter->convertHundredsToString(101);
    $this->assertEquals('one hundred', $current);

    $current = $this->converter->convertHundredsToString(201);
    $this->assertEquals('two hundred', $current);

    $current = $this->converter->convertHundredsToString(301);
    $this->assertEquals('three hundred', $current);

    $current = $this->converter->convertHundredsToString(401);
    $this->assertEquals('four hundred', $current);

    $current = $this->converter->convertHundredsToString(501);
    $this->assertEquals('five hundred', $current);

    $current = $this->converter->convertHundredsToString(601);
    $this->assertEquals('six hundred', $current);

    $current = $this->converter->convertHundredsToString(701);
    $this->assertEquals('seven hundred', $current);

    $current = $this->converter->convertHundredsToString(801);
    $this->assertEquals('eight hundred', $current);

    $current = $this->converter->convertHundredsToString(901);
    $this->assertEquals('nine hundred', $current);
  }

  public function testGetTensMap()
  {
    $current = $this->converter->getTensMap();
    $expected = [
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
    $this->assertEquals($expected, $current);
  }

  public function testTensConversionToString()
  {
    $current = $this->converter->convertTensToString(0);
    $this->assertEquals('', $current);

    $current = $this->converter->convertTensToString(1);
    $this->assertEquals('', $current);

    $current = $this->converter->convertTensToString(300);
    $this->assertEquals('', $current);

    $current = $this->converter->convertTensToString(10);
    $this->assertEquals('ten', $current);

    $current = $this->converter->convertTensToString(11);
    $this->assertEquals('eleven', $current);

    $current = $this->converter->convertTensToString(12);
    $this->assertEquals('twelve', $current);

    $current = $this->converter->convertTensToString(13);
    $this->assertEquals('thirteen', $current);

    $current = $this->converter->convertTensToString(14);
    $this->assertEquals('fourteen', $current);

    $current = $this->converter->convertTensToString(15);
    $this->assertEquals('fifteen', $current);

    $current = $this->converter->convertTensToString(16);
    $this->assertEquals('sixteen', $current);

    $current = $this->converter->convertTensToString(17);
    $this->assertEquals('seventeen', $current);

    $current = $this->converter->convertTensToString(18);
    $this->assertEquals('eighteen', $current);

    $current = $this->converter->convertTensToString(19);
    $this->assertEquals('nineteen', $current);

    $current = $this->converter->convertTensToString(21);
    $this->assertEquals('twenty', $current);

    $current = $this->converter->convertTensToString(31);
    $this->assertEquals('thirty', $current);

    $current = $this->converter->convertTensToString(41);
    $this->assertEquals('forty', $current);

    $current = $this->converter->convertTensToString(51);
    $this->assertEquals('fifty', $current);

    $current = $this->converter->convertTensToString(61);
    $this->assertEquals('sixty', $current);

    $current = $this->converter->convertTensToString(71);
    $this->assertEquals('seventy', $current);

    $current = $this->converter->convertTensToString(81);
    $this->assertEquals('eighty', $current);

    $current = $this->converter->convertTensToString(91);
    $this->assertEquals('ninety', $current);

    $current = $this->converter->convertTensToString(111);
    $this->assertEquals('eleven', $current);

    $current = $this->converter->convertTensToString(541);
    $this->assertEquals('forty', $current);
  }

  public function testOnesConversionToString()
  {
    $current = $this->converter->convertOnesToString(0);
    $this->assertEquals('', $current);

    $current = $this->converter->convertOnesToString(1);
    $this->assertEquals('one', $current);

    $current = $this->converter->convertOnesToString(2);
    $this->assertEquals('two', $current);

    $current = $this->converter->convertOnesToString(3);
    $this->assertEquals('three', $current);

    $current = $this->converter->convertOnesToString(4);
    $this->assertEquals('four', $current);

    $current = $this->converter->convertOnesToString(5);
    $this->assertEquals('five', $current);

    $current = $this->converter->convertOnesToString(6);
    $this->assertEquals('six', $current);

    $current = $this->converter->convertOnesToString(7);
    $this->assertEquals('seven', $current);

    $current = $this->converter->convertOnesToString(8);
    $this->assertEquals('eight', $current);

    $current = $this->converter->convertOnesToString(9);
    $this->assertEquals('nine', $current);

    $current = $this->converter->convertOnesToString(10);
    $this->assertEquals('', $current);

    $current = $this->converter->convertOnesToString(12);
    $this->assertEquals('', $current);

    $current = $this->converter->convertOnesToString(35);
    $this->assertEquals('five', $current);

    $current = $this->converter->convertOnesToString(576);
    $this->assertEquals('six', $current);
  }

  public function testConvertNumberToString()
  {
    $current = $this->converter->convertNumberToString(0);
    $this->assertEquals('', $current);

    $current = $this->converter->convertNumberToString(1);
    $this->assertEquals('one', $current);

    $current = $this->converter->convertNumberToString(2);
    $this->assertEquals('two', $current);

    $current = $this->converter->convertNumberToString(10);
    $this->assertEquals('ten', $current);

    $current = $this->converter->convertNumberToString(12);
    $this->assertEquals('twelve', $current);

    $current = $this->converter->convertNumberToString(300);
    $this->assertEquals('three hundred', $current);

    $current = $this->converter->convertNumberToString(313);
    $this->assertEquals('three hundred and thirteen', $current);

    $current = $this->converter->convertNumberToString(561);
    $this->assertEquals('five hundred and sixty one', $current);

    $current = $this->converter->convertNumberToString(3561);
    $this->assertEquals('three thousand five hundred and sixty one', $current);
  }
}
