<?php
//这是一个画星阵图的类
class Canvas
{
    public $_data = [];
    public function init($width = 30, $height = 30)
    {
        $data = [];
        for ($i = 0; $i < $height; $i++) {
            for ($j = 0; $j < $width; $j++) {
                $data[$i][$j] = '＊';
            }
        }
        $this->_data = $data;
    }

    public function draw()
    {
        foreach ($this->_data as $v) {
            foreach ($v as $vv) {
                echo $vv;
            }
            echo '<br>';
        }
    }

    public function rect($x1, $y1, $x2, $y2)
    {
        foreach ($this->_data as $k => $v) {
            if ($k < $y1 || $k > $y2) {
                continue;
            }
            foreach ($v as $kk => $vv) {
                if ($kk >= $x1 && $kk <= $x2) {
                    $this->_data[$k][$kk] = '&nbsp;&nbsp;&nbsp;';
                }
            }
        }
    }
}
//初始化的工作会有很多，比如循环很多次 消耗资源更多
$prototype = new Canvas();
$prototype->init(50, 30);
//再新建画布的话就不需要init初始化 节省重复性代码，重复性计算
$canvas1 = clone $prototype;
$canvas1->rect(11, 5, 40, 25);
$canvas1->draw();

$canvas1 = clone $prototype;
$canvas1->rect(5, 5, 30, 20);
$canvas1->draw();
