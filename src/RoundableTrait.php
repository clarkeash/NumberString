<?php namespace Acme;

use InvalidArgumentException;

trait RoundableTrait
{
    public function up($value, $by)
    {
        if(!is_integer($by) || $by == 0) throw new InvalidArgumentException;
        return (int) ceil($value / $by) * $by;
    }

    public function down($value, $by)
    {
        if(!is_integer($by) || $by == 0) throw new InvalidArgumentException;
        return (int) floor($value / $by) * $by;
    }
} 