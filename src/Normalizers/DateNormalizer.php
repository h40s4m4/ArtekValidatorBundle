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
     * Convierte un string en un objeto DateTime.
     *
     * Por defecto se crea usando el formato Y-m-d, pero se puede cambiar el formato opcionalmente.
     *
     * @param string|null $stringDate
     * @param string      $format
     *
     * @return DateTimeInterface
     *
     * @throws InvalidArgumentException En caso que $stringDate no sea un STRING válido o esté VACÍO.
     * @throws InvalidArgumentException En caso de que la fecha no sea convertible.
     * @throws InvalidArgumentException En caso de que la fecha sea nula.
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