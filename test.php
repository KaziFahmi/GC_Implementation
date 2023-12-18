<?php
require_once "sql/sqlhelpers.php";

function main()
{
    
    $table = new Table("work", "entry", "person_involved", "work_type", "amount", "status");
    $table->deleteAll();
    


}

main();
