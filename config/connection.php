<?php
class Connection {

    private $username = "root";
    private $password = "";
    private $hostname = "localhost";
	//public  $baseurl  = "http://swc";
    public  $baseurl  = "http://localhost/stanns/swc/";

    //connection to the database

    public function __construct() {
        $dbhandle = mysql_connect($this->hostname, $this->username, $this->password)
        or die("Unable to connect to MySQL");
        mysql_select_db('school', $dbhandle);

        if ($_GET['action'] == 'logout') {
            unset($_SESSION['user']);
            header('Location:'.$this->baseurl);

        }
    }

}

