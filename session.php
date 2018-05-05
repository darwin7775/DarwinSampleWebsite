<?php
session_start();
    ini_set('display_errors',1);
include('dbcon.php');

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['MemberID']) || (empty(trim($_SESSION['MemberID'])))) {
 echo'<script>window.location="../Adminlog";</script>';
   exit();
}

?>



