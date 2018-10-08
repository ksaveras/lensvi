<?php

namespace App\Tests\V2;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class CombinationsControllerTest.
 */
class CombinationsControllerTest extends WebTestCase
{
    /**
     * @dataProvider optionsProvider
     *
     * @param string $section
     * @param string $value
     * @param array  $expected
     */
    public function testOptions(string $section, string $value, array $expected): void
    {
        $client = static::createClient();
        $client->request(
            'GET',
            sprintf('/v2/combinations/%s/%s', $section, $value)
        );

        $jsonData = \json_decode($client->getResponse()->getContent(), true);

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame('application/json', $client->getResponse()->headers->get('Content-Type'));
        $this->assertEquals($expected, $jsonData);
    }

    /**
     * @return \Generator
     */
    public function optionsProvider(): ?\Generator
    {
        yield [
            'first',
            'A',
            [
                'option' => 'A',
                'combinations' => ['X', 'Z'],
            ],
        ];
        yield [
            'first',
            'B',
            [
                'option' => 'B',
                'combinations' => ['X', 'Y', 'Z'],
            ],
        ];
        yield [
            'first',
            'C',
            [
                'option' => 'C',
                'combinations' => ['X', 'Y'],
            ],
        ];
        yield [
            'second',
            'X',
            [
                'option' => 'X',
                'combinations' => ['A', 'B', 'C'],
            ],
        ];
        yield [
            'second',
            'Y',
            [
                'option' => 'Y',
                'combinations' => ['B', 'C'],
            ],
        ];
        yield [
            'second',
            'Z',
            [
                'option' => 'Z',
                'combinations' => ['A', 'B'],
            ],
        ];
        yield [
            'first',
            'F',
            [
                'option' => 'F',
                'combinations' => [],
            ],
        ];
        yield [
            'second',
            'G',
            [
                'option' => 'G',
                'combinations' => [],
            ],
        ];
    }
}
