<?php
require_once "sql/sqlhelpers.php";

function main(){
    
    $blockchain_table = new Table("blockchain", "number", "hash", "previous", "data", "nonce");
    // $blockchain_table->insert("1", "1234", "0000", "Block 1 Data", "1234");
    // $blockchain_table->insert("2", "2345", "1234", "Block 2 Data", "1234");
    // $blockchain_table->insert("3", "3456", "2345", "Block 3 Data", "1234");
    // $blockchain_table->insert("4", "4567", "3456", "Block 4 Data", "1234");

    print($blockchain_table->getOne("number", "3")["data"]);

    // print("Before Delete One <br>");
    // $all_data = $blockchain_table->getAll();
    // foreach($all_data as $row){
    //     print($row['data']);
    //     print("<br>");
    // }

    // $blockchain_table->deleteOne("number", "2");

    // print("After Delete One <br>");
    // $all_data = $blockchain_table->getAll();
    // foreach($all_data as $row){
    //     print($row['data']);
    //     print("<br>");
    // }

    
}

main();

?>