<?php
require_once("System/Config/Connection.php");

$pdo = new Connection("pgsql","localhost","5432","temp","postgres","y36rta42");
// $pdo->statusConn();
// $pdo->closeConn();

// connect to the PostgreSQL database
$conn = $pdo->openConn();

var_dump($_REQUEST);

$userNameToken = $_POST['username'];

if(isset($userNameToken) && !empty($userNameToken)){ 

    $query = 'SELECT COUNT(*)
                FROM "tempDois".useraccess
                WHERE usernametoken = '."'$userNameToken'";

    // echo $query;
    $stmt = $conn->query($query);
    $stmt->execute(); 
    $result =  $stmt->fetchAll(\PDO::FETCH_ASSOC);

    if($result['0']['count'] > 0){
        echo "❌ O nome já existe!";
    }else
    {
        echo "✔ OK";
    }
    exit();

} else {
    return false;
}