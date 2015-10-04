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
    public function testFlattenArray(array $expectedOutput, array $input)
    {
        $this->assertEquals(
            $expectedOutput,
            $this->arrayFunctions->flatten($input)
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