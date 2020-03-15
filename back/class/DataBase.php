<?php
class DataBase
{
    protected $connection;
    protected $query;
    protected $show_error  = true;
    protected $query_close = true;
    public $query_count = 0;

    function __construct(string $name, string $host = 'localhost', string $user = 'root', string $pass = '', string $charset = 'UTF-8')
    {
        @$this->connection = new mysqli($host, $user, $pass,$name);

        try{
            if($this->connection->connect_errno){
                throw new Exception('Incorrectly entered access of database');
            }
        } catch (Exception $e){
            $this->error($e->getMessage());
        }

        $this->connection->set_charset($charset);
    }

    public function query(string $sql)
    {
        $res = $this->connection->query($sql);
        if (is_object($res)) {
            $res = $res->fetch_assoc();

            return $res;
        }

        return $res;
    }

    public function close()
    {
        return $this->connection->close();
    }

    public function error(string $str_error)
    {
        if ($this->show_error) {
            exit("DATABASE ERROR : {$str_error}");
        }
    }

    public function is_existence(string $search, string $inColumn)
    {
        return $this->query("SELECT token, url FROM uniq_url WHERE {$inColumn} = '{$search}'");
    }
}