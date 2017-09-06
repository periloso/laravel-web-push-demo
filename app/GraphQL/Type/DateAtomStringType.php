<?php

namespace App\GraphQL\Type;

use Carbon\Carbon;
use GraphQL\Utils;
use GraphQL\Type\Definition\IntType;

class DateAtomStringType extends IntType
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
        return $this->toAtomStringDate($value);
    }

    public function parseValue($value)
    {
        return $this->toAtomStringDate($value);
    }

    protected function toAtomStringDate($value)
    {
        if (is_string($value)) return $value;
        return (new Carbon($value))->toAtomString();
    }
}
