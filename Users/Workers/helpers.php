<?php
    require_once 'C:\xampp\htdocs\GC_Implementation\sql\sqlhelpers.php';
    require_once 'C:\xampp\htdocs\GC_Implementation\Blockchain\helpers.php';

    function isLoggedIn(){
        session_start();
        if($_SESSION['loggedin'] == TRUE && $_SESSION['usertype'] == 'worker'){
            return TRUE;
        }
        else{
            $message = "Unauthorized Access.";
            header("Location: index.php?message=$message");
            exit;
        }

    }

    function get_incentive_received(){
        $user_name = $_SESSION['userdata']['username'];
        $incentives_received = get_incentive_sum($user_name);
        if ($incentives_received == null) {
            $incentives_received = 0;
        }
        $incentives_withdrawn = get_withdrawal_sum($user_name);
        if ($incentives_withdrawn == null) {
            $incentives_withdrawn = 0;
        }
        $incentives_remaining = $incentives_received - $incentives_withdrawn;
        return $incentives_remaining;
    }
    function report_work($amount, $work_type){
        $workTable = new Table("work", "entry", "person_involved", "work_type", "amount", "status");
        $key = $workTable->noOfEntries()+1;
        $type = 'work:' . $work_type;
        $value = $amount;
        $person_involved = $_SESSION['userdata']['username'];
        $status = 'pending';
        $workTable->insert($key, $person_involved, $type, $value, $status);
    }
?>