<?php

namespace Inon\Utilities;

/**
 * The AbstractParser class.
 *
 * @package Inon\Utilities
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
     * @throws \Exception
     */
    public function __construct(string $fileName)
    {
        if (! file_exists($fileName)) {
            throw new \Exception(sprintf('File : %s does not exist', $fileName));
        }

        $this->fileName = $fileName;
    }
}