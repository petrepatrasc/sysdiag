<?php


namespace Sysdiag\Parser;


use Sysdiag\Data\MemoryStatus;

class MemoryStatusTransformer extends AbstractTransformer
{
    private function getNormalizedArray()
    {
        return array_fill(0, 7, 0);
    }

    /**
     * @inheritDoc
     */
    protected function convertLineToData($data)
    {
        $data = array_replace($this->getNormalizedArray(), $data);

        if ('-/+ buffers/cache:' === $data[0]) {
            $memoryStatus = (new MemoryStatus())
                ->setType($data[0])
                ->setTotal(0)
                ->setUsed($data[1])
                ->setFree($data[2])
                ->setShared($data[3])
                ->setBuffers($data[4])
                ->setCached($data[5]);
        } else {
            $memoryStatus = (new MemoryStatus())
                ->setType($data[0])
                ->setTotal($data[1])
                ->setUsed($data[2])
                ->setFree($data[3])
                ->setShared($data[4])
                ->setBuffers($data[5])
                ->setCached($data[6]);
        }

        return $memoryStatus;
    }
}
