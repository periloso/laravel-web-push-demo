<?php

namespace App\GraphQL\Type;

use Carbon\Carbon;
use GraphQL\Utils;
use GraphQL\Type\Definition\IntType;

class DateTimeStringType extends IntType
{
    private static $_instance = null;
    const MIN_INT = 0;
    /**
     * @var string
     */
    public $name = "Atom String Date Type";

    /**
     * @var string
     */
    public $description = "An Atom Date String";

    protected function __clone() {}

    static public function type()
    {
        if(is_null(self::$_instance)) self::$_instance = new self();
        return self::$_instance;
    }

    public function __construct()
    {
        Utils::invariant($this->name, 'Type must be named.');
    }

    public function serialize($value)
    {
        return $this->toDateTimeString($value);
    }

    public function parseValue($value)
    {
        return $this->toDateTimeString($value);
    }

    protected function toDateTimeString($value)
    {
        if (is_string($value)) return $value;
        return (new Carbon($value))->format('Y-m-d\TH:i:s\Z');
    }
}
