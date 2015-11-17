<?php


namespace Sysdiag\Parser;


use Sysdiag\Data\DataObject;

/**
 * Transforms the output of a process into a data object.
 *
 * @package Sysdiag\Parser
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
abstract class AbstractTransformer
{
    /**
     * Convert a single line from the output into a data object.
     *
     * @param array $data
     *
     * @return DataObject
     */
    abstract protected function convertLineToData($data);

    /**
     * Transform the output of a process into an array of data objects
     * containing the information returned.
     *
     * @param string $output The output from the process that was executed.
     *
     * @return array
     */
    public function transform($output)
    {
        $dataObjects = [];
        $lines        = preg_split('/\n/', $output);

        /* Remove the last line, as it's just a newline. */
        array_pop($lines);

        foreach ($lines as $lineNumber => $lineContent) {
            /* Skip the first line, as it's only headers. */
            if (0 === $lineNumber) {
                continue;
            }

            $data           = preg_split('/\s{2,}/', $lineContent);
            $dataObjects[] = $this->convertLineToData($data);
        }

        return $dataObjects;
    }
}
