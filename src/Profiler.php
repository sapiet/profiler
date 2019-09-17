<?php
namespace Sapiet\Profiler;

class Profiler
{
    private static $items = [];

    public static function getItem(string $code): ProfilerItem
    {
        if (!array_key_exists($code, self::$items)) {
            throw new \Exception('Item with code '.$code.' does not exist');
        }

        return self::$items[$code];
    }

    public static function start(string $code): ProfilerItem
    {
        return self::$items[$code] = (new ProfilerItem())
            ->setCode($code)
            ->setStart(microtime(true))
            ->setStartMemoryUsage(memory_get_usage())
        ;
    }

    public static function end(string $code): ProfilerItem
    {
        return self::getItem($code)
            ->setEnd(microtime(true))
            ->setDuration(round(self::getItem($code)->getEnd() - self::getItem($code)->getStart(), 3))
            ->setEndMemoryUsage(memory_get_usage())
            ->setMemoryUsage(self::getItem($code)->getEndMemoryUsage() - self::getItem($code)->getStartMemoryUsage())
        ;
    }
}
