<?php

require_once 'C:\xampp\htdocs\GC_Implementation\sql\sqlhelpers.php';
require_once 'Chain.php';
function get_blockchain()
{
    $blockchain = new Chain();
    $blockchainTable = new Table("blockchain", "number", "hash", "previous", "type", 'value', "person_involved", "nonce");

    foreach ($blockchainTable->getAll() as $blockData) {
        $blockchain->add(
            new Block(
                (int) $blockData["number"],
                $blockData["previous"],
                $blockData["type"],
                (int) $blockData["value"],
                $blockchain['person_involved'],
                (int) $blockData["nonce"]
            )
        );
    }

    return $blockchain;
}

function sync_blockchain($blockchain)
{
    if ($blockchain->isValid()) {
        $blockchainTable = new Table("blockchain", "number", "hash", "previous", "type", "value", "person_involved", "nonce");
        $blockchainTable->deleteAll();

        foreach ($blockchain->chain as $block) {
            $blockchainTable->insert(
                (string) $block->number,
                $block->hash,
                $block->previousHash,
                $block->type,
                $block->value,
                $block->person_involved,
                $block->nonce
            );
        }
        return TRUE;
    } else {
        return FALSE;
    }
}

function get_donation_sum($person_involved)
{
    $result = sql_raw("SELECT SUM(value) AS donation_sum FROM `blockchain` WHERE type = 'donation' AND person_involved = '$person_involved'");
    return $result['donation_sum'];
}

function get_all_donation_sum()
{
    $result = sql_raw("SELECT SUM(value) AS total_donations FROM `blockchain` WHERE type = 'donation'");
    return $result['total_donations'];
}

function get_incentive_sum($person_involved)
{
    $result = sql_raw("SELECT SUM(value) AS incentive_sum FROM `blockchain` WHERE type = 'incentive' AND person_involved = '$person_involved'");
    return $result['incentive_sum'];
}

function get_all_incentive_sum()
{
    $result = sql_raw("SELECT SUM(value) AS total_incentive FROM `blockchain` WHERE type = 'incentive'");
    return $result['total_incentive'];
}

function get_withdrawal_sum($person_involved)
{
    $result = sql_raw("SELECT SUM(value) AS withdrawal_sum FROM `blockchain` WHERE type = 'withdraw' AND person_involved = '$person_involved'");
    return $result['withdrawal_sum'];
}

// function get_conservation_work($person_involved)
// {
//     $result = sql_raw("SELECT SUM('value') as sum FROM 'blockchain' WHERE person_involved='$person_involved' AND type='work:conservation'");
//     return $result['sum'];
// }

// function get_reforestation_work($person_involved)
// {
//     $result = sql_raw("SELECT SUM('value') as sum FROM 'blockchain' WHERE person_involved='$person_involved' AND type='work:reforestation'");
//     return $result['sum'];
// }
