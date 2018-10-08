<?php

namespace App\Service;

/**
 * Class CombinationResolver.
 */
class CombinationResolver
{
    /**
     * @var array
     */
    private $combinations = [];

    /**
     * @param string $name
     * @param array  $combinations
     *
     * @return CombinationResolver
     */
    public function setOptions(string $name, array $combinations): self
    {
        $this->combinations[$name] = $combinations;

        return $this;
    }

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return array
     */
    public function getOptions(string $name, $value): array
    {
        if (isset($this->combinations[$name][$value])) {
            return $this->combinations[$name][$value];
        }

        return [];
    }
}
