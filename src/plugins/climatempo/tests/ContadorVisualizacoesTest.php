<?php

use PHPUnit\Framework\TestCase;

class ContadorVisualizacoesTest extends TestCase
{
  public function testSomaSimples()
  {
    $a = 5;
    $b = 7;

    $resultado = $a + $b;

    $this->assertEquals(11, $resultado);
  }
}
