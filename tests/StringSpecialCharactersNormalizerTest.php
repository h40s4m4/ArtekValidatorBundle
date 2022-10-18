<?php

declare(strict_types=1);

namespace ArtekSoft\ValidatorBundle\Tests;

use ArtekSoft\ValidatorBundle\Normalizers\StringSpecialCharactersNormalizer;
use ArtekSoft\ValidatorBundle\Validators\BasicValidator;
use PHPUnit\Framework\TestCase;

final class StringSpecialCharactersNormalizerTest extends TestCase
{
    /**
     * @param mixed $testVariable
     * @param bool  $testExpectedResult
     *
     * @return void
     *
     * @dataProvider testFixDegreeSignProvider
     */
    public function testFixDegreeSign(mixed $testVariable, mixed $testExpectedResult): void
    {
        $result = StringSpecialCharactersNormalizer::fixDegreeSign($testVariable);
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
    public function testFixDegreeSignProvider(): array
    {
        return [
            // Numeric Values.
            'normal_degree'            => ['°', 'test_expected_result' => '°'],
            'normal_degree_with_text'  => ['°test', 'test_expected_result' => '°test'],
            'ordinal_degree'           => ['º', 'test_expected_result' => '°'],
            'ordinal_degree_with_text' => ['ºtest', 'test_expected_result' => '°test'],
        ];
    }
}