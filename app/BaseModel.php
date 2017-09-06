<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    /**
     * Force the fillable fields to be defined.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Force the table to be defined.
     *
     * @var string
     */
    protected $table = '';
}
