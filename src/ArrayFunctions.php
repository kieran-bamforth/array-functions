<?php

namespace KieranBamforth\ArrayFunctions;

use KieranBamforth\ArrayFunctions\Exception\FlattenArrayException;

class ArrayFunctions
{
    /**
     * Flattens all of a multidimensional array's values into a single array.
     *
     * @param array $input The multidimensional array to flatten.
     *
     * @throws FlattenArrayException If an associative array is passed.
     *
     * @return array
     */
    public function flatten(array $input)
    {
        if ($this->isArrayAssociative($input)) {
            throw new FlattenArrayException();
        }

        $flattenedArray = [];

        foreach ($input as $value) {
            if (is_array($value)) {

                $flattenedArray = array_merge($flattenedArray, $this->flatten($value));

                continue;
            }

            $flattenedArray[] = $value;
        }

        return $flattenedArray;
    }

    /**
     * Determines if an array is associative.
     *
     * @param array $input
     *
     * @return boolean
     */
    public function isArrayAssociative(array $input)
    {
        foreach (array_keys($input) as $key) {
            if (is_string($key)) {
                return true;
            }
        }

        return false;
    }
}