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
		
		<div class="container">
			<div class="row" >	
				<div class="col-md-2" >
					<?php include 'view40.php'; ?>
				</div>
				<div class="col-md-10 plr15" >
					<div class="subjudul">
						<div class="container">
							<div class="row" >
								<div class="col-md-12 plr15" >
									<h4>EDIT JURUSAN</h4>
								</div>
							</div>
						</div>
					</div>				
					<div class="clear"></div>		
					<div class="wrapper">	
						<div class="container">
							<div class="row plr15" >
								
								<form class="form-horizontal" action="<?php echo site_url('simpaneditjurusan');?>" method="POST">
									<div class="col-md-6">		
																				<div class="form-group">
											<label class="col-md-4">Kode Jurusan</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="kode_jurusan" class="form-control input-sm" value="<?php echo $jurusan->kode_jurusan;?>" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Pilihan Jurusan</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="pil_jurusan" class="form-control input-sm" value="<?php echo $jurusan->pil_jurusan;?>" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Standar Nilai Lulus</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="snl" class="form-control input-sm" value="<?php echo $jurusan->standar_nilai;?>" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Nama Universitas</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="nama_univ" class="form-control input-sm" value="<?php echo $jurusan->nama_univ;?>" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Program Studi</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="ps" class="form-control input-sm" value="<?php echo $jurusan->program_studi;?>" required>
												</div>
											</div>
										</div>
										<div class="form-group">  
											<div class="col-md-4">   
											</div>
											<div class="col-md-8">  
												<input type="hidden" name="id" value="<?php echo $jurusan->id;?>" />
												<input class="btn btn-success btn-sm mr15" type="submit" value="Simpan" /><a class="btn btn-danger btn-sm" href="<?php echo site_url('jurusan');?>">Back </a>
												</div>
										</div>
									</div>
									<div class="col-md-6">
										
									</div>
								</form>				
							</div>	
						</div>										
						<div class="clear"></div>						
					</div>
				</div>
			</div>
		</div>
		
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