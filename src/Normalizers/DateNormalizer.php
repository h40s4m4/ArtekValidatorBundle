<?php

declare(strict_types=1);

namespace ArtekSoft\ValidatorBundle\Normalizers;

use DateTimeInterface;
use InvalidArgumentException;
use Safe\DateTime;
use Safe\Exceptions\DatetimeException;

class DateNormalizer
{
    /**
     * Converts a string to a DateTime object.
     *
     * By default it is created using the Y-m-d format, but you can optionally change the format.
     *
     * @param string|null $stringDate
     * @param string      $format
     *
     * @return DateTimeInterface
     *
     * @throws InvalidArgumentException In case $stringDate is not a valid STRING or is EMPTY.
     * @throws InvalidArgumentException In case the date is not convertible.
     * @throws InvalidArgumentException In case the date is null.
     */
    public static function dateStringToDateTimeInterface(string|null $stringDate, string $format = 'Y-m-d'): DateTimeInterface
    {
        try {
            $datetimeValue = Datetime::createFromFormat($format, $stringDate);
        } catch (DatetimeException $e) {
            throw new InvalidArgumentException(
                sprintf(
                    'El string [%s], para el formato formato [%s] no es válido como una fecha, con el error: %s',
                    $stringDate,
                    $format,
                    $e->getMessage(),
                ),
            );
        }

        return $datetimeValue;
    }
}