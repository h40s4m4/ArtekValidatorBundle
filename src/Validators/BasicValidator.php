<?php

declare(strict_types=1);

namespace ArtekSoft\ValidatorBundle\Validators;

use InvalidArgumentException;
use Safe\Exceptions\JsonException as SafeJsonException;
use Webmozart\Assert\Assert;
use Webmozart\Assert\InvalidArgumentException as WebmozartException;

use function Safe\json_encode as safe_json_encode;

final class BasicValidator
{
    /**
     * Checks if the delivered value is an ARRAY or not. The $value field supports any value type.
     *
     * IF it is a valid ARRAY, it returns TRUE.
     * It is NOT a valid ARRAY, it returns FALSE.
     *
     * @param mixed|null $value
     * @param bool       $hardException
     *
     * @return bool
     *
     * @throws InvalidArgumentException In case $value is not a valid ARRAY and the flag $hardException = true.
     */
    public static function checkIsArray(mixed $value, bool $hardException = FALSE): bool
    {
        $isArray = TRUE;
        try {
            Assert::isArray($value, sprintf('El campo [%s] no es un Array', safe_json_encode($value)));
        } catch (WebmozartException | SafeJsonException $e) {
            if (TRUE === $hardException) {
                throw new InvalidArgumentException($e->getMessage());
            }

            $isArray = FALSE;
        }

        return $isArray;
    }

    /**
     * Verifica si el valor entregado es un STRING válido y no VACÍO. El campo $value soporta cualquier tipo de valor.
     *
     * SI es un STRING válido, retorna TRUE.
     * NO es un STRING válido o está VACÍO, retorna FALSE.
     *
     * @param mixed|null $value
     * @param bool       $hardException
     *
     * @return bool
     *
     * @throws InvalidArgumentException En caso que $value no sea un STRING válido o esté VACÍO y que la bandera $hardException = true.
     */
    public static function checkIsStringNonEmpty(mixed $value, bool $hardException = FALSE): bool
    {
        $isString = TRUE;
        try {
            Assert::stringNotEmpty($value, sprintf('El campo [%s] se encuentra vacío o no es un string válido', safe_json_encode($value)));
        } catch (WebmozartException | SafeJsonException $e) {
            if (TRUE === $hardException) {
                throw new InvalidArgumentException($e->getMessage());
            }

            $isString = FALSE;
        }

        return $isString;
    }

    /**
     * Verifica si el valor entregado es un INT válido y no VACÍO. El campo $value soporta cualquier tipo de valor.
     *
     * SI es un INT válido, retorna TRUE.
     * NO es un INT válido o está VACÍO, retorna FALSE.
     *
     * @param mixed|null $value
     * @param bool       $hardException
     *
     * @return bool
     *
     * @throws InvalidArgumentException En caso que $value no sea un INT válido o esté VACÍO y que la bandera $hardException = true.
     */
    public static function checkIsIntNonEmpty($value, bool $hardException = FALSE): bool
    {
        $isInt = TRUE;
        try {
            Assert::integer($value, sprintf('El campo [%s] se encuentra vacío o no es un INT válido', safe_json_encode($value)));
        } catch (WebmozartException | SafeJsonException $e) {
            if (TRUE === $hardException) {
                throw new InvalidArgumentException($e->getMessage());
            }

            $isInt = FALSE;
        }

        return $isInt;
    }

    /**
     * Verifica si el valor entregado es un FLOAT válido y no VACÍO. El campo $value soporta cualquier tipo de valor.
     *
     * SI es un FLOAT válido, retorna TRUE.
     * NO es un FLOAT válido o está VACÍO, retorna FALSE.
     *
     * @param mixed|null $value
     * @param bool       $hardException
     *
     * @return bool
     *
     * @throws InvalidArgumentException En caso que $value no sea un FLOAT válido o esté VACÍO y que la bandera $hardException = true.
     */
    public static function abstractCheckIsFloatNonEmpty(mixed $value, bool $hardException = FALSE): bool
    {
        $isFloat = TRUE;
        try {
            Assert::float($value, sprintf('El campo [%s] se encuentra vacío o no es un FLOAT válido', safe_json_encode($value)));
        } catch (WebmozartException | SafeJsonException $e) {
            if (TRUE === $hardException) {
                throw new InvalidArgumentException($e->getMessage());
            }

            $isFloat = FALSE;
        }

        return $isFloat;
    }

    /**
     * Verifica si un String es casteable a INT. El campo $value soporta cualquier tipo de valor.
     *
     * SI es un STRING válido Y casteable, retorna TRUE.
     * NO es un STRING válido O NO es casteable, retorna FALSE.
     *
     * @param mixed|null $value
     * @param bool       $hardException
     *
     * @return bool
     *
     * @throws InvalidArgumentException En caso que el STRING esté vacío o sea inválido y que la bandera $hardException = true.
     * @throws InvalidArgumentException En caso que el STRING no sea casteable a INT y que la bandera $hardException = true.
     */
    public static function checkIfStringCasteableToInt(mixed $value, bool $hardException = FALSE): bool
    {
        // Verifica si el valor no está vacía.
        if (TRUE === self::checkIsStringNonEmpty($value)) {
            if (TRUE === $hardException) {
                throw new InvalidArgumentException('El valor entregado está vacío');
            }

            return FALSE;
        }

        $isCasteable = TRUE;
        try {
            Assert::integerish($value, sprintf('El valor [%s] no es convertible a INT', safe_json_encode($value)));
        } catch (WebmozartException | SafeJsonException $e) {
            if (TRUE === $hardException) {
                throw new InvalidArgumentException($e->getMessage());
            }

            $isCasteable = FALSE;
        }

        return $isCasteable;
    }
}