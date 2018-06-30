<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	Album Foto PT SGS
	<small>Manajemen Album</small>
	</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_URL()?>admin/dashboard" ><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-home"></i> <span>Album Foto PT SGS</span></li>
		</ol>
</section>

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

<!-- Info boxes -->
	<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Album Foto Umroh PT SGS</h3>
				<a href="<?=base_URL()?>admin/album_tambah" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp; Tambah Album Baru</a>
	</div>

<!-- /.box-header -->
<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
	<thead>
	<tr>
		<th width="10%"><center>NO</center></th>
		<th><center>NAMA ALBUM</center></th>
		<th><center>SAMPUL ALBUM</center></th>
		<th width="15%"><center>AKSI</center></th>
	</tr>
	</thead>

<tbody>
	<?php
		$no = 1;
		foreach($glr as $g) :
		?>
		<?php
		$gbr_galeri = 'avatar.jpg';
		if($g->gbr_galeri && file_exists('assets/backend/images/galeri/'.$g->gbr_galeri)) {
		$gbr_galeri = $g->gbr_galeri;
	}
?>

<tr>
	<td align="center"><?=$no?>.</td>
	<td align="center"><?=$g->jdl_galeri?></td>
	<td align="center">
	<img src="<?=base_URL().'assets/backend/images/galeri/'.$gbr_galeri?>" class="img-circle" alt="foto profil" style="height: 40px; width: 40px"/>
</td>
	<td align="center">

	<a href="<?=base_URL()?>admin/album_edit/<?=$g->id_galeri?>" class="btn btn-xs btn-warning btn-flat" title="Edit Data"><i class="fa fa-edit"></i></a>
	<a href="<?=base_URL()?>admin/album_hapus/<?=$g->id_galeri?>" onclick="return confirm('Kamu yakin ingin menghapus data ini ?')" class="btn btn-xs btn-danger btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></a>

</td>
</tr>
	<?php $no++; endforeach; ?>
</tbody>

</table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->