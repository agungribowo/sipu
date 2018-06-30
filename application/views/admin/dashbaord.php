<?php
$usr = $this->db->get_where('tbl_admin', array('username' => $this->session->userdata('username')))->row_array();
$foto = 'avatar.jpg';
if($usr['foto'] && file_exists('assets/backend/images/pengguna/'.$usr['foto'])) {
$foto = $usr['foto'];
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	Dashboard
	<small>Control Manager</small>
	</h1>
	<ol class="breadcrumb">
	<li class="active"><i class="fa fa-dashboard"></i> <span>Dashboard</span></li>
	</ol>
</section>

<!-- Main content -->
	<section class="content">

	<!-- Info boxes -->
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-object-group"></i></span>
					<div class="info-box-content"><br>
						<a href="<?=base_URL()?>kategori/list_kategori" class="info-box-text">Kategori Paket</a>
							<span class="info-box-number"><?=$kate?></span>
					</div>
			<!-- /.info-box-content -->
			</div>

		<!-- /.info-box -->
		</div>
		<!-- /.col -->

	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-blue"><i class="fa fa-ticket"></i></span>
				<div class="info-box-content"><br>
					<span class="info-box-text">Pemesanan</span>
						<span class="info-box-number"><?=$pms?></span>
				</div>
				<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-maroon"><i class="fa fa-image"></i></span>
				<div class="info-box-content"><br>
					<span class="info-box-text">Galeri</span>
						<span class="info-box-number"><?=$glr?></span>
				</div>
				<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	</div>
	<!-- /.row -->
<div class="callout callout-success">
<h4>Welcome !</h4>
<p>Hai, <b><u><?=$usr['nama_admin']?></u></b>
Selamat datang di <b><i>Sistem Informasi Pemesanan Umroh (SIP UMROH)</i></b>.</p>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->