<?php


namespace main;


use App\Queue;
use App\QueueException;
use http\Exception\UnexpectedValueException;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    private static $queue;

    protected function setUp(): void
    {
        static::$queue->clear();
    }

    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue();

    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$queue->getCount());
    }
    public function testAddNewItemToQueue()
    {
        $item = 'Green';
        static::$queue->push($item);
        $this->assertEquals(1, static::$queue->getCount());
        $this->assertEquals($item, static::$queue->pop());

    }
    public function testRemoveITemFromQueue()
    {
        $item = 'Green';
        static::$queue->push($item);
        $this->assertEquals(1, static::$queue->getCount());
        $removedItem = static::$queue->pop();
        $this->assertEquals($item, $removedItem);
        $this->assertEquals(0, static::$queue->getCount());

    }
    public function testRemoveITemFromTheFrontOfTheQueue()
    {
        static::$queue->push('First');
        static::$queue->push('Second');

        $this->assertEquals('First', static::$queue->pop());
    }
    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++){
            self::$queue->push($i);
        }
        $this->assertEquals(5, static::$queue->getCount());
        $this->expectException(QueueException::class);
        // This line will throw an exception
        static::$queue->push('more than 5 !!!');
    }

}