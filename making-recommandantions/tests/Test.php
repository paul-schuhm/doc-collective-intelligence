<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

require_once __DIR__ . '/../helpers.php';
require_once __DIR__ . '/../data.php';

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
    #[TestDox('Calcul covariance de deux séries de tailles différentes')]
    public function testCovarianceInvalidInputs(): void
    {
        $seriesX = array(2, 7, 3, 12, 9);
        $seriesY = array(1, 2, 3);
        $this->assertEquals(NULL, covariance($seriesX, $seriesY));
    }

    #[TestDox('Calcul covariance de deux séries identiques')]
    public function testCovarianceSameSeries(): void
    {
        $seriesX = array(2, 7, 3, 12, 9);
        $seriesY = array(2, 7, 3, 12, 9);
        $this->assertEqualsWithDelta(13.84, covariance($seriesX, $seriesY),  self::EPSILON);
    }

    #[TestDox('Calcul covariance de deux séries quelconques 1')]
    public function testCovarianceRandomSeries(): void
    {
        $seriesX = array(1245, 1415, 1312, 1427, 1510, 1590);
        $seriesY = array(100, 123, 129, 143, 150, 197);
        $this->assertEqualsWithDelta(3148.5, covariance($seriesX, $seriesY),  self::EPSILON);
    }

    #[TestDox('Calcul covariance de deux séries quelconques 2')]
    public function testCovarianceRandomSeries2(): void
    {
        $seriesX = array(12, 13, 25, 39);
        $seriesY = array(67, 45, 32, 21);
        $this->assertEqualsWithDelta(-165.815, covariance($seriesX, $seriesY),  0.1);
    }

    #[TestDox('Symétrie du calcul de la covariance (inversion des arguments)')]
    public function testCovarianceSymmetry(): void
    {
        $seriesX = array(12, 13, 25, 39);
        $seriesY = array(67, 45, 32, 21);
        $this->assertEqualsWithDelta(covariance($seriesX, $seriesY), covariance($seriesY, $seriesX),  0.1);
    }

    public function testSimilarityDistanceDomainOfDefinition(): void
    {
        $simlilarityScore = similarityDistance(CRITICS, 'Lisa Rose', 'Gene Seymour');
        $this->assertThat(
            $simlilarityScore,
            $this->logicalAnd($this->lessThan(1, $simlilarityScore), $this->greaterThan(0, $simlilarityScore))
        );
    }

    public function testSimilarityDistanceRandomData(): void
    {
        //Voir démo dans le livre
        $simlilarityScore = similarityDistance(CRITICS, 'Lisa Rose', 'Gene Seymour');
        $this->assertEqualsWithDelta(0.148148, $simlilarityScore,  self::EPSILON);
    }
}
