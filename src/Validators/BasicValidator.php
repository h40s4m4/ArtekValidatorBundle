<?php

declare(strict_types=1);

namespace ArtekSoft\ValidatorBundle\Validators;

use InvalidArgumentException;
use Safe\Exceptions\JsonException as SafeJsonException;
use Webmozart\Assert\Assert;
use Webmozart\Assert\InvalidArgumentException as WebmozartException;

use function Safe\json_encode as safe_json_encode;
use function sprintf;

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
     * Checks if the delivered value is a STRING and is not EMPTY. The $value field supports any value type.
     *
     * IF it is a valid STRING, it returns TRUE.
     * It is NOT a valid STRING or is EMPTY, it returns FALSE.
     *
     * @param mixed|null $value
     * @param bool       $hardException
     *
     * @return bool
     *
     * @throws InvalidArgumentException In case $value is not a valid STRING or is NOT EMPTY and the flag $hardException = true.
     */
    public static function checkIsStringNonEmpty(mixed $value, bool $hardException = FALSE): bool
    {
        $isString = TRUE;
        try {
            Assert::stringNotEmpty(
                $value,
                sprintf('El campo [%s] se encuentra vacío o no es un string válido', safe_json_encode($value)),
            );
        } catch (WebmozartException | SafeJsonException $e) {
            if (TRUE === $hardException) {
                throw new InvalidArgumentException($e->getMessage());
            }

            $isString = FALSE;
        }

        return $isString;
    }

    /**
     * Checks if the delivered value is a INT and is not EMPTY. The $value field supports any value type.
     *
     * IF it is a valid INT, it returns TRUE.
     * It is NOT a valid INT or is EMPTY, it returns FALSE.
     *
     * @param mixed|null $value
     * @param bool       $hardException
     *
     * @return bool
     *
     * @throws InvalidArgumentException In case $value is not a valid INT or is NOT EMPTY and the flag $hardException = true.
     */
    public static function checkIsIntNonEmpty(mixed $value, bool $hardException = FALSE): bool
    {
        $isInt = TRUE;
        try {
            Assert::integer(
                $value,
                sprintf('El campo [%s] se encuentra vacío o no es un INT válido', safe_json_encode($value)),
            );
        } catch (WebmozartException | SafeJsonException $e) {
            if (TRUE === $hardException) {
                throw new InvalidArgumentException($e->getMessage());
            }

            $isInt = FALSE;
        }

        return $isInt;
    }

    /**
     * Checks if the delivered value is a FLOAT and is not EMPTY. The $value field supports any value type.
     *
     * IF it is a valid FLOAT, it returns TRUE.
     * It is NOT a valid FLOAT or is EMPTY, it returns FALSE.
     *
     * @param mixed|null $value
     * @param bool       $hardException
     *
     * @return bool
     *
     * @throws InvalidArgumentException In case $value is not a valid FLOAT or is NOT EMPTY and the flag $hardException = true.
     */
    public static function checkIsFloatNonEmpty(mixed $value, bool $hardException = FALSE): bool
    {
        $isFloat = TRUE;
        try {
            Assert::float(
                $value,
                sprintf('El campo [%s] se encuentra vacío o no es un FLOAT válido', safe_json_encode($value)),
            );
        } catch (WebmozartException | SafeJsonException $e) {
            if (TRUE === $hardException) {
                throw new InvalidArgumentException($e->getMessage());
            }

            $isFloat = FALSE;
        }

        return $isFloat;
    }
}