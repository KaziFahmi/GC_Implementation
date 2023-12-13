<?php

	function connect(){
        $HOST = 'localhost';
        $USER = 'root';
        $PASS = '';
        $DB = 'gc_blockchain';
        $conn = mysqli_connect( $HOST, $USER, $PASS, $DB)
                or die("Can not connect");
        return $conn;
    }
    function disconnect($conn){
        $conn->close();
    }
    
?>