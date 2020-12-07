<?php
class Connection
{
    protected $con = null;
    private $host = "localhost";
    private $dbname = "trueque_test";
    private $user = "root";
    private $pass = "";

    function __construct()
    {
        try {
            $this->con = new PDO("mysql:host={$this->host}; dbname={$this->dbname}", $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    function close_connection()
    {
        if ($this->con != null) $this->con = null;
    }
}
