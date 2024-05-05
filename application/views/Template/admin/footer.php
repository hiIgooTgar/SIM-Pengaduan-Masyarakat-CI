	<!-- chart js -->
	<script src="<?= base_url(); ?>assets/template_a/js/plugins/chart.js"></script>

	<!-- js -->
	<script src="<?= base_url(); ?>assets/template_a/js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url(); ?>assets/template_a/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/template_a/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/template_a/js/main.js"></script>

	<!-- The javascript plugin to display page loading on top-->
	<script src="<?= base_url(); ?>assets/template_a/js/plugins/pace.min.js"></script>

	<!-- Page specific javascripts-->
    <script src="<?= base_url(); ?>assets/template_a/js/plugins/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/template_a/js/plugins/jquery-ui.custom.min.js"></script>
    <script src="<?= base_url(); ?>assets/template_a/js/plugins/fullcalendar.min.js"></script>

	<!-- sweet alert js -->
	<script src="<?= base_url(); ?>assets/template_a/js/plugins/sweetalert.all.min.js"></script>

	 <!--Datatables -->
	<script src="<?= base_url() ?>assets/front-end/js/plugins/datatables/datatables.min.js"></script>
		<script src="<?= base_url() ?>assets/front-end/js/plugins/datatables/dataTables.responsive.min.js"></script>
		<script>
		$(document).ready(function() {

			var table = $('#tableMobileAdmin').DataTable({
				responsive: true
			})
			.columns.adjust()
			.responsive.recalc();
		});
		</script>




	<!-- ========================================================= -->

	<!-- isi tanggal / inputan type date secara otomatif -->
	<script>
	function getFormattedDate() {
		const now = new Date();
		const year = now.getFullYear();
		const month = String(now.getMonth() + 1).padStart(2, '0');
		const day = String(now.getDate()).padStart(2, '0');
		return `${year}-${month}-${day}`;
	}

	document.getElementById('tanggal').value = getFormattedDate();
	</script>


	<!-- assets sweet alert -->
	<script>
    <?php if ($this->session->flashdata('notif_login')): ?>
        Swal.fire({
            icon: 'success',
            title: '<?= $this->session->flashdata('notif_login') ?>',
            timer: 1500,
            footer: 'SIM Pengaduan',
            showCancelButton: false,
            showConfirmButton: false
        });
    <?php endif; ?>
	</script>


	<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->



	<!-- sweet alert redirect -->

	<?php 
		$notif = $this->session->flashdata('notif');
		$sweetAlertType = $this->session->flashdata('sweet_alert');

		if (isset($notif)) {
			?>
			<script>
				Swal.fire({
					title: "Success",
					text: "<?= $notif ?>",
					icon: "<?= $sweetAlertType ?>",
				});
			</script>
			<?php
		}
	?>

<script>
		function confirmLogout(event, url) {
		event.preventDefault(); // Mencegah tindakan default dari link
		
		Swal.fire({
			title: 'Apakah kamu ingin Logout?',
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#0284c7',
			cancelButtonColor: '#dc3545',
			confirmButtonText: 'Logout',
			footer: 'SIM Pengaduan',
		}).then((result) => {
			if (result.isConfirmed) {
			// Redirect hanya jika konfirmasi diterima
			window.location.href = url;
			}
		});
		}
	</script>

	<!-- sweet alert confirmasi hanya untuk 1 deletean  -->
	<script>
    function confirmDelete(event, url) {
        event.preventDefault(); // Mencegah tindakan default dari link
        
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0284c7',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Ya, yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect hanya jika konfirmasi diterima
                window.location.href = url;
            }
        });
    }
</script>



<?php if ($this->session->flashdata('error_message')) { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= $this->session->flashdata('error_message') ?>',
        });
    </script>
<?php } ?>

<?php if ($this->session->flashdata('success_message')) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= $this->session->flashdata('success_message') ?>',
        });
    </script>
<?php } ?>


	<!-- sweet alert end js -->

    <!-- <script>
      const labels = ["January", "February", "March", "April", "May", "June", "July"];
		const data = {
			labels: labels,
			datasets: [
				{
					label: "My First dataset",
					borderColor: "rgba(220,220,220,1)",
					backgroundColor: "rgba(220,220,220,0.2)",
					pointBackgroundColor: "rgba(220,220,220,1)",
					pointBorderColor: "#fff",
					pointHoverBackgroundColor: "#fff",
					pointHoverBorderColor: "rgba(220,220,220,1)",
					data: [65, 59, 80, 81, 56, 66, 74]
				},
				{
					label: "My Second dataset",
					borderColor: "rgba(151,187,205,1)",
					backgroundColor: "rgba(151,187,205,0.2)",
					pointBackgroundColor: "rgba(151,187,205,1)",
					pointBorderColor: "#fff",
					pointHoverBackgroundColor: "#fff",
					pointHoverBorderColor: "rgba(151,187,205,1)",
					data: [28, 48, 40, 19, 86, 76, 55]
				}
			]
		};

		const config = {
			type: 'line',
			data: data,
			options: {
				scales: {
					x: {
						beginAtZero: true
					},
					y: {
						beginAtZero: true
					}
				}
			}
		};

		const ctx = document.getElementById('lineChartDemo').getContext('2d');
		new Chart(ctx, config);


	  
      var pdata = [
      	{
      		value: 300,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "Red"
      	},
      	{
      		value: 50,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Green"
      	},
      	{
      		value: 100,
      		color: "#FDB45C",
      		highlight: "#FFC870",
      		label: "Yellow"
      	}
      ]
      
      
      var ctxd = $("#doughnutChartDemo").get(0).getContext("2d");
      var doughnutChart = new Chart(ctxd).Doughnut(pdata);
    </script> -->

</body>
</html>