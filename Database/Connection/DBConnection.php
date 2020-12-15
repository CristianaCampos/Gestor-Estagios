<?php
class DBConnection
{
    var $servername = "localhost";
    var $username = "root";
    var $password = "";
    var $dbname = "capaEstagiodb";
    var $port = "3306";

    var $conn;

    function __construct()
    {
        #text-here
    }

    public function open()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname, $this->port);

        if (!$this->conn) {
            die("Ligação falhou: " . mysqli_connect_error());
        }
    }

    public function close()
    {
        mysqli_close($this->conn);
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function setServerName($server)
    {
        $this->servername = $server;
    }

    public function getServerName()
    {
        $this->servername;
    }

    public function setUserName($user)
    {
        $this->username = $user;
    }

    public function getUserName()
    {
        $this->username;
    }

    public function setPassword($pass)
    {
        $this->password = $pass;
    }

    public function getPassword()
    {
        $this->password;
    }

    public function setDatabaseName($name)
    {
        $this->dbname = $name;
    }

    public function getDatabaseName()
    {
        $this->dbname;
    }

    public function setPorts($dbPorts)
    {
        $this->port = $dbPorts;
    }

    public function getPorts()
    {
        $this->port;
    }
}