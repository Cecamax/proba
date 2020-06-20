<?php
Class Database{
    public $servername = "localhost";
    public $username = "root";
    public $password ="";
    public $database = "employers";
    public $connection;


public function getConnection(){
    $conn = mysqli_connect($this->servername, $this->username,
    $this->password, $this->database) or die("Connection faild:" .
    mysqli_connect_error());

    if(mysqli_connect_error()){
        printf("Connection faild: %s\n", mysqli_connect_error());
        exit();
    }else{
        $this->connection =$conn;
    }

    return $this->connection;
    }
}
?>