<?php
class User
{
    public $id;
    public $name;
    public $mobile;
    public $regtime;
    private $_link;

    public function __construct($id)
    {
        $this->_link = mysql_connect('localhost', 'root', 'root');
        mysql_select_db('test', $this->_link);
        $res           = mysql_query("select * from `user` where `id`={$id}");
        $res           = mysql_fetch_assoc($res);
        $this->id      = $res['id'];
        $this->name    = $res['name'];
        $this->mobile  = $res['mobile'];
        $this->regtime = $res['regtime'];
        return $this;
    }

    public function __destruct()
    {
        mysql_query("update `user` set `name`={$this->name},`mobile`={$this->mobile},`regtime`={$this->regtime}");
    }
}

$user          = new User(1);
$user->mobile  = 18888888888;
$user->name    = 'XiaoMing';
$user->regtime = time();
