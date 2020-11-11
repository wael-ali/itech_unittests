<?php


namespace App;


class Queue
{
    const MAX_ITEMS = 5;
    protected $items = [];

    public function push($item)
    {
        if ($this->getCount() == $this::MAX_ITEMS){
            throw new QueueException('Queue is Full..');
        }
        $this->items[] = $item;
    }
    public function pop()
    {
        return array_shift($this->items);
    }
    public function getCount()
    {
        return count($this->items);
    }
    public function clear()
    {
        return $this->items = [];
    }
}