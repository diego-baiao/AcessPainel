<?php

class Connection {

    private string  $db_driver;
    private string  $db_host; 
    private string  $db_port; 
    private string  $db_name;
    private string  $db_user;
    private string  $db_password;

    public function __construct($db_driver = null, $db_host = null, $db_port = null, $db_name = null, $db_user = null, $db_password = null){
        $this->db_driver    = $db_driver;
        $this->db_host      = $db_host;
        $this->db_port      = $db_port;
        $this->db_name      = $db_name;
        $this->db_user      = $db_user;
        $this->db_password  = $db_password;
    }

    public function openConn (){
        $db_mount = $this->db_driver.":host=".$this->db_host." port=".$this->db_port." dbname=".$this->db_name." user=".$this->db_user." password=".$this->db_password;
        try {
            $pdo = new \PDO($db_mount);
            return $pdo;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function statusConn(){
      $pdo = $this->openConn();
        if ($pdo) {
            echo "<h3>O sistema está conectado à  [$this->db_name] em [$this->db_host].</h3>";
        }else{
            echo "<h3>O sistema não está conectado à  [$this->db_name] em [$this->db_host].</h3>";
        }
    }

    function closeConn(){
      $pdo = $this->openConn();
        if ($pdo) {
            @pg_close($pdo);
            echo "<h3>Conexão encerrada à [$this->db_name] em [$this->db_host].</h3>";
        }
    }

}