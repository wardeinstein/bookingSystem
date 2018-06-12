<?php
include 'secret/db.php';
include 'includes/library.php';

$top = new Top();
$top->toppart("Dashboard");

?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php 

$header = new Header();
$header->header();
?>

  <div class="content-wrapper">
    <div class="container-fluid">
<?php 

include 'includes/pages/booking.php';

?>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php 
$footer = new Footer();
$footer->footer();
?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Custom scripts-->
    <script src="js/main.js"></script>
  </div>
</body>
</html>
