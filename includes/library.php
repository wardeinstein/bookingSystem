<?php
    
class Top{
    function toppart($pageName){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Hotel Booking System - <?php echo $pageName;?></title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
    <?php
    }
}

class Header{    
    function header(){
?>
      <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Hotel Booking System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
<?php
    }
}

class Booking extends DB{

    public function getbooking($date_select){ // get the booking data in a selected date
        $query = "SELECT * FROM booking b, customer c, room r 
                  WHERE b.room_id = r.room_id AND b.cust_id = c.cust_id AND b.date = '".$date_select."'";	
        $result = $this->connect()->query($query);
        $numRows = $result->num_rows;
        if($numRows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }

    }

    public function getunbooking($date_select){ //display the available room in a selected date, in order to add booking in the future
        $query = "SELECT * FROM room r WHERE NOT EXISTS (SELECT 1 FROM booking b, customer c
                  WHERE b.room_id = r.room_id AND b.cust_id = c.cust_id AND b.date = '".$date_select."')";	
        $result = $this->connect()->query($query);
        $numRows = $result->num_rows;
        if($numRows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }

    }

    public function showbooking($date_select){ //show all rooms(booked and unbooked) info
        $datas = $this->getbooking($date_select);
        $datas_unbooked = $this->getunbooking($date_select);
            echo "
            <!-- The table of booking-->
            <div class='card mb-3'>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                    <thead>
                      <tr>
                        <th>Room No.</th>
                        <th>Status</th>
                        <th>Customer</th>
                        <th>Add/Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>"; 
                    if($datas){
                        foreach ($datas as $data){
                        echo "<tr>
                          <td>".$data['room_no']."</td>
                          <td>Booked</td>
                          <td>".$data['cust_name']."</td>
                          <td><a href='?update=".$data['book_id']."'>Edit</a></td>
                          <td><a href='?delete=".$data['book_id']."'>x</a></td>
                        </tr>";
                        } 
                    }
                    if($datas_unbooked){
                        foreach ($datas_unbooked as $data){
                            echo "<tr>
                              <td>".$data['room_no']."</td>
                              <td>Available</td>
                              <td></td>
                              <td><a href='?add=".$data['room_no']."&date=".$date_select."'>Add</a></td>
                              <td></td>
                            </tr>";
                            }
                        } 
                    echo "</tbody>
                  </table>
                </div>
              </div>
            </div>
              <!-- The end of table -->";
    }

    public function unique_guest(){ // show total number of unique guest
        $result=mysql_query("SELECT count(cust_id) FROM customer");
        $data=mysql_fetch_assoc($result);
        return $data;
    }

    public function total_booking(){ // show total bookings
        $result=mysql_query("SELECT count(book_id) FROM booking");
        $data=mysql_fetch_assoc($result);
        return $data; 
    }

    public function guest_history($cust_id){ //fetch guests info
        $query = "SELECT * FROM booking b, customer c, room r 
                  WHERE b.room_id = r.room_id AND b.cust_id = c.cust_id AND c.cust_id = '".$cust_id."'";	
        $result = $this->connect()->query($query);
        $numRows = $result->num_rows;
        if($numRows > 0){
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
         return $data;
        }
    }

    public function run($query){ // used for add/update/delete bookings
        $result = $this->connect()->query($query);
        if($result == false){
           echo "Error";
        }else{
            return true;
        }

    }

}

class Footer{   
    function footer(){	
?>
<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Jamie Zhang 2018</small>
        </div>
      </div>
    </footer>

<?php
    }
}
?>