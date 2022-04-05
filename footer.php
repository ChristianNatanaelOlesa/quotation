<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>

<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
</script>

<script type="text/javascript">
    $(document).ready( function() {
      $('#search').on('keyup', function() {
        $.ajax({
          type: 'POST',
          url: 'search.php',
          data: {
            search: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#tampil').html(data);
          }
        });
      });
    });
 </script>



</body>
</html>