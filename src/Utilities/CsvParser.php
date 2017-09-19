<?php

namespace Inon\Utilities;

/**
 * The CsvParser class.
 *
 * @package Inon\Utilities\CsvParser
 * @author  Inon Baguio <inon.baguio@yahoo.com>
 */
class CsvParser extends AbstractParser implements Parser
{
    /**
     * {@inheritdoc}
     */
    public function parse() : array
    {
        $row = 1;
        $items = [];

        if (($handle = fopen($this->fileName, 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {

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