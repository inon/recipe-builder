<?php

namespace Inon\Utilities;


/**
 * The JsonParser class.
 *
 * @package Inon\Utilities
 * @author  Inon Baguio <inon.baguio@yahoo.com>
 */
class JsonParser extends AbstractParser implements Parser
{
    /**
     * {@inheritdoc}
     */
    public function parse(): array
    {
        return json_decode(file_get_contents($this->fileName), true);
    }
}