<?php
include '../../secret/db.php';
include '../library.php';

    if(isset($_POST['delete'])){
        $book_id = $_POST['book_id'];
        $booking = new Booking();
        $booking->run("DELETE FROM booking WHERE book_id = '".$book_id."'");
        echo "Booking Deleted";

    }
?>