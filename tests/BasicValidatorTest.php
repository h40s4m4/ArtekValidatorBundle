<?php

declare(strict_types=1);

namespace ArtekSoft\ValidatorBundle\Tests;

use ArtekSoft\ValidatorBundle\Validators\BasicValidator;
use PHPUnit\Framework\TestCase;

final class BasicValidatorTest extends TestCase
{
    /**
     * @param mixed $testVariable
     * @param bool  $testExpectedResult
     *
     * @return void
     *
     * @dataProvider checkIsArrayTestProvider
     */
    public function testCheckIsArray(mixed $testVariable, bool $testExpectedResult): void
    {
        $result = BasicValidator::checkIsArray($testVariable);
        $this->assertSame($testExpectedResult, $result);
    }

    ###############################################################
    ######################## DATA PROVIDERS #######################
    ###############################################################

    /**
     * Data for array test, all arrays be valid, others things aren't valid.
     *
     * @return array
     */
    public function checkIsArrayTestProvider(): array
    {
        $data = $this->generalDataForTest();

        $data['array_empty']['test_expected_result']                     = TRUE;
        $data['array_null']['test_expected_result']                      = TRUE;
        $data['array_string']['test_expected_result']                    = TRUE;
        $data['array_int']['test_expected_result']                       = TRUE;
        $data['array_associative_null_string']['test_expected_result']   = TRUE;
        $data['array_associative_string_null']['test_expected_result']   = TRUE;
        $data['array_associative_int_null']['test_expected_result']      = TRUE;
        $data['array_associative_null_int']['test_expected_result']      = TRUE;
        $data['array_associative_null_null']['test_expected_result']     = TRUE;
        $data['array_associative_string_string']['test_expected_result'] = TRUE;
        $data['array_associative_string_int']['test_expected_result']    = TRUE;
        $data['array_associative_int_string']['test_expected_result']    = TRUE;
        $data['array_associative_int_int']['test_expected_result']       = TRUE;

        return $data;
    }

    /**
     * Basic values for test. By default, the values expected are FALSE and need be adapted for puntual test function.
     *
     * @return array
     */
    private function generalDataForTest(): array
    {
        return [
            // Numeric Values.
            'int_normal'                      => ['test_variable' => 1, 'test_expected_result' => FALSE],
            'int_zero'                        => ['test_variable' => 0, 'test_expected_result' => FALSE],
            'int_negative'                    => ['test_variable' => -1, 'test_expected_result' => FALSE],
            'string_int_normal'               => ['test_variable' => '1', 'test_expected_result' => FALSE],
            'string_int_zero'                 => ['test_variable' => '0', 'test_expected_result' => FALSE],
            'string_int_negative'             => ['test_variable' => '-1', 'test_expected_result' => FALSE],

            // Float Values (Chilean System).
            'float_zero'                      => ['test_variable' => 0.0, 'test_expected_result' => FALSE],
            'float_positive'                  => ['test_variable' => 1.1, 'test_expected_result' => FALSE],
            'float_negative'                  => ['test_variable' => -1.1, 'test_expected_result' => FALSE],
            'string_float_zero'               => ['test_variable' => '0.0', 'test_expected_result' => FALSE],
            'string_float_positive'           => ['test_variable' => '1.1', 'test_expected_result' => FALSE],
            'string_float_negative'           => ['test_variable' => '-1.1', 'test_expected_result' => FALSE],

            // Boolean.
            'boolean_true'                    => ['test_variable' => TRUE, 'test_expected_result' => FALSE],
            'boolean_false'                   => ['test_variable' => FALSE, 'test_expected_result' => FALSE],

            // Strings.
            'string_empty'                    => ['test_variable' => '', 'test_expected_result' => FALSE],
            'string'                          => ['test_variable' => 'hi, im string', 'test_expected_result' => FALSE],

            // Array.
            'array_empty'                     => ['test_variable' => [], 'test_expected_result' => FALSE],
            'array_null'                      => ['test_variable' => [NULL], 'test_expected_result' => FALSE],
            'array_string'                    => ['test_variable' => ['a'], 'test_expected_result' => FALSE],
            'array_int'                       => ['test_variable' => [1], 'test_expected_result' => FALSE],
            'array_associative_null_string'   => ['test_variable' => [NULL => 'a'], 'test_expected_result' => FALSE],
            'array_associative_string_null'   => ['test_variable' => ['a' => NULL], 'test_expected_result' => FALSE],
            'array_associative_int_null'      => ['test_variable' => [1 => NULL], 'test_expected_result' => FALSE],
            'array_associative_null_int'      => ['test_variable' => [NULL => 1], 'test_expected_result' => FALSE],
            'array_associative_null_null'     => ['test_variable' => [NULL => NULL], 'test_expected_result' => FALSE],
            'array_associative_string_string' => ['test_variable' => ['a' => 'a'], 'test_expected_result' => FALSE],
            'array_associative_string_int'    => ['test_variable' => ['a' => 1], 'test_expected_result' => FALSE],
            'array_associative_int_string'    => ['test_variable' => [1 => 'a'], 'test_expected_result' => FALSE],
            'array_associative_int_int'       => ['test_variable' => [1 => 1], 'test_expected_result' => FALSE],

            // Null Values.
            'null_value'                      => ['test_variable' => NULL, 'test_expected_result' => FALSE],
        ];
    }
}