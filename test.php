<?php
require_once "sql/sqlhelpers.php";
require_once "Blockchain/helpers.php";

function main()
{

    $blockchain = new Table("blockchain", "number", "hash", "previous", "type", "value", "person_involved", "nonce");
    // $blockchain->drop();

    // $blockchain->insert("1", "1234", "0000", "donation", "1000", "fahmi", "1234");
    // $blockchain->insert("2", "2345", "1234", "donation", "1000", "anne", "1234");
    // $blockchain->insert("3", "3456", "2345", "work:reforestation", "5", "dulok", "1234");
    // $blockchain->insert("4", "4567", "3456", "work:conservation", "6", "shahil", "1234");
    // $blockchain->insert("5", "5678", "4567", "incentive", "500", "dulok", "1234");
    // $blockchain->insert("6", "6789", "5678", "donation", "600", "shahil", "1234");
    // $blockchain->insert("5", "7890", "6789", "incentive", "900", "turzo", "1234");
    // $blockchain->insert("6", "2828", "7890", "withdraw", "300", "dulok", "1234");
    // $blockchain->insert("5", "8584", "2828", "withdraw", "500", "turzo", "1234");


}

main();
