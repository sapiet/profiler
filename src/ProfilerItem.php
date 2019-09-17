<?php

namespace Sapiet\Profiler;

class ProfilerItem
{
    /**
     * @var string $code
     */
    private $code;

    /**
     * @var double $start
     */
    private $start;

    /**
     * @var double $end
     */
    private $end;

    /**
     * @var double $duration
     */
    private $duration;

    /**
     * @var int $startMemoryUsage
     */
    private $startMemoryUsage;

    /**
     * @var int $endMemoryUsage
     */
    private $endMemoryUsage;

    /**
     * @var int $memoryUsage
     */
    private $memoryUsage;

    public function format($pattern = '{{duration}} sec / {{memoryUsage}} oct')
    {
        return preg_replace_callback('/{{([a-zA-Z]*)}}/', function(array $matches) {
            $methodName = 'get'.ucfirst($matches[1]);
            return $this->$methodName();
        }, $pattern);
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return float
     */
    public function getStart(): float
    {
        return $this->start;
    }

    /**
     * @param float $start
     */
    public function setStart(float $start)
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return float
     */
    public function getEnd(): float
    {
        return $this->end;
    }

    /**
     * @param float $end
     */
    public function setEnd(float $end)
    {
        $this->end = $end;
        return $this;
    }

    /**
     * @return float
     */
    public function getDuration(): float
    {
        return $this->duration;
    }

    /**
     * @param float $duration
     */
    public function setDuration(float $duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return int
     */
    public function getStartMemoryUsage(): int
    {
        return $this->startMemoryUsage;
    }

    /**
     * @param int $startUsage
     */
    public function setStartMemoryUsage(int $startUsage)
    {
        $this->startMemoryUsage = $startUsage;
        return $this;
    }

    /**
     * @return int
     */
    public function getEndMemoryUsage(): int
    {
        return $this->endMemoryUsage;
    }

    /**
     * @param int $endMemoryUsage
     */
    public function setEndMemoryUsage(int $endMemoryUsage)
    {
        $this->endMemoryUsage = $endMemoryUsage;
        return $this;
    }

    /**
     * @return int
     */
    public function getMemoryUsage(): int
    {
        return $this->memoryUsage;
    }

    /**
     * @param int $memoryUsage
     */
    public function setMemoryUsage(int $memoryUsage)
    {
        $this->memoryUsage = $memoryUsage;
        return $this;
    }
}
