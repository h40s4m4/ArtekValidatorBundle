<?php

namespace ArtekSoft\ValidatorBundle\Normalizers;

class StringSpecialCharactersNormalizer
{
    /**
     * Normalize and fix a string containing degree signs (º), where the standard degree sign, in html, is
     * "deg;", but can also appear as "ordm;"
     *
     * @param string $stringWithDegree
     *
     * @return string
     */
    public static function fixDegreeSign(string $stringWithDegree): string
    {
        $string          = $stringWithDegree;
        $convertedString = htmlentities($stringWithDegree);
        if (str_contains($convertedString, '&ordm;')) {
            $fixedString = str_replace('&ordm;', '&deg;', $convertedString);
            $string      = html_entity_decode($fixedString);
        }

        return $string;
    }
}