<?php
abstract class EventGenerate
{
    protected $_observers = [];
    public function addObserver(Observer $observer)
    {
        $this->_observers[] = $observer;
    }
    protected function notify()
    {
        foreach ($this->_observers as $observer) {
            $observer->update();
        }
    }
}

interface Observer
{
    public function update();
}

class EventA extends EventGenerate
{
    public function trigger()
    {
        echo '事件A发生了！快去通知观察者做出相应的更新！AAAA<br>';
        $this->notify();
    }
}

class EventB extends EventGenerate
{
    public function trigger()
    {
        echo '事件B发生了！快去通知观察者做出相应的更新！BBBB<br>';
        $this->notify();
    }
}

class ObserverA implements Observer
{
    public function update()
    {
        echo '观察者A已收到通知，更行ing...执行A计划...<br>';
    }
}

class ObserverB implements Observer
{
    public function update()
    {
        echo '观察者A已收到通知，更行ing...执行B计划...<br>';
    }
}

$eventA = new EventA();
$eventA->addObserver(new ObserverA);
$eventA->addObserver(new ObserverB);
$eventA->trigger();

$eventB = new EventB();
$eventB->addObserver(new ObserverB);
$eventB->addObserver(new ObserverA);
$eventB->trigger();
