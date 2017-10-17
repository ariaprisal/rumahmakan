<!-- bundle_script.php -->

<script src="../assets/jquery/dist/jquery.min.js"></script>
<script src="../assets/dist/js/adminlte.min.js"></script>
    <!-- jQuery 2.1.4 -->
<!--     <script src="../assets/jquery/jQuery-2.1.4.min.js"></script> -->
    <!-- Bootstrap 3.3.5 -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../assets/datatables/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../assets/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/app.min.js"></script>
	<!-- Daterange Picker -->
	<script src="../assets/daterangepicker/moment.min.js"></script>
	<script src="../assets/daterangepicker/daterangepicker.js"></script>
	<script src="../assets/select2/select2.full.min.js"></script>
	<script src="../assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script src="../assets/chartjs/Chart.min.js"></script>
	<!-- page script -->

	<!--  -->
	<script src="../assets/datepicker/bootstrap-datepicker.js"></script>

    <script>
      $(function () {	
		// Daterange Picker
		$('#tanggal').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			format: 'YYYY-MM-DD'
		});
		
		  // Data Table
        $("#tabel_menu").dataTable({
        	"dom": '<"top"i>rt<"bottom"flp><"clear">',
		});	

      });
    </script>
	
	<!-- Javascript Edit--> 
	<script type="text/javascript">
		$(document).ready(function () {
			
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "menu_modal_edit.php",
					type: "GET",
					data : {id_menu: m,},
					success: function (ajaxData){
					$("#modal_edit_menu").html(ajaxData);
					$("#modal_edit_menu").modal('show',{backdrop: 'true'});
					}
				});
			});

			$(".open_modal_detail").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "menu_modal_detail.php",
					type: "GET",
					data : {id_menu: m,},
					success: function (ajaxData){
					$("#modal_detail").html(ajaxData);
					$("#modal_detail").modal('show',{backdrop: 'true'});
					}
				});
			});

		});
	</script>
	
	<!-- Javascript Delete -->
	<script>
		function confirm_delete(delete_url){
			$("#modal_delete").modal('show');
			document.getElementById('delete_link').setAttribute('href', delete_url);
		}


	</script>
	<!-- Delete -->

	<script>
      $(function () {

        $("#data").dataTable({
			scrollY: 200,
			scrollX: true
		});	
      });
    </script>