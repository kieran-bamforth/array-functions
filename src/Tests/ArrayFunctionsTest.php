<?php

namespace KieranBamforth\ArrayFunctions\Tests;

use KieranBamforth\ArrayFunctions\ArrayFunctions;

class ArrayFunctionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider flattenArrayDataProvider
     *
     * @param  array $expectedOutput The expected result when $input is flattened.
     * @param  array $input          The array to flatten.
     *
     * @return void
     */
    public function testFlattenArray(array $expectedOutput, array $input)
    {
        $arrayFunctions = new ArrayFunctions();

        $this->assertEquals(
            $expectedOutput,
            $arrayFunctions->flatten($input)
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
}