<?php


namespace Sysdiag\Data;

/**
 * Holds a representation of total memory, free memory, etc. both in memory and in swap.
 *
 * @package Sysdiag\Data
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class MemoryStatus implements DataObject
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var int
     */
    protected $total;

    /**
     * @var int
     */
    protected $used;

    /**
     * @var int
     */
    protected $free;

    /**
     * @var int
     */
    protected $shared;

    /**
     * @var int
     */
    protected $buffers;

    /**
     * @var int
     */
    protected $cached;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     *
     * @return $this
     */
    public function setTotal($total)
    {
        $this->total = intval($total);

        return $this;
    }

    /**
     * @return int
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * @param int $used
     *
     * @return $this
     */
    public function setUsed($used)
    {
        $this->used = intval($used);

        return $this;
    }

    /**
     * @return int
     */
    public function getFree()
    {
        return $this->free;
    }

    /**
     * @param int $free
     *
     * @return $this
     */
    public function setFree($free)
    {
        $this->free = intval($free);

        return $this;
    }

    /**
     * @return int
     */
    public function getShared()
    {
        return $this->shared;
    }

    /**
     * @param int $shared
     *
     * @return $this
     */
    public function setShared($shared)
    {
        $this->shared = intval($shared);

        return $this;
    }

    /**
     * @return int
     */
    public function getBuffers()
    {
        return $this->buffers;
    }

    /**
     * @param int $buffers
     *
     * @return $this
     */
    public function setBuffers($buffers)
    {
        $this->buffers = intval($buffers);

        return $this;
    }

    /**
     * @return int
     */
    public function getCached()
    {
        return $this->cached;
    }

    /**
     * @param int $cached
     *
     * @return $this
     */
    public function setCached($cached)
    {
        $this->cached = intval($cached);

        return $this;
    }
}
