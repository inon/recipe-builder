<?php

namespace Inon\Exceptions;

/**
 * The FileNotFoundException class.
 *
 * @package Inon\Exceptions\FileNotFoundException
 * @author  Inon Baguio <inon.baguio@yahoo.com>
 */
class FileNotFoundException extends \Exception
{
    /**
     * InvalidRecipesException constructor.
     *
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        parent::__construct(sprintf('File : %s does not exist', $filename));
    }
}
