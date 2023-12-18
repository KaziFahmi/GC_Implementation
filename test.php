<?php
require_once "sql/sqlhelpers.php";
require_once "Blockchain/helpers.php";
require_once "Blockchain\Chain.php";
require_once "Blockchain\Block.php";

function main()
{
    
    // $blockchainTable = new Table("blockchain", "number", "hash", "previous", "type", 'value', "person_involved", "nonce");
    // print($blockchainTable->noOfEntries());
    // $blockchainTable->deleteAll();
    // $blockchain = get_blockchain();
    // $block = $blockchain->chain[21];
    // print($block);
    // print("<br>");
    // $block->value = 10;
    // $blockchain->mine($block);
    // if($blockchain->isValid()){
    //     print("True");
    // }
    // else{
    //     print('False');
    // }




    // $blockchain->mine(new Block(type:'donation', value: 1000, person_involved: 'fahmi'));
    // $blockchain->mine(new Block(type:'donation', value: 2000, person_involved: 'dulok'));
    // $blockchain->mine(new Block(type:'incentive', value: 200, person_involved: 'anne'));
    // $blockchain->mine(new Block(type:'incentive', value: 500, person_involved: 'shahil'));
    // $blockchain->mine(new Block(type:'Withdraw', value: 100, person_involved: 'anne'));
    // $blockchain->mine(new Block(type:'withdraw', value: 200, person_involved: 'shahil'));
    // sync_blockchain($blockchain);
    // if($blockchain->isValid()){
    //     print("Is Valid");
    // }
    // else{
    //     print("Is not Valid");
    // }

    $workTable = new Table("test", "key", "person_involved", "work_type", "amount", "status");
    // print(isNewTable($workTable->table));
    // $workTable->drop();


}

main();
