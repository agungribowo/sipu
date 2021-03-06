<?php
$usr = $this->db->get_where('tbl_admin', array('username' => $this->session->userdata('username')))->row_array();
$foto = 'avatar.jpg';
if($usr['foto'] && file_exists('assets/backend/images/pengguna/'.$usr['foto'])) {
$foto = $usr['foto'];
}
?>

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
	<!-- Sidebar user panel -->
	<div class="user-panel">
		<div class="pull-left image">
			<img src="<?=base_URL().'assets/backend/images/pengguna/'.$foto?>" class="img-circle" alt="User Image">
		</div>
	<div class="pull-left info">
		<p><?=$usr['nama_admin']?></p>
			<a href="javascript:void(0)"><i class="fa fa-vcard text-primary"></i> Administrasi</a>
	</div>
</div>

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
	<li class="header">MAIN NAVIGATION</li>
		<li <?php if($this->uri->segment(1)=="dashboard") { echo 'class="active"'; } ?>>
			<a href="<?=base_URL()?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
		</li>

			<li <?php if($this->uri->segment(1)=="kate" || $this->uri->segment(2)=="kate_tambah" || $this->uri->segment(2)=="kate_edit") { echo 'class="active"'; } ?>>
					<a href="<?=base_URL()?>admin/kategori"><i class="fa fa-object-group"></i> <span>Kategori Paket</span></a>
			</li>

				<li <?php if($this->uri->segment(1)=="pms" || $this->uri->segment(2)=="pms_tambah" || $this->uri->segment(2)=="pms_edit") { echo 'class="active"'; } ?>>
						<a href="<?=base_URL()?>admin/pemesanan"><i class="fa fa-ticket"></i> <span>Pemesanan</span></a>
				</li>

	<li <?php if($this->uri->segment(2)=="galeri" || $this->uri->segment(2)=="galeri_tambah" || $this->uri->segment(2)=="galeri_edit" || $this->uri->segment(2)=="album" || $this->uri->segment(2)=="Album_tambah" || $this->uri->segment(2)=="Album_edit") { echo 'class="treeview active"'; } else { echo 'class="treeview"'; } ?>>
	<a href="javascript:void(0)"> <i class="fa fa-camera-retro"></i> <span>Galeri</span>
		<span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span>
	</a>
		
	<ul class="treeview-menu">
		<li <?php if($this->uri->segment(2)=="album" || $this->uri->segment(2)=="album_tambah" || $this->uri->segment(2)=="album_edit") { echo 'class="active"'; } ?>>
				<a href="<?=base_URL()?>galeri/album"><i class="fa fa-image"></i> <span>Album Foto</span></a>
		</li>
	</ul>
</li>				

<li <?php if($this->uri->segment(2)=="adm" || $this->uri->segment(2)=="adm_tambah" || $this->uri->segment(2)=="adm_edit" || $this->uri->segment(2)=="cstmr" || $this->uri->segment(2)=="cstmr_tambah" || $this->uri->segment(2)=="cstmr_edit") { echo 'class="treeview active"'; } else { echo 'class="treeview"'; } ?>>
	<a href="javascript:void(0)"> <i class="fa fa-book"></i> <span>Pengguna</span>
		<span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span>
	</a>
		
	<ul class="treeview-menu">
		<li <?php if($this->uri->segment(2)=="adm" || $this->uri->segment(2)=="adm_tambah" || $this->uri->segment(2)=="adm_edit") { echo 'class="active"'; } ?>>
				<a href="<?=base_URL()?>pengguna/admin"><i class="fa fa-user"></i> <span>Administrasi</span></a>
		</li>

			<li <?php if($this->uri->segment(2)=="anggota" || $this->uri->segment(2)=="anggota_tambah" || $this->uri->segment(2)=="anggota_edit") { echo 'class="active"'; } ?>>
				<a href="<?=base_URL()?>admin/anggota"><i class="fa fa-user-md"></i> <span>Anggota</span></a>
			</li>
	</ul>
</li>
		

<li class="header">USER NAVIGATION</li>
<li <?php if($this->uri->segment(2)=="profil_saya") { echo 'class="active"'; } ?>>
<a href="<?=base_URL()?>pengguna/profil_saya"><i class="fa fa-user-circle text-warning"></i> <span>Profil Saya</span></a>
</li>
<li>
<a href="<?=base_URL()?>keluar"><i class="fa fa-sign-out text-danger"></i> <span>Keluar</span></a>
</li>
</ul>
</section>
<!-- /.sidebar -->
</aside>
<!-- =============================================== -->