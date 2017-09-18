<?php

namespace Inon\Utilities;

/**
 * The CsvParser class.
 *
 * @package Inon\Utilities\CsvParser
 * @author  Inon Baguio <inon@vroomvroomvroom.com.au>
 */
class CsvParser
{
    /**
     * @var string
     */
    private $fileName;

    /**
     * CsvParser constructor.
     *
     * @param string $fileName
     */
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;

    }

    /**
     * @return array
     */
    public function parse() : array
    {
        $row = 1;

        if (($handle = fopen($this->fileName, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                if ($row <= 1) {
                    $row++;
                    continue;
                }

                $items[str_replace(' ', '', $data[0])] = [
                    'amount' => $data[1],
                    'unit' => $data[2],
                    'useby' => $data[3]
                ];
            }
            fclose($handle);
        }

        return $items;
    }
}