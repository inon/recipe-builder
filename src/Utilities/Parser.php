<?php

namespace Inon\Utilities;

/**
 * The ParserInterface class.
 *
 * @package Inon\Utilities
 * @author  Inon Baguio <inon@vroomvroomvroom.com.au>
 */
interface Parser
{
    /**
     * @return array
     */
    public function parse() : array;
}