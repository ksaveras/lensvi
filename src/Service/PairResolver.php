<?php

namespace App\Service;

/**
 * Class PairResolver.
 */
class PairResolver
{
    /**
     * @var array
     */
    private $primary = [];

    /**
     * @var array
     */
    private $secondary = [];

    /**
     * @param array $pairs
     */
    public function setCombinations(array $pairs): void
    {
        foreach ($pairs as $name => $values) {
            $values = (array) $values;
            $this->primary[$name] = $values;

            foreach ($values as $value) {
                $this->secondary[$value][] = $name;
            }
        }
    }

    /**
     * @param $value
     *
     * @return array|mixed
     */
    public function getPrimary($value)
    {
        if (isset($this->primary[$value])) {
            return $this->primary[$value];
        }

        return [];
    }

    /**
     * @param $value
     *
     * @return array|mixed
     */
    public function getSecondary($value)
    {
        if (isset($this->secondary[$value])) {
            return $this->secondary[$value];
        }

        return [];
    }
}
