Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
		Profil Saya
		<small>Profil Admin</small>
		</h1>

		<ol class="breadcrumb">
			<li><a href="<?=base_URL()?>admin/dashboard"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-user-circle text-aqua"></i>&nbsp; Profil Saya</li>
		</ol>
	</section>

	<?php
	$foto = 'avatar.jpg';
	if($ps['foto'] && file_exists('assets/backend/images/admin/'.$ps['foto'])) {
	$foto = $ps['foto'];
	}
	?>
	<!-- Main content -->
	<section class="content">
	<?php
		if ($this->session->flashdata('simpan')) {
			echo "<div class='callout callout-success' id='alert'>
			<h4><i class='icon fa fa-check'></i>&nbsp; BERHASIL</h4>
			<p>".$this->session->flashdata('simpan')."</p>
			</div>";

	} else if ($this->session->flashdata('gagal')) {
		echo "<div class='callout callout-danger' id='alert'>
		<h4><i class='icon fa fa-ban'></i>&nbsp; GAGAL</h4>
		<p>".$this->session->flashdata('gagal')."</p>
		</div>";

	} else if ($this->session->flashdata('salah')) {
		echo "<div class='callout callout-warning' id='alert'>
		<h4><i class='icon fa fa-warning'></i>&nbsp; PERINGATAN</h4>
		<p>".$this->session->flashdata('salah')."</p>
		</div>";
	}
?>

<?=form_open_multipart('admin/profil_saya', 'role="form"')?>
<?=form_hidden('id_admin', $ps['id_admin'])?>
<div class='row'>
	<div class='col-md-3'>
		<div class='box box-success'>
			<div class='box-body box-profile'>
				<img class='profile-user-img img-responsive img-circle' src='<?=base_URL().'assets/backend/images/admin/'.$foto?>' alt='foto profil' style='width: 167px; height: 167px;'>
				<h3 class='profile-username text-center'><?=$ps['nama_admin']?></h3>
				<p class='text-muted text-center'>Administrator</p>
				<ul class='list-group list-group-unbordered'>
					<li class='list-group-item'>
						<div class='row' align='center'>
							<font size='4px'>
							<div class='col-xs-4'>
								<b><a href='https://www.facebook.com/' target='_blank' title='Buka Facebook'><i class='fa fa-facebook'></i></a></b>
							</div>
							<div class='col-xs-4'>
								<b><a href='https://www.twitter.com/' target='_blank' title='Buka Twitter'><i class='fa fa-twitter'></i></a></b>
							</div>
								<div class='col-xs-4'>
								<b><a href='https://www.instagram.com/' target='_blank' title='Buka Instagram'><i class='fa fa-instagram'></i></a></b>
							</div>
							</font>
						</div>
					</li>
				</ul>
				<ul class='list-group list-group-unbordered'>
				<li class='list-group-item'>
				<input type='file' name='foto' class='form-control btn btn-sm' title='Ganti Foto Profil'>
				</li>
				</ul>
			</div>
		</div>
	</div>
		<div class='col-md-9'>
		<div class='box box-success'>
			<!-- /.box-header -->
			<div class='box-body'>
				<div class='row'>
					<div class="col-md-12">
						<div class="box-body">
							<div class="form-group">
							<label class="control-label">USERNAME</label>
								<div class="input-group">
								<div class="input-group-addon">
	                            	<i class="fa  fa-black-tie"></i>
	                            </div>
							<input type="text" class="form-control" name="username" value="<?=$ps['username']?>" maxlength="20" placeholder="USERNAME" readonly>
							</div>
						</div>
					</div>
				</div>

					<div class="col-md-12">
						<div class="box-body">
							<div class="form-group">
							<label>Nama Admin</label>
							<div class="input-group">
								<div class="input-group-addon">
	                            	<i class="fa  fa-black-tie"></i>
	                            </div>
							<input type="text" class="form-control" name="nama_admin" value="<?=$ps['nama_admin']?>" maxlength="30" placeholder="Nama Admin">
							</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="box-body">
							<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" maxlength="50" placeholder="Password">
							</div>
						</div>
					</div>
		</div>
	</div>
			
				<div class='box-footer'>
					<button type='submit' name='submit' class='btn btn-success btn-flat'>Simpan</button>
					<a href='<?=base_URL()?>admin/dashboard' type='button' class='btn btn-warning btn-flat pull-right'>Batal</a>
				</div>
	</div>
</div>
<?=form_close()?>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper