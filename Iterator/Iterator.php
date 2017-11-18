<?php
//需要实现标准库中的 Iterator
class AllUser implements \Iterator
{

    private $_ids   = [];
    private $_index = 0;

    public function __construct()
    {
        $mysql      = mysqli_connect('localhost', 'root', 'root', 'la51');
        $res        = $mysql->query('select `id` from `users` order by `id`');
        $this->_ids = $res->fetch_all(MYSQLI_ASSOC);
    }

    public function current()
    {
        return $this->_ids[$this->_index];
    }

    public function next()
    {
        $this->_index++;
    }

    public function key()
    {
        return $this->_index;
    }

    public function valid()
    {
        return $this->_index < count($this->_ids);
    }

    public function rewind()
    {
        $this->_index = 0;
    }
}

$users = new AllUser();
foreach ($users as $user) {
    var_dump($user);
}
