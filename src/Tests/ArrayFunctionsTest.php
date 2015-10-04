<?php

namespace KieranBamforth\ArrayFunctions\Tests;

use KieranBamforth\ArrayFunctions\ArrayFunctions;

class ArrayFunctionsTest extends \PHPUnit_Framework_TestCase
{
    private $arrayFunctions;

    public function setup()
    {
        $this->arrayFunctions = new ArrayFunctions();
    }
    /**
     * @dataProvider flattenArrayDataProvider
     *
     * @param  array $expectedOutput The expected result when $input is flattened.
     * @param  array $input          The array to flatten.
     *
     * @return void
     */
    public function testFlattenArray(array $input, array $expectedOutput)
    {
        $actualOutput = $this->arrayFunctions->flatten($input);

        $this->assertEquals(
            $expectedOutput,
            $actualOutput
        );
    }

    public function flattenArrayDataProvider()
    {
        $test1Input = [[1,2,[3]],4];
        $test1ExpectedOutput = [1,2,3,4];

        return [
            [$test1Input, $test1ExpectedOutput]
        ];
    }

    /**
     * @dataProvider isArrayAssociativeDataProvider
     *
     * @param $expectedOutput
     * @param array $input
     *
     * @return void
     */
    public function testIsArrayAssociative(array $input, $expectedOutput)
    {
        $this->assertEquals(
            $expectedOutput,
            $this->arrayFunctions->isArrayAssociative($input)
        );
    }

    public function isArrayAssociativeDataProvider()
    {
        return [
            [[1,2,3], false],
            [['key' => 'value', 1], true]
        ];
    }
}