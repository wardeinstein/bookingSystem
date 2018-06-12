<?php
include '../../secret/db.php';
include '../library.php';

    if(isset($_POST['update'])){
        $getDate = $_POST['getDate'];
        $room_no = $_POST['room_no'];
        $cust_id = $_POST['cust_id'];
        $booking = new Booking();
        $booking->run("UPDATE booking SET date='".$getDate."', room_id='".$room_no."', cust_id= '".$cust_id."'");
        header("Location: index.php");
    }

?>