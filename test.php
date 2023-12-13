<?php
require_once "sql/sqlhelpers.php";

function main(){
    
    $donors = new Table("donors", "name", "email", "username", "password"); 
    $organization = new Table("organization", "name", "email", "username", "password", "donations_received"); 
    $workers = new Table("workers", "name", "email", "username", "password", "incentive_received"); 

    
}

main();

?>