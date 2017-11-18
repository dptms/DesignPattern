<?php
interface Db
{
    public function connect($host, $user, $password, $dbName);
    public function query($sql);
    public function close();
}

class Mysql implements Db
{
    private $_link;
    public function connect($host, $user, $password, $dbName)
    {
        $this->_link = mysql_connect($host, $user, $password, $dbName);
        mysql_select_db($dbName, $_link);
    }
    public function query($sql)
    {
        return mysql_query($sql, $this->_link);
    }
    public function close()
    {
        mysql_close();
    }
}

class PDOdb implements Db
{
    private $_link;
    public function connect($host, $user, $password, $dbName)
    {
        $this->_link = new PDO("mysql:host={$host};dbname={$dbName}", $user, $password);
    }
    public function query($sql)
    {
        return $this->_link->query($sql, 1);
    }
    public function close()
    {
        unset($this->_link);
    }
}

$pdo = new PDOdb;
$pdo->connect('localhost', 'root', 'root', 'mvc');
$sql = 'select * from `match`';
foreach ($pdo->query($sql) as $value) {
    echo $value->score;
}
