<?php
/**
 * Created by PhpStorm.
 * User: ksaveras
 * Date: 18.10.8
 * Time: 21.32
 */

namespace App\Tests\Service;

use App\Service\PairResolver;
use PHPUnit\Framework\TestCase;

/**
 * Class PairResolverTest.
 */
class PairResolverTest extends TestCase
{
    public function testEmptyValues(): void
    {
        $service = new PairResolver();

        $options = $service->getPrimary('A');
        $this->assertEquals([], $options);

        $options = $service->getSecondary('Z');
        $this->assertEquals([], $options);
    }

    public function testValues(): void
    {
        $combinations = [
            'A' => ['X', 'Z'],
            'B' => ['X', 'Y', 'Z'],
            'C' => ['X', 'Y'],
        ];

        $service = new PairResolver();
        $service->setCombinations($combinations);

        $options = $service->getPrimary('A');
        $this->assertEquals(['X', 'Z'], $options);

        $options = $service->getSecondary('Z');
        $this->assertEquals(['A', 'B'], $options);
    }
}
