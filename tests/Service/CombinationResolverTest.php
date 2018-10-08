<?php

namespace App\Tests\Service;

use App\Service\CombinationResolver;
use PHPUnit\Framework\TestCase;

/**
 * Class CombinationResolverTest.
 */
class CombinationResolverTest extends TestCase
{
    public function testEmptyResolver(): void
    {
        $resolver = new CombinationResolver();

        $options = $resolver->getOptions('any', null);

        $this->assertEquals([], $options);
    }

    public function testExistingValue(): void
    {
        $resolver = new CombinationResolver();
        $resolver->setOptions('first', ['A' => ['B', 'C', 'D']]);

        $options = $resolver->getOptions('first', 'A');

        $this->assertEquals(['B', 'C', 'D'], $options);
    }

    public function testMissingValue(): void
    {
        $resolver = new CombinationResolver();
        $resolver->setOptions('first', ['A' => ['B', 'C', 'D']]);

        $options = $resolver->getOptions('first', 'B');

        $this->assertEquals([], $options);
    }
}
