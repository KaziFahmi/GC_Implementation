<?php
require_once '../../Blockchain/helpers.php';
function isLoggedIn(){
        session_start();
        if($_SESSION['loggedin'] == TRUE && $_SESSION['usertype'] == 'organization'){
            return TRUE;
        }
        else{
            $message = "Unauthorized Access.";
            header("Location: index.php?message=$message");
            exit;
        }

    }

    function get_funds(){
        $donations_received = get_all_donation_sum();
        if ($donations_received == null) {
            $donations_received = 0;
        }
        $incentives_given = get_all_incentive_sum();
        if ($incentives_given == null) {
            $incentives_given = 0;
        }
        $funds_remaining = $donations_received - $incentives_given;
        return $funds_remaining;
    }

    function pay_incentive($username, $amount){
        $incentives_received = get_incentive_sum($username);
        $incentives_withdrawn = get_withdrawal_sum($username);
        $incentives_remaining = $incentives_received - $incentives_withdrawn;
        if($amount > $incentives_remaining){
            $message = urlencode("Not enough balance.");
            $messageType = urlencode("error");
            header("Location: dashboard.php?exchangeMessage=$message&exchangeMessageType=$messageType");
            exit;
        }
        else{
            $blockchain = get_blockchain();
            $type = 'withdraw';
            $value = $amount;
            $person_involved = $username;
            $blockchain->mine(new Block(type:$type, value: $value, person_involved: $person_involved));
            $status = sync_blockchain($blockchain);
            $message = urlencode("Exchange successful.");
            $messageType = urlencode("success");
            header("Location: dashboard.php?exchangeMessage=$message&exchangeMessageType=$messageType");
            exit;
        }

    }

    function accept_work($entry){
        $workTable = new Table("work", "entry", "person_involved", "work_type", "amount", "status");
        $work = $workTable->getOne('entry', $entry);
        $type = $work['work_type'];
        $value = $work['amount'];
        $person_involved = $work['person_involved'];
        $blockchain = get_blockchain();
        $blockchain->mine(new Block(type:$type, value: $value, person_involved: $person_involved));
        $status = sync_blockchain($blockchain);
        if($status = TRUE){
            sql_raw("UPDATE work SET status = 'accepted' WHERE entry = '$entry';");
        }
        return $status;
    }

    function reject_work($entry){
        sql_raw("UPDATE work SET status = 'rejected' WHERE entry = '$entry';");
    }

    function provide_incentive($entry){
        $work_to_incentive_multiplier = 1000; // can be changed according to company policy
        $workTable = new Table("work", "entry", "person_involved", "work_type", "amount", "status");
        $work = $workTable->getOne('entry', $entry);
        $type = 'incentive';
        $value = $work['amount'] * $work_to_incentive_multiplier;
        $person_involved = $work['person_involved'];
        $funds = get_funds();
        if($funds > $value){
            $blockchain = get_blockchain();
            $blockchain->mine(new Block(type:$type, value: $value, person_involved: $person_involved));
            $status = sync_blockchain($blockchain);
            return $status;
        }
        else{
            return FALSE;
        }
        
    }

?>