<?php
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
        $incentive_received = get_incentive_sum($user_name);
        if ($incentive_received == null) {
            $incentive_received = 0;
        }
        return $incentive_received;
    }
    function report_work($amount, $work_type){
        $blockchain = get_blockchain();
        $type = 'work:' . $work_type;
        $value = $amount;
        $person_involved = $_SESSION['userdata']['username'];
        $blockchain->mine(new Block(type:$type, value: $value, person_involved: $person_involved));
        $status = sync_blockchain($blockchain);
        
        return $status;
    }
?>