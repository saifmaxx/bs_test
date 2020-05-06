 <?php

Class Dbconnection{
    function getdbconnect(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "php_test";
		
        $conn = mysqli_connect($servername,$username,$password,$dbname) or die("Couldn't connect");

		return $conn;
	}
}

?>