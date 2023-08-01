<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

require __DIR__ . '/../helpers.php';
require __DIR__ . '/../data.php';

final class Test extends TestCase
{
    #[TestDox('Calcul moyenne d\'une liste vide')]
    public function testMeanEmptyArray(): void
    {
        $this->assertEquals(mean(array()), null);
    }
    #[TestDox('Calcul moyenne d\'une série simple')]
    public function testMean(): void
    {
        $this->assertEquals(mean(array(1, 2, 3, 4, 5)), 3);
    }
}
