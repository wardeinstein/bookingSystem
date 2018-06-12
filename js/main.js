(function() {
  $(".datepicker").change(function() {
    var getDate = this.value;
    $.ajax({
        type: "POST",
        url: "includes/widgets/booking_view.php",
        data: "getDate="+getDate,
        success: function (data) {
          $('#displayTable').html(data); 
        }
      });

});
  
})(jQuery);