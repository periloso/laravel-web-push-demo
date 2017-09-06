<?php

namespace App\GraphQL\Type;

use Carbon\Carbon;
use GraphQL\Utils;
use GraphQL\Type\Definition\IntType;

class W3cStringType extends IntType
{
    private static $_instance = null;
    const MIN_INT = 0;
    /**
     * @var string
     */
    public $name = "W3c String Date Type";

    /**
     * @var string
     */
    public $description = "A W3c string-formatted date";

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
        return $this->toW3cStringType($value);
    }

    public function parseValue($value)
    {
        return $this->toW3cStringType($value);
    }

    protected function toW3cStringType($value)
    {
        if (is_string($value)) return $value;
        return (new Carbon($value))->toW3cString();
    }
}
