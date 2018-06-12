<?php
include '../../secret/db.php';
include '../library.php';

    if(isset($_GET['add'])){
        $getDate = $_GET['getDate'];
        $room_no = $_GET['room_no'];
        $cust_id = $_GET['cust_id'];
        $booking = new Booking();
        $booking->run("INSERT INTO booking(date, room_id, cust_id) 
                        VALUES('".$getDate."','".$room_no."','".$cust_id."')");
        echo "Booking Added";

    }
?>