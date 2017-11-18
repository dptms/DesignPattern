<?php
//装饰器接口
interface Decorator
{
    public function before();
    public function after();
}

class EchoSomeThing
{
    private $_decorators = [];
    public function addDecorator(Decorator $decorator)
    {
        $this->_decorators[] = $decorator;
    }
    public function output($words)
    {
        $this->beforeOutPut();
        echo $words;
        $this->afterOutPut();
    }
    protected function beforeOutPut()
    {
        foreach ($this->_decorators as $decorator) {
            $decorator->before();
        }
    }
    protected function afterOutPut()
    {
        $decorators = array_reverse($this->_decorators);
        foreach ($decorators as $decorator) {
            $decorator->after();
        }
    }
}

class ColorDecorator implements Decorator
{
    private $_color;

    public function __construct($_color)
    {
        $this->_color = $_color;
    }

    public function before()
    {
        echo "<div style='color:{$this->_color}'>";
    }

    public function after()
    {
        echo "</div>";
    }
}

class FontDecorator implements Decorator
{
    private $_font;

    public function __construct($font)
    {
        $this->_font = $font;
    }

    public function before()
    {
        echo "<div style='font-size:{$this->_font}'>";
    }

    public function after()
    {
        echo "</div>";
    }
}

$a = new EchoSomeThing;
$a->addDecorator(new ColorDecorator('red'));
$a->addDecorator(new FontDecorator(50));
$a->output('随便说点啥吧...');
