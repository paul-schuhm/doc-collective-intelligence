<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

require __DIR__ . '/../helpers.php';
require __DIR__ . '/../data.php';

final class Test extends TestCase
{

    /**
     * Precision sur les nombres flottants
     */
    public const EPSILON = 0.00001;

    #[TestDox('Calcul moyenne d\'une série vide')]
    public function testMeanOfEmptySet(): void
    {
        $this->assertEquals(NULL, mean(array()));
    }
    #[TestDox('Calcul moyenne d\'une série simple')]
    public function testMeanSimpleSeries(): void
    {
        $series = array(1, 2, 3, 4, 5);
        $this->assertEquals(3, mean($series));
    }
    #[TestDox('Calcul variance d\'une série vide')]
    public function testVarianceOfEmptySet(): void
    {
        $this->assertEquals(NULL, variance(array()));
    }
    #[TestDox('Calcul variance d\'une série simple')]
    public function testVarianceSimpleSeries(): void
    {
        $series = array(1, 1, 1, 1, 1);
        $this->assertEqualsWithDelta(0, variance($series), self::EPSILON);
    }
    #[TestDox('Calcul variance d\'une série quelconque')]
    public function testVarianceRandomSeries(): void
    {
        $series = array(2, 7, 3, 12, 9);
        $this->assertEqualsWithDelta(13.84, variance($series),  self::EPSILON);
    }
}
