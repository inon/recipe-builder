<?php

namespace Inon\Utilities;

/**
 * The ParserInterface class.
 *
 * @package Inon\Utilities
 * @author  Inon Baguio <inon.baguio@yahoo.com>
 */
interface Parser
{
    /**
     * @return array
     */
    public function parse() : array;
}