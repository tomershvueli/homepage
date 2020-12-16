<?php

abstract class BaseEnum
{
    private static ?array $cache = null;

    public static function isValidValue($value): bool
    {
        $values = array_values(self::getConstants());
        return in_array($value, $values, true);
    }

    public static function toArray(): array
    {
        $values = array_values(self::getConstants());
        return array_values($values);
    }

    public static function isValidName(string $name): bool
    {
        return array_key_exists($name, self::getConstants());
    }

    private static function getConstants(): array
    {
        if (is_null(self::$cache)) {
            self::$cache = [];
        }
        $calledClass = get_called_class();

        if (! array_key_exists($calledClass, self::$cache)) {
            try {
                $reflect = new ReflectionClass($calledClass);
                self::$cache[$calledClass] = $reflect->getConstants();
            } catch (\Exception $exception) {
                return self::$cache;
            }
        }
        return self::$cache[$calledClass];
    }
}