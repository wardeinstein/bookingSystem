<?php
include '../../secret/db.php';
include '../library.php';

    if(isset($_POST['getDate'])){
        $getDate = $_POST['getDate'];
        $booking = new Booking();
        $booking->showbooking($getDate);

    }
?>