<?php

namespace Inon\Utilities;

use Inon\Exceptions\FileNotFoundException;

/**
 * The AbstractParser class.
 *
 * @package Inon\Utilities\AbstractParser
 * @author  Inon Baguio <inon.baguio@yahoo.com>
 */
class AbstractParser
{
    #----------------------------------------------------------------------------------------------
    # Properties
    #----------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $fileName;

    #----------------------------------------------------------------------------------------------
    # Class Methods
    #----------------------------------------------------------------------------------------------

    /**
     * Abstract parser constructor.
     *
     * @param string $fileName
     *
     * @throws FileNotFoundException
     */
    public function __construct(string $fileName)
    {
        if (! file_exists($fileName)) {
            throw new FileNotFoundException($fileName);
        }

        $this->fileName = $fileName;
    }
}
