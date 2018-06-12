      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <div class="text-center">
          <?php if(isset($_GET['add'])){
                include 'includes/pages/add.php';
               }else if(isset($_GET['edit'])){
              include 'includes/pages/edit.php';
              }else if(isset($_GET['delete'])){
              include 'includes/pages/delete.php';
              }
        ?>
            <h3>Please select a date to view the booking</h3>
            <input type="date" name="date" class="datepicker" />
            <div id='displayTable' ></div>
          </div>
        </div>
      </div>