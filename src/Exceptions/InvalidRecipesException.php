<?php

namespace Inon\Exceptions;

/**
 * The InvalidRecipesException class.
 *
 * @package Inon\Exceptions
 * @author  Inon Baguio <inon.baguio@yahoo.com>
 */
class InvalidRecipesException extends \Exception
{
    /**
     * InvalidRecipesException constructor.
     */
    public function __construct()
    {
        parent::__construct('Invalid recipes data, please make sure the each recipe contains valid ingredients');
    }
}