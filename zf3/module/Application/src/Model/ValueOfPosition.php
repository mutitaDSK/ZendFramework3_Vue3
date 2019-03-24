<?php
/**
 * Find value form position
 * Input: position as int
 * Output: value of input position as int
 * Process: position^2 - position + 3 otherwise if position is not integer, value will be 0
 */

namespace Application\Model;


class ValueOfPosition
{
    public function find($position)
    {
        if ( gettype($position) != "integer") {
            return 0;
        }

        $value = $position ** 2 - $position + 3;
        return $value;
    }
}