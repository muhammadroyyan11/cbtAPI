<?php
	/******************************************************************
		APLIKASI TRY OUT ONLINE
		WRITTEN and DEVELOPED by : Agi Nugraha
		HOME PAGE : www.jayvyn-host.com
		EMAIL ADDRESS : agi@jayvyn-host.com	
		COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
	*******************************************************************/
?>

<?php
	if(isset($_SESSION['user_id'])) { //jika variabel berisi id_user
		if (($_SESSION['role'] == 1) or ($_SESSION['role'] == 2)) {
		?>
		
		<?php include 'view5.php'; ?>
		
		<div class="subjudul">
			Pesan
		</div>
		<div class="clear"></div>	
		<div class="wrapper" >
			<div class="box">
				<img src="<?php echo base_url(); ?>assets/css/images/warning.png"><br/>
				<?php echo $pesan; ?><br/><br/>
				<button class="tombol1" onclick="goBack()">Back</button>
			</div>
			<script>
				function goBack() {
					window.history.back();
				}
			</script>
			<?php include 'view3.php'; ?>
		<?php
		}
		else
		{
		?>		
		<?php include 'view5.php'; ?>
		<div class="wrapper">
			<div class="container">	
				<div class="row" >
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading" style="background:#FFB94A;color:#fff;">PERINGATAN</div>
							<div class="panel-body text-center">
								<p>Anda harus login sebagai <b>Administrator</b>.  </p><br/><p><a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>">Login</a></p>
							</div></div></div>
							<div class="col-md-4"></div>
				</div>
			</div>
		</div>
		<?php
		}
		}else{
	?>
	<?php include 'view5.php'; ?>
	<div class="wrapper">
		<div class="container">	
			<div class="row" >
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading" style="background:#FFB94A;color:#fff;">PERINGATAN</div>
						<div class="panel-body text-center">
							<p>Anda belum login. </p><br/><p><a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>">Login</a></p>
						</div></div></div>
						<div class="col-md-4"></div>
			</div>
		</div>
		</div><?php
	}
?>	